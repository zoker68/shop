<?php

namespace Zoker\Shop\Traits\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Zoker\Shop\Exceptions\AddToCartException;
use Zoker\Shop\Models\Cart;
use Zoker\Shop\Models\Product;

trait HasCartFunctions
{
    use Alertable;

    public $quantityForCart = 1;

    public function addToCart(string $productHash): void
    {
        try {
            $quantity = $this->validateQuantity();
        } catch (ValidationException $exception) {
            $this->throwAlert('danger', $exception->getMessage());

            return;
        }

        try {
            $cart = Cart::getCurrentCart();

            $productId = Product::hashToId($productHash);

            $item = $cart->products()->firstWhere('product_id', $productId);

            $product = Product::published()->find($productId);
            if (! $product) {
                throw new AddToCartException(__('shop::cart.exceptions.published'), 'danger');
            }

            if ($product->stock < $quantity + ($item->quantity ?? 0) && ! config('shop.product.allow_overstock')) {
                throw new AddToCartException(__('shop::cart.exceptions.stock'), 'danger');
            }

            DB::beginTransaction();

            if ($item) {
                $item->increment('quantity', $quantity);
            } else {
                $cart->products()->create(['product_id' => $productId, 'quantity' => $quantity, 'price' => $product->price]);
            }

            $cart->calculateTotals();

            DB::commit();

            $this->dispatchUpdateCartEvent('add', $product, $quantity);

            $this->throwAlert('success', __('shop::cart.added'));

        } catch (AddToCartException $exception) {
            DB::rollBack();
            $this->throwAlert($exception->getType(), $exception->getMessage());
        }
    }

    public function removeFromCart(string $productHash): void
    {
        $productId = Product::hashToId($productHash);

        $cart = Cart::getCurrentCart();

        $productInCart = $cart->products()->firstWhere('product_id', $productId);
        $oldQuantity = $productInCart->quantity;

        try {
            DB::beginTransaction();

            $productInCart->delete();

            $cart->calculateTotals();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            $this->throwAlert('danger', 'An error has occurred during removal product from cart');
        }

        $this->throwAlert('info', __('shop::cart.removed'), 1);

        $product = Product::find($productId);

        $this->dispatchUpdateCartEvent('remove', $product, $oldQuantity);
    }

    public function validateQuantity(): mixed
    {
        return Validator::make(
            ['quantityForCart' => $this->quantityForCart],
            ['quantityForCart' => 'required|integer|min:1'],
            [
                'required' => __('shop::cart.error.required'),
                'integer' => __('shop::cart.error.integer'),
                'min' => __('shop::cart.error.min'),
            ]
        )->validate()['quantityForCart'];
    }

    public function updateCartQuantity(string $productHash, int $quantity): void
    {
        $this->quantityForCart = $quantity;

        try {
            $quantity = $this->validateQuantity();
        } catch (ValidationException $exception) {
            $this->throwAlert('danger', $exception->getMessage());

            return;
        }

        $cart = Cart::getCurrentCart();
        $productId = Product::hashToId($productHash);

        $item = $cart->products()->firstWhere('product_id', $productId);
        $oldQuantity = $item->quantity;

        try {
            if (! $item) {
                throw new AddToCartException(__('shop::cart.exceptions.product_not_find_in_cart'), 'danger');
            }

            $product = Product::published()->find($productId);
            if (! $product) {
                throw new AddToCartException(__('shop::cart.exceptions.published'), 'info');
            }

            if ($quantity === $oldQuantity) {
                throw new AddToCartException(__('shop::cart.exceptions.quantity_not_changed'), 'danger');
            }

            if ($product->stock < $quantity && ! config('shop.product.allow_overstock')) {
                throw new AddToCartException(__('shop::cart.exceptions.stock'), 'danger');
            }

            DB::beginTransaction();

            $item->update(['quantity' => $quantity]);

            $cart->calculateTotals();

            DB::commit();

            $this->dispatchUpdateCartEvent(
                ($quantity > $oldQuantity) ? 'add' : 'remove',
                $product,
                abs($quantity - $oldQuantity)
            );

        } catch (AddToCartException $exception) {
            DB::rollBack();
            $this->throwAlert($exception->getType(), $exception->getMessage());
        }
    }

    public function dispatchUpdateCartEvent(string $action, Product $product, int $quantity): void
    {
        $this->dispatch(
            'cartUpdated',
            action: $action,
            product: $product->only('hash', 'name', 'price'),
            quantity: $quantity,
            currency: [
                'code' => currency()->getCurrency(),
                'subunit' => currency()->getSubunit(),
            ]
        );
    }
}

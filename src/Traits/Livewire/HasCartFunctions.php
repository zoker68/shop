<?php

namespace Zoker68\Shop\Traits\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Zoker68\Shop\Exceptions\AddToCartException;
use Zoker68\Shop\Models\Cart;
use Zoker68\Shop\Models\Product;

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
                throw new AddToCartException(__('zoker68.shop::cart.exceptions.published'), 'danger');
            }

            if ($product->stock < $quantity + ($item->quantity ?? 0) && ! config('product.allow_overstock')) {
                throw new AddToCartException(__('zoker68.shop::cart.exceptions.stock'), 'danger');
            }

            DB::beginTransaction();

            if ($item) {
                $item->increment('quantity', $quantity);
            } else {
                $cart->products()->create(['product_id' => $productId, 'quantity' => $quantity, 'price' => $product->price]);
            }

            $cart->calculateTotals();

            DB::commit();

            $this->dispatch('cartUpdated');

            $this->throwAlert('success', __('zoker68.shop::cart.added'));

        } catch (AddToCartException $exception) {
            DB::rollBack();
            $this->throwAlert($exception->getType(), $exception->getMessage());
        }
    }

    public function removeFromCart(string $productHash): void
    {
        $productId = Product::hashToId($productHash);

        $cart = Cart::getCurrentCart();

        try {
            DB::beginTransaction();

            $cart->products()->where('product_id', $productId)->delete();
            $cart->calculateTotals();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            $this->throwAlert('danger', 'An error has occurred during removal product from cart');
        }

        $this->throwAlert('info', __('zoker68.shop::cart.removed'), 1);

        $this->dispatch('cartUpdated');
    }

    public function validateQuantity(): mixed
    {
        return Validator::make(
            ['quantityForCart' => $this->quantityForCart],
            ['quantityForCart' => 'required|integer|min:1'],
            [
                'required' => __('zoker68.shop::cart.error.required'),
                'integer' => __('zoker68.shop::cart.error.integer'),
                'min' => __('zoker68.shop::cart.error.min'),
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

        try {
            $cart = Cart::getCurrentCart();

            $productId = Product::hashToId($productHash);

            $item = $cart->products()->firstWhere('product_id', $productId);
            if (! $item) {
                throw new AddToCartException(__('zoker68.shop::cart.exceptions.product_not_find_in_cart'), 'danger');
            }

            $product = Product::published()->find($productId);
            if (! $product) {
                throw new AddToCartException(__('zoker68.shop::cart.exceptions.published'), 'danger');
            }

            if ($product->stock < $quantity && ! config('product.allow_overstock')) {
                throw new AddToCartException(__('zoker68.shop::cart.exceptions.stock'), 'danger');
            }

            DB::beginTransaction();

            $item->update(['quantity' => $quantity]);

            $cart->calculateTotals();

            DB::commit();

            $this->dispatch('cartUpdated');

        } catch (AddToCartException $exception) {
            DB::rollBack();
            $this->throwAlert($exception->getType(), $exception->getMessage());
        }
    }
}
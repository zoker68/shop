<?php

namespace Tests\Unit\models;

use App\Enums\CartStatus;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class CartTest extends TestCase
{
    public function test_get_cart_authenticated_user()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $cart = Cart::getCurrentCart();

        $this->assertEquals($cart->user_id, $user->id);

        $cart2 = Cart::getCurrentCart();

        $this->assertEquals($cart2->id, $cart->id);
    }

    public function test_get_cart_unauthenticated_user()
    {
        $sessionCart = Cart::getCurrentCart();

        $this->assertNull($sessionCart->user_id);

        $cart = Cart::getCurrentCart();
        $this->assertEquals($sessionCart->id, $cart->id);
    }

    public function test_transfer_to_not_empty_cart()
    {
        $products = Product::factory()->approved()->count(2)->create();
        $cart = Cart::factory(['user_id' => null, 'session' => session()->id()])->statusCreated()->hasProducts(1, ['product_id' => $products[0]->id])->create();

        $user = User::factory()->create();
        $userCart = Cart::factory(['user_id' => $user->id, 'session' => null])->statusCreated()->hasProducts(1, ['product_id' => $products[1]->id])->create();

        $cart->transferToCart($userCart);

        $this->assertSame($cart->status, CartStatus::TRANSFERRED);
        $this->assertCount(0, CartProduct::where('cart_id', $cart->id)->get());

        $this->assertSame($userCart->status, CartStatus::CREATED);
        $this->assertCount(2, $userCart->products);
    }

    public function test_transfer_to_empty_cart()
    {
        $product = Product::factory()->approved()->create();
        $cart = Cart::factory(['user_id' => null, 'session' => session()->id()])->statusCreated()->hasProducts(1, ['product_id' => $product->id])->create();

        $user = User::factory()->create();
        $userCart = Cart::factory(['user_id' => $user->id, 'session' => null])->statusCreated()->create();

        $cart->transferToCart($userCart);

        $this->assertSame($cart->status, CartStatus::TRANSFERRED);
        $this->assertCount(0, CartProduct::where('cart_id', $cart->id)->get());

        $this->assertSame($userCart->status, CartStatus::CREATED);
        $this->assertCount(1, $userCart->products);
    }

    public function test_transfer_empty_cart()
    {
        $cart = Cart::factory(['user_id' => null, 'session' => session()->id()])->statusCreated()->create();

        $user = User::factory()->create();
        $userCart = Cart::factory(['user_id' => $user->id, 'session' => null])->statusCreated()->create();

        $cart->transferToCart($userCart);

        $this->assertNull(Cart::find($cart->id));
        $this->assertSame($userCart->status, CartStatus::CREATED);
    }
}

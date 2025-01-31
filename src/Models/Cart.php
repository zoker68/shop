<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Zoker\Shop\Classes\Bases\BaseModel;
use Zoker\Shop\Enums\CartStatus;
use Zoker\Shop\Enums\OrderStatusType;
use Zoker\Shop\Exceptions\ProductInCartException;
use Zoker\Shop\Observers\CartObserver;

#[ObservedBy(CartObserver::class)]
class Cart extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'status' => CartStatus::class,
        'data' => 'array',
        'total_products' => 'float',
    ];

    private static ?self $widgetCart = null;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(CartProduct::class, 'cart_id');
    }

    public function shippingMethod(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', CartStatus::CREATED);
    }

    public function scopeForSession(Builder $query, ?string $sessionId = null): Builder
    {
        return $query->where('session', $sessionId ?? self::getCartSession());
    }

    public static function getCurrentCart(): self
    {
        if (auth()->user()) {
            return self::getForUser();
        }

        return self::getBySession();
    }

    public static function getBySession(?string $session = null): self
    {
        return self::active()->firstOrCreate(['session' => $session ?? self::getCartSession()])->refresh();
    }

    public static function getForUser(): self
    {
        return auth()->user()->carts()->active()->firstOrCreate(['user_id' => auth()->user()->id])->refresh();
    }

    public function calculateTotals(): void
    {
        $this->total_products = $this->products->sum('total');

        $this->total_shipping = ($this->shipping_method_id) ? $this->shippingMethod->price : 0;

        $this->total_pre_payment = $this->total_products + $this->total_shipping;

        $this->total_payment_fee = 0;
        if ($this->payment_method_id) {
            $this->total_payment_fee = $this->total_pre_payment / 100 * $this->paymentMethod->fee_percent;
            $this->total_payment_fee += $this->paymentMethod->fee;
        }

        $this->total_pre_payment += $this->total_payment_fee;

        $this->save();
    }

    public function transferToCart(Cart $targetCart): void
    {
        $this->load('products');
        if ($this->products->isEmpty()) {
            $this->forceDelete();

            return;
        }

        $targetCart->load('products');
        if ($targetCart->products->isEmpty()) {
            $this->products()->update(['cart_id' => $targetCart->id]);
        } else {
            $this->products->each(function ($item) use ($targetCart) {
                if ($userItem = $targetCart->products->firstWhere('product_id', $item->product_id)) {
                    $userItem->increment('quantity', $item->quantity);
                } else {
                    $targetCart->products()->create([
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                    ]);
                }
            });
        }

        $targetCart->refresh();
        $targetCart->calculateTotals();

        $this->status = CartStatus::TRANSFERRED;
        $this->save();

        $this->products()->delete();
    }

    public static function getCartSession(): string
    {
        $sessionId = session('cart_session') ?? request()->cookie('cart_session') ?? Str::random(100);

        cookie('cart_session', $sessionId, 60 * 24 * 30 * 12 * 10);
        session(['cart_session' => $sessionId]);

        return $sessionId;
    }

    /**
     * @throws ProductInCartException
     */
    public function checkAllItems(): void
    {
        if ($this->products->isEmpty()) {
            throw new ProductInCartException(__('shop::cart.error.empty'));
        }

        foreach ($this->products as $item) {
            if (! $item->hasStock()) {
                throw new ProductInCartException(__('shop::cart.error.outOfStock'));
            }

            if (! $item->product->isAvailable()) {
                throw new ProductInCartException(__('shop::cart.error.notAvailable'));
            }
        }
    }

    public function createOrder(): Order
    {
        $this->shippingAddress->load('country', 'region');
        $this->billingAddress->load('country', 'region');

        $order = Order::create([
            'user_id' => auth()->user()->id ?? null,
            'general_order_status_id' => OrderStatusType::GENERAL->getDefault()->id,
            'payment_order_status_id' => OrderStatusType::PAYMENT->getDefault()->id,
            'shipping_order_status_id' => OrderStatusType::SHIPPING->getDefault()->id,
            'total_products' => $this->total_products,
            'total_shipping' => $this->total_shipping,
            'total_payment_fee' => $this->total_payment_fee,
            'total_pre_payment' => $this->total_pre_payment,
            'user_data' => User::mapData($this->data),
            'shipping_address_id' => $this->shipping_address_id,
            'shipping_address_data' => $this->shippingAddress->toArray(),
            'billing_address_id' => $this->billing_address_id,
            'billing_address_data' => $this->billingAddress->toArray(),
            'shipping_method_id' => $this->shipping_method_id,
            'shipping_method_data' => $this->shippingMethod,
            'payment_method_id' => $this->payment_method_id,
            'payment_method_data' => $this->paymentMethod,
            'ip_address' => request()->ip(),
        ]);

        $this->products->each->sell($order->id);

        $this->status = CartStatus::ORDERED;
        $this->save();

        return $order;
    }

    public static function getWidgetCart(): Cart
    {
        if (! self::$widgetCart) {
            self::$widgetCart = Cart::getCurrentCart();

            self::$widgetCart = cache()->remember(
                'cart_' . self::$widgetCart->id,
                now()->addMinutes(15),
                fn () => self::$widgetCart->load('products', 'products.product')
            );
        }

        return self::$widgetCart;
    }
}

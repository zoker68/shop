<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoker\Shop\Classes\Model;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function scopeForSession(Builder $query, ?string $sessionId = null): Builder
    {
        return $query->where('session', $sessionId ?? Cart::getCartSession());
    }

    public static function getUserAddressOptions(): array
    {
        $userAddresses = auth()->check()
            ? auth()->user()->addresses()
            : self::forSession();

        $userAddresses = $userAddresses->get()->keyBy('id');

        if ($userAddresses->isNotEmpty()) {
            $userAddresses->load('country', 'region');
            $userAddresses = $userAddresses->map(function ($address) {
                $option = $address->address . ' ' . $address->zip . ' ' . $address->city . ' ' . $address->country->name;
                if ($address->region) {
                    $option .= ' ' . $address->region->name;
                }

                return $option;
            });
        }

        return $userAddresses->toArray();
    }

    public static function createUserAddress($address)
    {
        $data = [
            'country_id' => $address['country'],
            'region_id' => $address['region'] ?? null,
            'zip' => $address['zip'],
            'city' => $address['city'],
            'address' => $address['address'],
        ];

        $data += (auth()->check()) ? ['user_id' => auth()->id()] : ['session' => Cart::getCartSession()];

        return Address::create($data);
    }
}

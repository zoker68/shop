<?php

namespace Zoker\Shop\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Zoker\Shop\Enums\ViewType;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'view_type' => ViewType::class,
            'birthdate' => 'date',
        ];
    }

    public function carts(): HasMany
    {
        return $this->hasMany(cart::class, 'user_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function resetPasswordLink(): string
    {
        return URL::temporarySignedRoute(
            'reset-password',
            now()->addMinutes(config('auth.reset_password.expire')),
            ['email' => $this->email]
        );
    }

    public static function register(array $data): void
    {
        $data['remember_token'] = Str::random(10);
        $user = self::create($data);

        \Auth::login($user);

        $cart = Cart::forSession()->first();
        $cart->user_id = $user->id;
        $cart->session = '';
        $cart->save();

        Address::forSession()->update(['user_id' => $user->id, 'session' => '']);
    }

    public static function mapData(?array $data): array
    {
        $fields = ['email', 'name', 'surname', 'phone', 'birthday', 'company', 'vat'];

        if (auth()->check()) {
            return auth()->user()->only($fields);
        } else {
            return array_intersect_key($data, array_flip($fields));
        }
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // TODO: Add logic for permissions
        return $this->email === 'zoker68@ya.ru';
    }
}

<?php

namespace Zoker68\Shop\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Zoker68\Shop\Models\Cart;

class Login extends Component
{
    #[Validate(['required', 'email'])]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    protected function getMessages()
    {
        return [
            'email.required' => __('zoker68.shop::auth.login.error.email.required'),
            'email.email' => __('zoker68.shop::auth.login.error.email.email'),
            'password.required' => __('zoker68.shop::auth.login.error.password.required'),
        ];
    }

    public function render()
    {
        return view('zoker68.shop::livewire.auth.login');
    }

    public function login(): void
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {

            Cart::getBySession(Cart::getCartSession())->transferToCart(targetCart: Cart::getForUser());

            session()->regenerate();

            $this->redirectIntended(route('index'));
        } else {
            $this->addError('password', __('zoker68.shop::auth.login.error.password.incorrect'));
        }
    }
}

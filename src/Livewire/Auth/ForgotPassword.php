<?php

namespace Zoker\Shop\Livewire\Auth;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Zoker\Shop\Mail\ForgotPasswordMail;
use Zoker\Shop\Models\User;

class ForgotPassword extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    #[Validate(['email' => 'required|email'])]
    public $email = '';

    public function render(Request $request)
    {
        return view('shop::livewire.auth.forgot-password');
    }

    public function forgotPasswordSubmit(): void
    {
        $data = $this->validate();

        $user = User::firstWhere('email', $data['email']);

        if (! $user) {
            $this->addError('email', __('shop::auth.forgot_password.error.user_not_found'));

            return;
        }

        session()->flash('forgot-password-success');

        Mail::to($user->email, $user->name)->queue(new ForgotPasswordMail($user));

        $this->reset('email');
    }
}

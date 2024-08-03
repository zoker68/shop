<?php

namespace Zoker\Shop\Livewire\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Zoker\Shop\Models\User;

class ResetPassword extends Component
{
    #[Validate(['required', 'min:6', 'confirmed'])]
    public $password = '';

    public $password_confirmation = '';

    public string $email = '';

    public User $user;

    protected function getMessages(): array
    {
        return [
            'password.required' => __('zoker.shop::auth.reset_password.error.password.required'),
            'password.confirmed' => __('zoker.shop::auth.reset_password.error.password.confirmed'),
            'password.min' => __('zoker.shop::auth.reset_password.error.password.min'),
        ];
    }

    public function mount(Request $request): void
    {
        $this->user = User::where('email', $this->email)->firstOrFail();
        $expires = $request->get('expires');
        $dateStart = Carbon::createFromTimestamp($expires)->subMinutes(config('auth.reset_password.expire'));

        if ($this->user->updated_at && $this->user->updated_at->gte($dateStart)) {
            abort(401);
        }
    }

    public function render(): View
    {
        return view('zoker.shop::livewire.auth.reset-password');
    }

    public function resetPasswordSubmit()
    {
        $data = $this->validate();

        $this->user->password = $this->password;
        $this->user->save();

        Auth::login($this->user);

        return redirect()->route('index');
    }
}

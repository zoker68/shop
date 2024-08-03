<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

it('can reset password', function () {
    $user = User::factory()->create();

    $link = $user->resetPasswordLink();
    $this->get($link)
        ->assertSuccessful()
        ->assertSeeLivewire(\App\Livewire\Auth\ResetPassword::class)
        ->assertSeeTextInOrder([
            __('auth.reset_password.title'),
            __('auth.reset_password.form.password'),
            __('auth.reset_password.form.password_confirmation'),
            __('auth.reset_password.form.submit'),
        ])
        ->assertSeeInOrder([
            '<form',
            'wire:submit="resetPasswordSubmit"',
            'wire:model.blur="password"',
            'wire:model="password_confirmation"',
            'type="submit"',
            '</form>',
        ], false);

    parse_str(parse_url($link)['query'], $url);

    $newPassword = Str::random(8);
    \Livewire\Livewire::withQueryParams($url)->test(\App\Livewire\Auth\ResetPassword::class, ['email' => $user->email])
        ->assertViewIs('livewire.auth.reset-password')
        ->set('password', $newPassword)
        ->set('password_confirmation', $newPassword)
        ->call('resetPasswordSubmit')
        ->assertHasNoErrors()
        ->assertRedirect(route('index'));

    $this->assertAuthenticatedAs($user);
});

it('new password has errors', function () {
    $user = User::factory()->create();
    $shortPassword = Str::random(5);

    $newPassword = Str::random(8);

    $link = $user->resetPasswordLink();
    parse_str(parse_url($link)['query'], $url);

    \Livewire\Livewire::withQueryParams($url)->test(\App\Livewire\Auth\ResetPassword::class, ['email' => $user->email])
        ->set('password', $shortPassword)
        ->set('password_confirmation', $shortPassword)
        ->call('resetPasswordSubmit')
        ->assertHasErrors('password')
        ->set('password', $newPassword)
        ->set('password_confirmation', $newPassword . 'invalid')
        ->call('resetPasswordSubmit')
        ->assertHasErrors('password');
});

it('link is invalid', function () {
    $user = User::factory()->create();

    $this->get($user->resetPasswordLink() . 'invalid')->assertStatus(401);
});

it('link valid, but used', function () {
    $user = User::factory()->create();
    $link = $user->resetPasswordLink();

    $user->password = 'test';
    $user->save();

    $this->get($link)->assertStatus(401);
});

it('can not if user authenticated', function () {
    $user = User::factory()->create();

    Auth::login($user);
    $link = $user->resetPasswordLink();

    $this->get($link)->assertRedirect(route('index'));
});

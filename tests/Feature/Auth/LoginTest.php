<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('can open login page', function () {
    $response = $this->get(route('login'));

    $response->assertStatus(200);

    $response->assertSeeLivewire(\App\Livewire\Auth\Login::class);

    $response->assertSeeTextInOrder([
        __('auth.login.title'),
        __('auth.login.form.email'),
        __('auth.login.form.password'),
        __('auth.login.form.submit'),
    ]);

    $response->assertSeeInOrder([
        '<form',
        'wire:submit="login"',
        'wire:model.blur="email"',
        'wire:model="password"',
        'type="submit"',
        '</form>',
    ], false);

    Livewire::test(\App\Livewire\Auth\Login::class)
        ->assertViewIs('livewire.auth.login');
});

it('can login', function () {
    $user = User::factory()->create();

    Livewire::test(\App\Livewire\Auth\Login::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect(route('index'));

    $this->assertAuthenticatedAs($user);
});

it('throw error if email is not valid', function () {
    Livewire::test(\App\Livewire\Auth\Login::class)
        ->set('email', 'email')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors(['email']);
});

it('throw error if password is not valid', function () {
    $user = User::factory()->create();

    Livewire::test(\App\Livewire\Auth\Login::class)
        ->set('email', $user->email)
        ->set('password', 'wrongPassword')
        ->call('login')
        ->assertHasErrors(['password']);

    $this->assertGuest();
});

it('can not login if user authenticated', function () {
    $user = User::factory()->create();

    Auth::login($user);

    $this->get(route('login'))->assertRedirect(route('index'));
});

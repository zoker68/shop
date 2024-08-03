<?php

use App\Models\User;

it('account page for guest not available', function () {
    $this->get(route('account.profile.dashboard'))
        ->assertRedirect(route('login'));
});

test('account page for authenticated user', function () {
    $user = User::factory()->create();

    $this->be($user);

    $this->get(route('account.profile.dashboard'))
        ->assertSuccessful()
        ->assertViewIs('pages.auth.account.index')
        ->assertSeeTextInOrder([
            __('layout.account.welcome'),
            $user->name,
            $user->surname,
        ])
        ->assertSeeTextInOrder([
            __('layout.account.wishlist'),
            __('layout.account.logout'),
        ])
        ->assertSeeInOrder([
            route('account.wishlist'),
            '<form action="' . route('logout') . '" method="POST">',
            csrf_field(),
            '<input type="hidden" name="_method" value="DELETE">',
            '<button type="submit"',
            '</form>',
        ], false);
});

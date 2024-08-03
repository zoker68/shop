<?php

use App\Models\User;

it('logout page for guest not available', function () {
    $this->delete(route('logout'))
        ->assertRedirect(route('login'));
});

test('account page for authenticated user', function () {
    $user = User::factory()->create();

    $this->be($user);

    $this->delete(route('logout'))
        ->assertRedirect(route('index'));

    $this->assertGuest();
});

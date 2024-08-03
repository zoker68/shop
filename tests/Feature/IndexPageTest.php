<?php

use App\Models\User;

test('index page for guest', function () {
    $this->get(route('index'))
        ->assertSuccessful()
        ->assertSee(route('login'))
        ->assertSeeLivewire('header.wishlist-widget');
    //        ->assertSee(route('register'))
});

test('index page for authenticated user', function () {
    $this->be(User::factory()->create());

    $this->get(route('index'))
        ->assertSuccessful()
        ->assertSee(route('account.profile.dashboard'))
        ->assertSeeLivewire('header.wishlist-widget');
});

<?php

use App\Models\User;
use Illuminate\Support\Facades\Mail;

it('forgot password page is rendered', function () {
    $response = $this->get(route('forgot-password'))
        ->assertSuccessful()
        ->assertSeeLivewire(\App\Livewire\Auth\ForgotPassword::class);

    $response->assertSeeTextInOrder([
        __('auth.forgot_password.title'),
        __('auth.forgot_password.form.email'),
        __('auth.forgot_password.form.submit'),
    ]);

    $response->assertSeeInOrder([
        '<form',
        'wire:submit="forgotPasswordSubmit"',
        'wire:model="email"',
        'type="submit"',
        '</form>',
    ], false);

    Livewire::test(\App\Livewire\Auth\ForgotPassword::class)
        ->assertViewIs('livewire.auth.forgot-password');
});

it('forgot password send email for user', function () {
    $user = User::factory()->create();

    Mail::fake();

    $response = Livewire::test(\App\Livewire\Auth\ForgotPassword::class)
        ->set('email', $user->email)
        ->call('forgotPasswordSubmit')
        ->assertHasNoErrors()
        ->assertSet('email', null)
        ->assertSee('alert alert-success');

    expect($response)->assertFlashMessageHas('forgot-password-success');

    Mail::assertQueued(\App\Mail\ForgotPasswordMail::class, function ($mail) use ($user, &$link) {
        $link = $mail->getLink();

        return $mail->hasTo($user->email)
            && $mail->hasSubject(__('auth.forgot_password.mail.subject'));
    });

    $this->assertTrue(
        strpos(
            $link,
            route('reset-password', ['email' => $user->email]) . '?expires='
        ) !== false
    );

});

it('forgot password. throws error if email is not valid', function () {
    $user = User::factory(['email' => 'some@email.com'])->create();

    Livewire::test(\App\Livewire\Auth\ForgotPassword::class)
        ->set('email', 'wrongEmail@wrongEmail')
        ->call('forgotPasswordSubmit')
        ->assertHasErrors(['email']);
});

it('can not if user authenticated', function () {
    $user = User::factory()->create();

    Auth::login($user);

    $this->get(route('forgot-password'))->assertRedirect(route('index'));
});

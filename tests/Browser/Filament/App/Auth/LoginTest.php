<?php

use App\Models\User;

beforeEach(function () {

    auth()->logout();

    $this->user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => 'password',
    ]);

});

test('an unauthenticated user can login', function () {

    visit('/app/login')
        ->fill('form.email', $this->user->email)
        ->fill('form.password', 'password')
        ->submit()
        ->assertSee('Dashboard');

    $this->assertAuthenticated();

});

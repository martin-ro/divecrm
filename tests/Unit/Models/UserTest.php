<?php

use App\Models\User;

test('to array', function () {
    $user = User::factory()->create()->fresh();

    expect(array_keys($user->toArray()))->toBe([
        'id',
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ]);
});

test('full name attribute returns last name comma first name', function () {
    $user = User::factory()->create([
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    expect($user->full_name)->toBe('Doe, John');
});

test('getFilamentName returns full name', function () {
    $user = User::factory()->create([
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    expect($user->getFilamentName())->toBe('Doe, John');
});

test('can be soft deleted', function () {
    $user = User::factory()->create();

    $user->delete();

    expect($user->trashed())->toBeTrue()
        ->and(User::withTrashed()->find($user->id))->not->toBeNull()
        ->and(User::find($user->id))->toBeNull();
});

test('can be restored after soft delete', function () {
    $user = User::factory()->create();

    $user->delete();
    $user->restore();

    expect($user->trashed())->toBeFalse()
        ->and(User::find($user->id))->not->toBeNull();
});

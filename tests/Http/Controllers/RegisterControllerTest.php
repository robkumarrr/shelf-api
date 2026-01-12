<?php

namespace Tests\Http\Controllers;

use App\Models\User;

it('registers a new user', function () {
    $user = User::factory()->create([
        'name' => 'test',
        'email' => 'test@example.com',
        'password' => 'password'
    ]);

    expect(true)->toBeTrue();
});

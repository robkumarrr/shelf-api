<?php

namespace Tests\Http\Controllers;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

it('tests if a user can be logged out', function () {
    $user = User::factory()->create([
        'name' => 'test',
        'email' => 'test@example.com',
        'password' => 'password'
    ]);

    $token = $user->createToken('login-token')->plainTextToken;

    $response = $this->withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->postJson(route('logout'));

    $response->assertStatus(200)
        ->assertJsonStructure(['message']);

    $this->assertDatabaseMissing('personal_access_tokens', ['token' => $token]);
});

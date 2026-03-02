<?php

namespace Tests\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\assertDatabaseHas;

it('registers a new user', function () {
    $data = [
        'name' => 'user1',
        'email' => 'test@example.com',
        'password' => 'password'
    ];

    $user = User::factory()->make($data);

    Auth::shouldReceive('login')
        ->once()
        ->with($user);

    $this->postJson(route('register.store'), $data)
        ->assertStatus(201)
        ->assertJsonStructure(['message', 'data' => ['id', 'attributes']]);

    assertDatabaseHas('users', ['email' => 'test@example.com']);
});

it('does not register a duplicate user', function() {
    $data = [
        'name' => 'user1',
        'email' => 'test@example.com',
        'password' => 'password'
    ];

    User::factory()->create($data);

    $this->postJson(route('register.store'), $data)
        ->assertStatus(422);
});

it('does not register a user with incorrect data', function() {
   $data = [
       'name' => 'test',
       'email' => 'bad_email',
       'password' => 'password'
   ];

   $this->postJson(route('register.store'), $data)
       ->assertStatus(422)
       ->assertJsonValidationErrors(['email']);;
});

it('does not register a user if data is missing', function() {
    $this->postJson(route('register.store'), [])
        ->assertStatus(422);
});

<?php

use App\Models\User;

it('tests if a user can login with correct credentials', function()
{
    $data = [
        'email' => 'test@example.com',
        'password' => 'password'
    ];

    User::factory()->create($data);

    $response = $this->postJson(route('login.authenticate'), $data);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message', 'token'
        ])
        ->assertJson([
            'message' => 'success'
        ]);
});

it('tests that a user cannot login with incorrect credentials', function()
{
    $data = [
        'email' => 'test@example.com',
        'password' => 'password'
    ];

    User::factory()->create($data);

    $incorrectCreds = [
        'email' => 'test@example.com',
        'password' => 'incorrect_password'
    ];

    $response = $this->postJson(route('login.authenticate'), $incorrectCreds);

    $response->assertStatus(401)
        ->assertJsonStructure([
            'message'
        ])
        ->assertJson([
            'message' => 'error'
        ]);

});

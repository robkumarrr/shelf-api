<?php

use App\Models\CompactDisc;
use App\Models\User;

it('returns all of the compact discs', function() {
    CompactDisc::factory()->count(10)->create();
    $user = User::factory()->create();

    $token = $user->createToken('login-token')->plainTextToken;

    $this->withHeaders([
        'Authorization' => 'Bearer ' . $token
    ]);

    $response = $this->getJson(route('compact-disc.index'));

    $response->assertStatus(200)
        ->assertJsonCount(10, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'album_name', 'artist', 'number_of_songs', 'released_on']
            ],
            'links',
            'meta'
        ]);
});

it('returns an empty collection if there are no compact discs', function() {
    $user = User::factory()->create();

    $token = $user->createToken('login-token')->plainTextToken;

    $this->withHeaders([
        'Authorization' => 'Bearer ' . $token
    ]);

    $this->getJson(route('compact-disc.index'))
        ->assertStatus(200)
        ->assertJsonCount(0, 'data')
        ->assertJsonStructure([
            'data',
            'links',
            'meta'
        ]);
});

it('returns a 401 if a user is not authenticated', function() {
   $this->getJson(route('compact-disc.index'))
       ->assertStatus(401);
});

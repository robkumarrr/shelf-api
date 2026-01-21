<?php

use App\Models\CompactDisc;
use App\Models\User;

it('returns all of the compact discs', function() {
    CompactDisc::factory()->count(10)->create();

    $this->withHeaders(createAuthorizedUser());

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
    $this->withHeaders(createAuthorizedUser());

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

it('creates a new compact disc as a shelf item for a user', function() {
    $this->withHeaders(createAuthorizedUser());

    $data = [
        'artist' => 'Counterparts',
        'album_name' => 'Tragedy Will Find Us',
        'number_of_songs' => '11',
        'released_on' => '2015-07-24',
        'rating' => 10,
        'acquired_on'=> '2015-07-24',
    ];

    $this->post(route('compact-disc.store'), $data)
        ->assertStatus(200);

    $compactDisc = CompactDisc::with('shelfItem')->first();

    $this->assertDatabaseHas('compact_discs', [
        'id' => $compactDisc->id,
        'artist' => 'Counterparts',
    ]);

    $this->assertDatabaseHas('shelf_items', [
        'itemable_id' => $compactDisc->id,
        'user_id' => Auth::user()->id
    ]);
});

it('does not create a compact disc if data is missing', function() {
    $this->markTestSkipped();
});

function createAuthorizedUser()
{
    $user = User::factory()->create();

    $token = $user->createToken('login-token')->plainTextToken;

    return [
        'Authorization' => 'Bearer ' . $token
    ];
}

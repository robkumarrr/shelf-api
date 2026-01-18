<?php

use App\Models\CompactDisc;

it('returns all of the compact discs', function() {
    CompactDisc::factory()->count(10)->create();

    $response = $this->getJson(route('compact-disc.index'));

    $response->assertStatus(200)
        ->assertJsonCount(10, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'album_name', 'artist']
            ],
            'links',
            'meta'
        ]);
});

it('returns an empty collection if there are no compact discs', function() {
    $this->getJson(route('compact-disc.index'))
        ->assertStatus(200)
        ->assertJsonCount(0, 'data')
        ->assertJsonStructure([
            'data',
            'links',
            'meta'
        ]);
});



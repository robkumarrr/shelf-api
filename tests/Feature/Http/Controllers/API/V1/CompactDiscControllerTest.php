<?php

use App\Models\CompactDisc;

it('returns all of the compact discs', function() {

    CompactDisc::factory()->count(10)->create();

    $response = $this->getJson(route('compact-disc.index'));

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data'
        ]);
});

<?php

namespace Database\Factories;

use App\Models\CompactDisc;
use App\Models\ShelfItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompactDisc>
 */
class CompactDiscFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artist' => $this->faker->name(),
            'album_name' => $this->faker->company(),
            'number_of_songs' => $this->faker->numberBetween(8, 30),
        ];
    }

    public function configure(): Factory|CompactDiscFactory
    {
        return $this->afterCreating(function(CompactDisc $compactDisc) {
            $compactDisc->shelfItem()->save(
                ShelfItem::factory()->make()
            );
        });
    }
}

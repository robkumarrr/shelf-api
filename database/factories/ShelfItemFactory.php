<?php

namespace Database\Factories;

use App\Models\CompactDisc;
use App\Models\ShelfItem;
use App\Models\User;
use App\ShelfItemStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShelfItem>
 */
class ShelfItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'rating' => $this->faker->numberBetween(1,10),
            'acquired_on' => $this->faker->date(),
            'last_used_on' => $this->faker->date(),
            'status' => $this->faker->randomElement(ShelfItemStatus::cases())->value,
            'purchase_price' => $this->faker->randomFloat(2, 1, 100),
            'purchase_location' => $this->faker->city(),
            'description' => $this->faker->text()
        ];
    }

    public function forCompactDiscs(Collection $compactDiscs)
    {
        return $this->afterMaking(function (ShelfItem $shelfItem) use ($compactDiscs) {
            $cd = $compactDiscs->random();
            $shelfItem->itemable_type = CompactDisc::class;
            $shelfItem->itemable_id = $cd->id;
        });
    }
}

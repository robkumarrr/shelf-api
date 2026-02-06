<?php

namespace Database\Seeders;

use App\Models\CompactDisc;
use App\Models\ShelfItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $users = User::factory()->count(50)->create();

        $compactDiscs = CompactDisc::factory()->count(100)->create();

        ShelfItem::factory()
            ->recycle($users)
            ->count(300)
            ->forCompactDiscs($compactDiscs)
            ->create();
    }
}

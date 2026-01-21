<?php

namespace Database\Seeders;

use App\Models\CompactDisc;
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
        $users = User::factory(50)->create();

        CompactDisc::factory()
            ->recycle($users)
            ->count(300)
            ->create();
    }
}

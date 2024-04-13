<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Colors;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Colors::factory()->count(10)->create();
    }
}

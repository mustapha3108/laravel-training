<?php

namespace Database\Seeders;

use App\Models\serialkiller;
use App\Models\User;
use App\Models\victim;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //serialkiller::factory(100)->create();
        victim::factory(200)->create();
    }
}

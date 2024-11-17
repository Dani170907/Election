<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\CandidateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);

        $this->call(CandidateSeeder::class);
        // Candidate::factory(3)->create();

        $this->call(UserSeeder::class);
        // User::factory(10)->create();

    }
}

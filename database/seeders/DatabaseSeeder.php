<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
// Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CandidateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call(CandidateSeeder::class);

        // User::factory()->create([
        //     'name' => 'user 1',
        //     'email' => 'user1@example.com',
        // ]);

        // Candidate::factory(3)->create();

    }
}

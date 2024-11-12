<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Database\Seeders\CandidateSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidate::factory()->create([
            'name' => 'Liwaul',
            'description' => 'Visi Misi',
            'created_at' => now()
        ]);
    }
}

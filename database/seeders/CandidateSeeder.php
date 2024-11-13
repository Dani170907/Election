<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            [
                'name' => 'Ahmad Liwaul Hamdi',
                'description' => 'Menjaga tata tertib sekolah',
                'photo' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'Nur Atika',
                'description' => 'Mengharumkan nama Sekolah',
                'photo' => null,
                'created_at' => now(),
            ]
        ]);
    }
}

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
                'description' => 'Meningkatkan prestasi siswa di bidang akademik dan non-akademik ',
                'photo' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'Dani Ramadhan',
                'description' => 'Menjadikan OSIS dan para siswa memiliki literasi digital yang baik di zaman yang serba AI',
                'photo' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'Nabil',
                'description' => 'Menjalankan kegiatan yang melibatkan siswa untuk mendukung kreativitas',
                'photo' => null,
                'created_at' => now(),
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startNis = 226385;
        $endNis = 226424;
        $users = [];

        for ($nis = $startNis; $nis <= $endNis; $nis++) {
            $users[] = [
                'name' => fake('id')->name,
                'nis' => substr_replace($nis, '.', 2, 0),
                'password' => bcrypt('123'),
                'role' => 'student',
                'created_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Dani Ramadhan',
                'nis' => '22.6392',
                'password' => bcrypt('123'),
                'role' => 'student',
                'created_at' => now(),
            ],
            [
                'name' => 'Farel Ahmad',
                'nis' => '22.6393',
                'password' => bcrypt('123'),
                'role' => 'student',
                'created_at' => now(),
            ],
            [
                'name' => 'Fiqih Hadinata',
                'nis' => '22.6394',
                'password' => bcrypt('123'),
                'role' => 'student',
                'created_at' => now(),
            ],
        ]);
    }
}

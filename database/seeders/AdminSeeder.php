<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dzaky Ardiansyah',
            'nis' => '',
            'password' => bcrypt('admin 1234'),
            'role' => 'admin',
        ]);
    }
}

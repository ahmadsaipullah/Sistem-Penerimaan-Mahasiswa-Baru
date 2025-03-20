<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create( [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'level_id' => '1',
            'password' => Hash::make(123456789),
        ]);

        User::Create( [
            'name' => 'Assesor',
            'email' => 'assesor@gmail.com',
            'level_id' => '2',
            'password' => Hash::make(123456789),
        ]);

        User::Create( [
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'level_id' => '3',
            'password' => Hash::make(123456789),
        ]);
    }
}

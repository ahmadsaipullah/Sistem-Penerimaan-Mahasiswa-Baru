<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::Create( [
            'level' => 'Pengelola RPL',

        ]);

       Level::Create( [

            'level' => 'Assesor',

        ]);

       Level::Create( [

            'level' => 'Mahasiswa'
        ]);
    }
}

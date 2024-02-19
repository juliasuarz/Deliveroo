<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Superpower;

class SuperpowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Superpower::create(['superpoder' => 'volar']);
        Superpower::create(['superpoder' => 'trepar']);
        Superpower::create(['superpoder' => 'lanzar telarañas']);
        Superpower::create(['superpoder' => 'superfuerza']);
    }
}

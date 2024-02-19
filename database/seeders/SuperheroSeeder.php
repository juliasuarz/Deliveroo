<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Superhero;

class SuperheroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Superhero::create([
            'nombre' => 'Superman',
            'editorial_id' => 1, // ID de DC
        ]);


        Superhero::create([
            'nombre' => 'Spiderman',
            'editorial_id' => 2, // ID de Marvel
        ]);
    }
}

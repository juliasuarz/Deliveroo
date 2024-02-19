<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Superhero;
use App\Models\Superpower;

class SuperheroSuperpowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superman = Superhero::where('nombre', 'Superman')->first();
        $spiderman = Superhero::where('nombre', 'Spiderman')->first();
    
        $volar = Superpower::where('superpoder', 'volar')->first();
        $trepar = Superpower::where('superpoder', 'trepar')->first();
        $lanzaredes = Superpower::where('superpoder', 'lanzar telarañas')->first();
        $fuerza = Superpower::where('superpoder', 'superfuerza')->first();

        $superman->superpowers()->attach([$volar->id, $fuerza->id]);
        $spiderman->superpowers()->attach([$lanzaredes->id, $trepar->id]);
    }
}

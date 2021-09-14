<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Building::create([
            'name' => 'Plantas',
            'description' => 'Plantas de la escuela.'
        ]);

        Building::create([
            'name' => 'Aulas',
            'description' => 'Aulas de la escuela.'
        ]);

        Building::create([
            'name' => 'Cocina',
            'description' => 'Cocina de la escuela.'
        ]);

        Building::create([
            'name' => 'Comedor',
            'description' => 'Comedor de la escuela.'
        ]);

        Building::create([
            'name' => 'Salón de actos',
            'description' => 'Salón de actos de la escuela.'
        ]);

        Building::create([
            'name' => 'Gimnasio',
            'description' => 'Gimnasio de la escuela.'
        ]);

        Building::create([
            'name' => 'Pista deportiva',
            'description' => 'Pista deportiva de la escuela.'
        ]);
    }
}

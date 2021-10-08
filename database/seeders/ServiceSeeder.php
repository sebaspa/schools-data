<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Service::create([
            'name' => 'Colegio',
        ]);

        Service::create([
            'name' => 'Gas',
        ]);

        Service::create([
            'name' => 'Electricidad',
        ]);

        Service::create([
            'name' => 'Fontanería',
        ]);

        Service::create([
            'name' => 'Otros',
        ]);
    }
}

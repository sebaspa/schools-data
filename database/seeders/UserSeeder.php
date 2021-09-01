<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Juan Sebastian',
            'last_name' => 'Parra Manchola',
            'email' => 'email@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('pG^UT4jfvx#v'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->syncRoles('Administrador');

        User::factory(199)->create();
    }
}

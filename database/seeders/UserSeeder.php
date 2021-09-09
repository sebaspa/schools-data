<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'password' => 'pG^UT4jfvx#v',
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->syncRoles('Administrador');

        if (app()->environment() == 'local') {
            User::factory(199)->create();
        }
    }
}

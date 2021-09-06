<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Crear los roles
         */

        //Administrador
        $roleAdmin = Role::create(['name' => 'Administrador']);

        /**
         * Crear los permisos y asignarlos a roles
         */

        //Dashboard
        //Permission::create(['name' => 'dashboard'])->syncRoles([$roleAdmin]);

        //Usuarios
        Permission::create(['name' => 'users.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.show'])->syncRoles([$roleAdmin]);
    }
}

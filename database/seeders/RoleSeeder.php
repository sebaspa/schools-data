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
        Permission::create(['name' => 'users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.show', 'description' => 'Ver detalle de usuarios'])->syncRoles([$roleAdmin]);
        //Roles
        Permission::create(['name' => 'roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver detalle de roles'])->syncRoles([$roleAdmin]);
        //Escuelas
        Permission::create(['name' => 'schools.index', 'description' => 'Ver listado de escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.edit', 'description' => 'Editar escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.destroy', 'description' => 'Eliminar escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.show', 'description' => 'Ver detalle de escuelas'])->syncRoles([$roleAdmin]);
        //Construcciones
        Permission::create(['name' => 'buildings.index', 'description' => 'Ver listado de construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.edit', 'description' => 'Editar construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.destroy', 'description' => 'Eliminar construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.show', 'description' => 'Ver detalle de construcciones'])->syncRoles([$roleAdmin]);
    }
}

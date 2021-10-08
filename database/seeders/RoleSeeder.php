<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        if (DB::table('roles')->where('name', 'Administrador')->count() > 0) {
            $roleAdmin = Role::findByName('Administrador');
        } else {
            $roleAdmin = Role::create(['name' => 'Administrador']);
        }

        /**
         * Crear los permisos y asignarlos a roles
         */

        //Dashboard
        //Permission::create(['name' => 'dashboard'])->syncRoles([$roleAdmin]);

        //Usuarios
        Permission::create(['name' => 'users.create', 'description' => 'Crear usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.show', 'description' => 'Ver detalle de usuarios'])->syncRoles([$roleAdmin]);
        //Roles
        Permission::create(['name' => 'roles.create', 'description' => 'Crear roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver detalle de roles'])->syncRoles([$roleAdmin]);
        //Escuelas
        Permission::create(['name' => 'schools.create', 'description' => 'Crear escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.index', 'description' => 'Ver listado de escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.edit', 'description' => 'Editar escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.destroy', 'description' => 'Eliminar escuelas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'schools.show', 'description' => 'Ver detalle de escuelas'])->syncRoles([$roleAdmin]);
        //Construcciones
        Permission::create(['name' => 'buildings.create', 'description' => 'Crear construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.index', 'description' => 'Ver listado de construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.edit', 'description' => 'Editar construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.destroy', 'description' => 'Eliminar construcciones'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'buildings.show', 'description' => 'Ver detalle de construcciones'])->syncRoles([$roleAdmin]);
        //Servicios
        Permission::create(['name' => 'services.create', 'description' => 'Crear servicios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'services.index', 'description' => 'Ver listado de servicios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'services.edit', 'description' => 'Editar servicios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'services.destroy', 'description' => 'Eliminar servicios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'services.show', 'description' => 'Ver detalle de servicios'])->syncRoles([$roleAdmin]);
        //Asignar Descripciones - Construcciones
        Permission::create(['name' => 'description.assign', 'description' => 'Asignar descripciones a las escuelas'])->syncRoles([$roleAdmin]);
        //Asignar Planimetria
        Permission::create(['name' => 'plan.assign', 'description' => 'Asignar planimetría a las escuelas'])->syncRoles([$roleAdmin]);
        //Asignar Tipos de energia
        Permission::create(['name' => 'energy.assign', 'description' => 'Asignar tipos de energías a las escuelas'])->syncRoles([$roleAdmin]);

    }
}

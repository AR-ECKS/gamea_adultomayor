<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'acceso_panel_control',
            'acceso_administracion',
            'acceso_roles',
            'crear_rol',
            'ver_rol',
            'editar_rol',
            'eliminar_rol',
            'restaurar_rol',
            'acceso_usuarios',
            'crear_usuario',
            'ver_usuario',
            'editar_usuario',
            'eliminar_usuario',
            'restaurar_usuario',
            'acceso_adulto_mayor',
            'crear_registro_adulto_mayor',
            'ver_registro_adulto_mayor',
            'editar_registro_adulto_mayor',
            'eliminar_registro_adulto_mayor',
            'restaurar_registro_adulto_mayor',
            'acceso_registro_atencion',
            'crear_registro_atencion',
            'ver_registro_atencion',
            'editar_registro_atencion',
            'eliminar_registro_atencion',
            'restaurar_registro_atencion',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}

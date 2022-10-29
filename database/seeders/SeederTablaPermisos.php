<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//* spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //ROLES
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',

            //USUARIOS
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',
           
            // pacientes
            'ver-paciete',
            'crear-paciente',
            'editar-paciente',
            'borrar-paciente',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}

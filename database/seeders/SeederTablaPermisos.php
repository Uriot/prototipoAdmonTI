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
            // roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',

            //usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',

            // pacientes
            'ver-paciente',
            'crear-paciente',
            'editar-paciente',
            'borrar-paciente',
            'imprimir-paciente',
            'editar-calendario',

            //reporte
            'crear-pdf',
            'crear-excel',

            //expedientes
            'crear-expediente',
            'editar-expediente',
            'ver-expediente',
            'borrar-expediente'

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}

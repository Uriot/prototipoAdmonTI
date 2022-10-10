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
            // patients
            'ver-patient',
            'crear-patient',
            'editar-patient',
            'borrar-patient',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}

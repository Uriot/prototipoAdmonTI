<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_1',
        'nombre_2',
        'nombre_3',
        'apellido_1',
        'apellido_2',
        'apellido_de_casado',
        'estado_civil',
        'telefono',
        'direccion',
        'dpi',
        'departamento',
        'municipio',
        'estado_dpi',
        'fecha_vencimiento_dpi',
        'acceso_al_iggs',
        'nacionalidad',
        'edad',
        'fecha_de_nacimiento',
        'estado_paciente',
        'region',
        'direccion_dpi',
        'zona',
        'colonia_barrio_aldea',
        'departamento_actual',
        'municipio_actual',
        'referencia_vivienda',
        'telefono_casa',
        'celular_1',
        'celular_2',
    ];
}

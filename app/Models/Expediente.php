<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = "tb_paciente";
    protected  $primaryKey = 'id_Paciente';
    protected $fillable = [
        'Nombre_1',
        'Nombre_1',
        'Nombre_2',
        'Nombre_3',
        'Apellido_1',
        'Apellido_2',
        'Apellido_de_Casada',
        'Estado_Civil',
        'idDatos_DPI',
        'Acceso_al_Igss',
        'Nacionalidad',
        'Edad',
        'Fecha_Nacimiento',
        'id_Estado_Paciente',
        'Religion',
        'Direccion',
        'Zona',
        'Colonia_Barrio_Aldea',
        'ID_Municipio',
        'Referencia_Vivienda',
        'Telefono_Casa',
        'Celular_1',
        'Celular_2',
    ];

}

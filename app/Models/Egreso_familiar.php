<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso_familiar extends Model
{
    use HasFactory;
    protected $table = "tb_vivienda";
    protected  $primaryKey = 'id_vivienda';
    protected $fillable = [
        'id_tipo_vivienda',
        'vehiculo_propio',
        'tipo_vehiculo',
        'no_hijos',
        'total_nucleo_familiar'
    ];
}

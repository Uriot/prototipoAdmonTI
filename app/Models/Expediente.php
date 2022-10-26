<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = "tb_Expedientes";
    protected  $primaryKey = 'id_Expedientes';
    protected $fillable = [
        'id_paciente',
        'id_vivienda',
        'id_ingreso_familiar',
        'id_egreso_familiar'
    ];
}
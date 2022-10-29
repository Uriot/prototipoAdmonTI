<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso_familiar extends Model
{
    use HasFactory;
    protected $table = "tb_ingreso_familiar";
    protected  $primaryKey = 'id_ingreso_familiar';
    protected $fillable = [
        'personas_laboran',
        'sector_publico',
        'sector_privado',
        'negocio_propio',
        'remesas',
        'ayuda_social',
        'total_aproximado'
        ];
}

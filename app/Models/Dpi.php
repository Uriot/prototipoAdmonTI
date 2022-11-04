<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpi extends Model
{
    use HasFactory;
    protected $table = "tb_datos_dpi";
    protected  $primaryKey = 'idDatos_DPI';

    protected $fillable = [
        'DPI',
        'ID_MUNICIPIO',
        'ESTADO_DPI',
        'FECHA_VENCIMIENTO',
    ];
}

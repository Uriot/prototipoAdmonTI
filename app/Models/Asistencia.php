<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = "tb_asistencias";
    protected  $primaryKey = 'id_asistencias';

    protected $fillable = [
        'id_paciente',
        'fecha_asistencia',
        'observacion',
    ];
}

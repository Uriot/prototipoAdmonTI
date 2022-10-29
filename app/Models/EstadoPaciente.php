<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPaciente extends Model
{
    use HasFactory;

    protected $table = "tb_estado_paciente";
    protected  $primaryKey = 'id_Estado_Paciente';
    protected $fillable = [
        'estado',
    ];
}

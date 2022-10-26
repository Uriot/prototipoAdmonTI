<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamiliarResponsable extends Model
{
    use HasFactory;

    protected $table = "tb_familiar_responsable";

    protected  $primaryKey = 'id_familiar_responsable';

    protected $fillable = [
        'nom_encar',
        'apell_encar',
        'id_parentesco',
        'Direccion',
        'Zona',
        'Colonia_Barrio_Aldea',
        'ID_Municipio',
        'Celular_1',
        'Celular_2',
        'nom_padre',
        'apell_padre',
        'estado_sit_dad',
        'nom_madre',
        'apell_madre',
        'estado_sit_mad',
        'especifique_parentesco',
    ];

    public function parentesco()
    {
        return $this->hasOne(Parentesco::class, 'id_parentesco', 'id_parentesco');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id_Municipio', 'ID_Municipio');
    }
}

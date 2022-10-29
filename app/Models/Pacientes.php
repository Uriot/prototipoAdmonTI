<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Pacientes extends Model
{
    use HasFactory;
    protected $table = "tb_paciente";
    protected  $primaryKey = 'id_Paciente';
    protected $fillable = [
        'no_expediente',
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

    public function dpi()
    {
        return $this->hasOne(Dpi::class, 'idDatos_DPI', 'idDatos_DPI');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id_Municipio', 'ID_Municipio');
    }

    public function estadoPaciente()
    {
        return $this->hasOne(EstadoPaciente::class, 'id_Estado_Paciente', 'id_Estado_Paciente');
    }

    public function familiarResponsable()
    {
        return $this->hasOne(FamiliarResponsable::class, 'id_familiar_responsable', 'id_familiar_responsable');
    }


    //! funcion para recorrer filtros por texto
    public function getForFiltersText($filters)
    {
        $query = $this->newQuery();
        if(!is_null($filters)) {
            foreach ($filters as $key => $value) {
                if(!is_null($value)) {
                    $query->where($key, 'like', '%'.$value.'%');
                }
            }
        }
        return $query;
    }

    //! filtros especificos
    public function getForFilters(array $filters)
    {

        $query = $this->newQuery();
        if (isset($filters[0]) && isset($filters[1])) {
            $query = $this->newQuery();
            $query->whereBetween('Edad', [$filters[0], $filters[1]]);
        }
        if (isset($filters[2])) {
            $query = $this->newQuery();
            $query->where('Nombre_1', 'like', '%'.$filters[2].'%')
            ->orWhere('Nombre_2', 'like', '%'.$filters[2].'%')
            ->orWhere('Nombre_3', 'like', '%'.$filters[2].'%')
            ->orWhere('Apellido_1', 'like', '%'.$filters[2].'%')
            ->orWhere('Apellido_2', 'like', '%'.$filters[2].'%')
            ->orWhere('Apellido_de_Casada', 'like', '%'.$filters[2].'%')
            ->orWhere('no_expediente', 'like', '%'.$filters[2].'%');
        }

        if (isset($filters[0]) && isset($filters[1]) && isset($filters[2])) {
            $query = $this->newQuery();
            $query->whereBetween('Edad', [$filters[0], $filters[1]])
            ->where(function ($query) use ($filters) {
                $query->where('Nombre_1', 'like', '%'.$filters[2].'%')
                ->orWhere('Nombre_2', 'like', '%'.$filters[2].'%')
                ->orWhere('Nombre_3', 'like', '%'.$filters[2].'%')
                ->orWhere('Apellido_1', 'like', '%'.$filters[2].'%')
                ->orWhere('Apellido_2', 'like', '%'.$filters[2].'%')
                ->orWhere('Apellido_de_Casada', 'like', '%'.$filters[2].'%')
                ->orWhere('no_expediente', 'like', '%'.$filters[2].'%');
            });
        }

        return $query;
    }
}

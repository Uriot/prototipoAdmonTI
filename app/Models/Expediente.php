<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = "tb_informacion_medica";
    protected  $primaryKey = 'id_infomedico';
    protected $fillable = [
        'id_paciente',
        'id_expediente',
        'fecha_diagnostico',
        'fecha_ingreso',	
        'id_A_Vascular',
        'hipertenso',
        'diabetico',	
        'cardiopatia',	
        'fistula',	
        'tipo_sangre',	
        'tratamientos' ,		
        'peso',
        'Otros'
    ];

    public function vivienda(){ 
        return $this->hasOne(Vivienda::class);             
    }
    
    public function ingreso_familiar(){ 
        return $this->hasOne(Ingreso_familiar::class);             
    }   

    public function egreso_familiar(){ 
        return $this->hasOne(Egreso_familiar::class);             
    }  

    public function pacientes(){ 
        return $this->hasOne(Pacientes::class);             
    }  
    
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

    protected $table = "tb_parentesco";
    protected  $primaryKey = 'id_parentesco';

    protected $fillable = [
        'tipo_parentesco',
    ];
}

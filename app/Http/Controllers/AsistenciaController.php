<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        return view('pacientes.index');
    }

    public function show($id_Paciente)
    {
        return view('pacientes.asistencia', compact('id_Paciente'));
    }
}

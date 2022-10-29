<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->get('texto'))) {
            $texto = trim($request->get('texto'));
            $expedientes = DB::select('select ex.id_Expedientes, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, tdpi.DPI, tdpi.FECHA_VENCIMIENTO, tif.sector_publico, tif.sector_privado, tef.alimentacion, tef.educacion, tef.arrendamiento, tv.total_nucleo_familiar from tb_Expedientes ex inner join tb_Paciente p on p.id_Paciente = ex.id_paciente left join tb_Datos_DPI tdpi on tdpi.idDatos_DPI = p.idDatos_DPI left join tb_ingreso_familiar tif on tif.id_ingreso_familiar = ex.id_ingreso_familiar left join tb_egreso_familiar tef on tef.id_egreso_familiar = ex.id_egreso_familiar left join tb_vivienda tv on tv.id_vivienda = ex.id_vivienda');
        } else {
            $texto = trim($request->get('texto'));
            $expedientes = DB::select('select ex.id_Expedientes, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, tdpi.DPI, tdpi.FECHA_VENCIMIENTO, tif.sector_publico, tif.sector_privado, tef.alimentacion, tef.educacion, tef.arrendamiento, tv.total_nucleo_familiar from tb_Expedientes ex inner join tb_Paciente p on p.id_Paciente = ex.id_paciente left join tb_Datos_DPI tdpi on tdpi.idDatos_DPI = p.idDatos_DPI left join tb_ingreso_familiar tif on tif.id_ingreso_familiar = ex.id_ingreso_familiar left join tb_egreso_familiar tef on tef.id_egreso_familiar = ex.id_egreso_familiar left join tb_vivienda tv on tv.id_vivienda = ex.id_vivienda where p.Nombre_1 like \'%' . $texto . '%\' or p.Nombre_2 like \'%' . $texto . '%\' or p.Apellido_1 like \'%' . $texto . '%\' or p.Apellido_2 like \'%' . $texto . '%\'');
        }
        return view('expedientes.index', compact('expedientes', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
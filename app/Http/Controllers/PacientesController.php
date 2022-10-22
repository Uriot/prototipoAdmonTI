<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Pacientes;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if (is_null($request->get('texto'))) {
            $texto = trim($request->get('texto'));
            $pacientes = DB::table('tb_paciente')
                ->select('id_Paciente', 'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1')
                ->orderBY('Nombre_1')
                ->paginate(6);
        } else {

            $texto = trim($request->get('texto'));
            //$pacientes = Patient::paginate(6);
            $pacientes = DB::table('tb_paciente')
                ->select('id_Paciente', 'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1')
                ->where('Nombre_1', 'LIKE', '%' . $texto . '%')
                ->orwhere('Nombre_2', 'LIKE', '%' . $texto . '%')
                ->orwhere('Apellido_1', 'LIKE', '%' . $texto . '%')
                ->orwhere('Apellido_2', 'LIKE', '%' . $texto . '%')
                ->orderBY('Nombre_1')
                ->paginate(6);
        }
        return view('pacientes.index', compact('pacientes', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $results = DB::select('select * from tb_departamento ');

        $depto = DB::select('select ID_DEPARTAMENTO, DEPARTAMENTO from tb_departamento ');
        //$paciente = DB::select("select * from tbl_pacientes inner join"); //name, apellido, id_departamento, id_municipio
        // DB::table('tb_departamento')->select('ID_DEPARTAMENTO', 'DEPARTAMENTO');
        return  view('pacientes.create', compact('depto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name1' => 'required',
            'lastName1' => 'required',
            'genero' => 'required',
            'estadoCivil' => 'required',
            'fechaNacimiento' => 'required',
            'edad' => 'required',
            'accesoIGSS' => 'required',
            'estadoDPI' => 'required',
            'deptoOrigen' => 'required',
            'muniOrigen' => 'required',
            'address' => 'required',
            'zona' => 'required',
            'coloniaBarrioAldea' => 'required',
            'deptoActual' => 'required',
            'muniActual' => 'required',
            'telefonoCasa' => 'required',
            'telefono1' => 'required',

            'nameEncargado' => 'required',
            'lastNameEncargado' => 'required',
            'parentescoGeneral' => 'required',
            'addressGeneral' => 'required',
            'zonaGeneral' => 'required',
            'coloniaBarrioAldeaGeneral' => 'required',

            'deptoActualGeneral' => 'required',
            'muniActualGeneral' => 'required',
            'telefono1General' => 'required',
            'muniActualGeneral' => 'required',

        ]);

        return $request;
        // Blog::create($request->all());

        // return redirect()->route('pacientes.index')
        //     ->with('success', 'Paciente creado correctamente.');
    }

    public function municipiosGet($id)
    {
        $municipiosValues = DB::select("select ID_MUNICIPIO, MUNICIPIO from tb_municipio where ID_DEPARTAMENTO = $id");

        return $municipiosValues;
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
   

    public function edit($id_Paciente)
    {
        $depto = DB::select('select ID_DEPARTAMENTO, DEPARTAMENTO from tb_departamento ');
        $paciente = DB::select('select 
                                    id_paciente as id,
                                    no_expediente as expediente,
                                    nombre_1,
                                    nombre_2,
                                    nombre_3,
                                    apellido_1,
                                    apellido_2,
                                    apellido_de_casada,
                                    estado_civil,
                                    p.iddatos_dpi as id_datos_dpi,
                                    p.acceso_al_igss,
                                    p.nacionalidad,
                                    p.edad,
                                    p.genero,
                                    p.fecha_nacimiento,
                                    p.id_estado_paciente_activo as paciente_activo,
                                    p.id_estado_paciente_inactivo as paciente_inactivo,
                                    p.religion,
                                    p.direccion,
                                    p.zona,
                                    p.colonia_barrio_aldea,
                                    p.referencia_vivienda as referencia_vivienda,
                                    p.telefono_casa,
                                    p.celular_1,
                                    p.Celular_2 ,
                                    p.id_familia_responsable as id_familiar_responsable,
                                    mactual.id_municipio as id_municipio_actual,
                                    mactual.municipio as municipio_actual,
                                    dactual.id_departamento as id_departamento_actual,
                                    dactual.departamento as departamento_actual,
                                    dd.iddatos_dpi as id_datos_dpi,
                                    dd.dpi as dpi,
                                    dd.estado_dpi as estado_dpi,
                                    dd.fecha_vencimiento as fecha_vencimiento_dpi,
                                    mdpi.id_municipio as id_municipio_dpi,
                                    mdpi.municipio as municipio_dpi,
                                    ddpi.id_departamento as id_departamento_dpi,
                                    ddpi.departamento as departamento_dpi
                                from tb_paciente p 
                                inner join tb_municipio mActual on mActual.ID_MUNICIPIO = p.ID_Municipio 
                                inner join tb_departamento dActual on dActual.ID_DEPARTAMENTO = mActual.ID_DEPARTAMENTO
                                inner join tb_datos_dpi dd on dd.idDatos_DPI = p.idDatos_DPI
                                inner join tb_municipio mDpi on mDpi.ID_MUNICIPIO = dd.ID_Municipio 
                                inner join tb_departamento dDpi on dDpi.ID_DEPARTAMENTO = mDpi.ID_DEPARTAMENTO
                                where id_Paciente = ' . $id_Paciente);
        foreach ($paciente as $pass) {
            $pacientes = $pass;
        }
        // $pacientes = Pacientes::find($id_Paciente); 
        // $pacientes = Pacientes::find($id_Paciente);
        return view('pacientes.edit', compact('pacientes', 'depto'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
}

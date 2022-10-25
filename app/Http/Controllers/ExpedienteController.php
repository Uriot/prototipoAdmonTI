<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Expediente;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
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
        return view('expediente.index', compact('pacientes', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $results = DB::select('select * from tb_departamento ');

        //$parentesco = DB::select('select id_parentesco , tipo_parentesco from tb_parentesco');
        //$depto = DB::select('select ID_DEPARTAMENTO, DEPARTAMENTO from tb_departamento ');
        //$paciente = DB::select("select * from tbl_pacientes inner join"); //name, apellido, id_departamento, id_municipio
        // DB::table('tb_departamento')->select('ID_DEPARTAMENTO', 'DEPARTAMENTO');
        //return  view('expediente.create', compact('depto', 'parentesco'));


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

            'id_infomedico' => 'required',
            'id_paciente' => 'required',
            'id_expediente' => 'required',
            'fecha_diagnostico' => 'required',
            'fecha_ingreso'	 => 'required',	
            'id_A_Vascular' => 'required',
            'hipertenso' => 'required',
            'diabetico'	 => 'required',	
            'cardiopatia' => 'required',	
            'fistula' => 'required',	
            'tipo_sangre' => 'required',	
            'tratamientos' => 'required',		
            'peso'	=> 'required',
            'Otros' => 'required',

            'vehiculo_propio'  => 'required',
            'tipo_propio'  => 'required',


            'personas_laboran'  => 'required',
            'sector_publico'  => 'required',
            'sector_privado'  => 'required',
            'negocio_propio'  => 'required',
            'remesas'  => 'required',
            'ayuda_social'  => 'required',
            'total_aproximado'  => 'required',

            'alimentacion'  => 'required',
            'educacion'  => 'required',
            'arrendamiento'  => 'required',
            'servicios'  => 'required',
            'salud'  => 'required',
            'renta'  => 'required',
            'costos_traslado'  => 'required',
            'total_aproximado'  => 'required',

        ]);

        return $request;
        // Blog::create($request->all());

        // return redirect()->route('pacientes.index')
        //     ->with('success', 'Paciente creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_Expediente)
    {
       $expedientes = DB::select('select a.id_infomedico as id,
       a.fecha_diagnostico, 
       a.fecha_ingreso, 
       a.hipertenso, 
       a.diabetico, 
       a.cardiopatia, 
       a.fistula, 
       a.tipo_sangre, 
       a.tratamientos, 
       a.peso, 
       a.Otros, 
       a.Observacion,
       v.vehiculo_propio,
       v.tipo_vehiculo,
       c.personas_laboran,
       c.sector_publico,
       c.sector_privado,
       c.negocio_propio,
       c.remesas,
       c.ayuda_social,
       c.total_aproximado,
       e.alimentacion,
       e.educacion,
       e.arrendamiento,
       e.servicios,
       e.salud,
       e.renta,
       e.costos_traslado,
       e.total_aproximado
       from tb_informacion_medica a
       inner join tb_expedientes b on b.id_expedientes=a.id_expediente
       join tb_paciente p on p.id_paciente=b.id_paciente
       inner join tb_vivienda v on v.id_vivienda=b.id_vivienda
       inner join tb_ingreso_familiar c on c.id_ingreso_familiar=b.id_ingreso_familiar
       join tb_egreso_familiar e on e.id_egreso_familiar=b.id_egreso_familiar
       where p.id_paciente= ' . $id_Expediente);

       foreach ($expedientes as $pass) {
        $expediente = $pass;
    }
                        
        
        //$expediente = Expediente::find($id_infomedico);
        //var_dump($expediente->id_infomedico);
        //die();


        
        // $pacientes = Pacientes::find($id_Paciente); 
        // $pacientes = Pacientes::find($id_Paciente);
        return view('expediente.edit', compact('expediente'));
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
        $insertar = array(
            $request-> idExpediente,
        
    
    
    
            );


        //add sp
        

        
        $insertar=json_encode($insertar);

        $insertar = str_replace("[","",$insertar);
        $insertar = str_replace("]","",$insertar);

        DB::select('call nombreProcedure('.$insertar.')');

        return $request;
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

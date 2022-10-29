<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Expediente;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
Use Exception;

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
                ->select('id_Paciente', 'no_expediente' ,'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1')
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
    public function create(Request $request)
    {   
        $are = $request;
        $arr = str_split($are);
        $infopaciente = DB::select('Select id_Paciente, no_expediente, Nombre_1, Apellido_1 from tb_paciente where id_Paciente=' . $arr[23]);

        foreach ($infopaciente as $ipac) {
            $infopacientes = $ipac;
        }
        

        return view('expediente.create', compact('infopacientes'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Clase Store


        try
            {
//write your codes here



                $insertar = array( 
                    $request->id_expediente,
                    $request->fecha_diagnostico,
                    $request->fecha_ingreso,
                    $request->hipertenso,
                    $request->diabetico,
                    $request->cardiopatia,
                    $request->id_A_Vascular,
                    $request->tipo_sangre,
                    $request->tratamientos,
                    $request->peso,
                    $request->Otros,
                    $request->Observacion,
                    $request->tipo_vivienda,
                    $request->vehiculo_propio,
                    $request->tipo_vehiculo,
                    $request->no_hijos,
                    $request->total_nucleo_familiar,
                    $request->personas_laboran,
                    $request->sector_publico,
                    $request->sector_privado,
                    $request->negocio_propio,
                    $request->remesas,
                    $request->ayuda_social,
                    $request->total_aproximado_i,
                    $request->alimentacion,
                    $request->educacion,
                    $request->arrendamiento,
                    $request->servicios,
                    $request->salud,
                    $request->renta,
                    $request->costos_traslado,
                    $request->total_aproximado_e

                    );


                $insertar=json_encode($insertar);

                $insertar = str_replace("[","",$insertar);
                $insertar = str_replace("]","",$insertar);

                DB::select('call SP_EXPEDIENTE('.$insertar.')');
                echo "<script>alert('Registro agregado correctamente');</script>";



                if (is_null($request->get('texto'))) {
                    $texto = trim($request->get('texto'));
                    $pacientes = DB::table('tb_paciente')
                        ->select('id_Paciente', 'no_expediente' ,'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1')
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
        catch(Exception $e)
            {

                //dd($e->getMessage());
                echo "<script>alert('Este registro ya existe, intente Editarlo');</script>";
                

                if (is_null($request->get('texto'))) {
                    $texto = trim($request->get('texto'));
                    $pacientes = DB::table('tb_paciente')
                        ->select('id_Paciente', 'no_expediente' ,'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1')
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
       
        try
        {
        //write your codes here

        $expedientes = DB::select('Select 
    
        te.id_Expedientes AS id,
               p.Nombre_1,
               p.Apellido_1,
               p.no_expediente,
               im.fecha_diagnostico, 
               im.fecha_ingreso, 
               im.hipertenso, 
               im.diabetico, 
               im.cardiopatia, 
               im.id_A_Vascular, 
               im.tipo_sangre, 
               im.tratamientos, 
               im.peso, 
               im.Otros, 
               im.Observacion,
               v.tipo_vivienda,
               v.vehiculo_propio,
               v.tipo_vehiculo,
               v.no_hijos,
               v.total_nucleo_familiar,
               c.personas_laboran,
               c.sector_publico,
               c.sector_privado,
               c.negocio_propio,
               c.remesas,
               c.ayuda_social,
               c.total_aproximado_i,
               e.alimentacion,
               e.educacion,
               e.arrendamiento,
               e.servicios,
               e.salud,
               e.renta,
               e.costos_traslado,
               e.total_aproximado_e
        
              from tb_informacion_medica im
               inner join tb_expedientes te
               on im.id_infomedico = te.id_infomedico
               INNER join tb_paciente p 
               on p.id_paciente=im.id_paciente
               inner join tb_vivienda v 
               on v.id_vivienda=te.id_vivienda
               inner join tb_ingreso_familiar c 
               on c.id_ingreso_familiar=te.id_ingreso_familiar
               INNER join tb_egreso_familiar e 
               on e.id_egreso_familiar=te.id_egreso_familiar
               where p.id_paciente=' . $id_Expediente);
 
       
 
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
        catch(Exception $e)
        {
           
                echo "<script>alert('Este registro ya se editó, intente con otro');</script>";
                

                return view('home');




        }
        





        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $insertar = array( 
            $request->id_paciente,
            $request->fecha_diagnostico,
            $request->fecha_ingreso,
            $request->hipertenso,
            $request->diabetico,
            $request->cardiopatia,
            $request->id_A_Vascular,
            $request->tipo_sangre,
            $request->tratamientos,
            $request->peso,
            $request->Otros,
            $request->Observacion,
            $request->tipo_vivienda,
            $request->vehiculo_propio,
            $request->tipo_vehiculo,
            $request->no_hijos,
            $request->total_nucleo_familiar,
            $request->personas_laboran,
            $request->sector_publico,
            $request->sector_privado,
            $request->negocio_propio,
            $request->remesas,
            $request->ayuda_social,
            $request->total_aproximado_i,
            $request->alimentacion,
            $request->educacion,
            $request->arrendamiento,
            $request->servicios,
            $request->salud,
            $request->renta,
            $request->costos_traslado,
            $request->total_aproximado_e

            );

        
        $insertar=json_encode($insertar);

        $insertar = str_replace("[","",$insertar);
        $insertar = str_replace("]","",$insertar);
        

       //DB::select('call SP_UPDATE_EXPEDIENTE('.$insertar.')');
       
       echo "<script>alert('Registro agregado correctamente');</script>";
        
        

       if (is_null($request->get('texto'))) {
           $texto = trim($request->get('texto'));
           $pacientes = DB::table('tb_paciente')
               ->select('id_Paciente', 'no_expediente' ,'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1')
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
}

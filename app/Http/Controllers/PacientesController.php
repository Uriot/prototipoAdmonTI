<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PacientesController  extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-rol|crear-patient|editar-patient|borrar-patient', ['only' => ['index','show']]);
        $this->middleware('permission:crear-patient', ['only' => ['create','store']]);
        $this->middleware('permission:editar-patient',   ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-patient', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto =trim($request->get('texto'));
        //$pacientes = Patient::paginate(6);
        $pacientes=DB::table('pacientes')
                    ->select('id','nombre_1','nombre_2','apellido_1','apellido_2','direccion','telefono')
                    ->where('nombre_1','LIKE','%'.$texto.'%')
                    ->orwhere('nombre_2','LIKE','%'.$texto.'%')
                    ->orwhere('apellido_1','LIKE','%'.$texto.'%')
                    ->orwhere('apellido_2','LIKE','%'.$texto.'%')
                    ->orwhere('apellido_2','LIKE','%'.$texto.'%')
                    ->orderBY('nombre_1')
                    ->paginate(6);
        return view('pacientes.index',compact('pacientes','texto'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado correctamente.');
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
        $blog = json_decode("{id:1,title:'pedro',content:'abc@gasd.com'}");
        return view('pacientes.edit', compact('blog'));
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
        $request->validate([
            'nombre_1'=> 'required',
            'nombre_2'=> 'required',
            'nombre_3'=> 'required',
            'apellido_1'=> 'required',
            'apellido_2'=> 'required',
            'apellido_de_casado'=> 'required',
            'estado_civil'=> 'required',
            'telefono'=> 'required',
            'direccion'=> 'required',
            'dpi'=> 'required',
            'departamento'=> 'required',
            'municipio'=> 'required',
            'estado_dpi'=> 'required',
            'fecha_vencimiento_dpi'=> 'required',
            'acceso_al_iggs'=> 'required',
            'nacionalidad'=> 'required',
            'edad'=> 'required',
            'fecha_de_nacimiento'=> 'required',
            'estado_paciente'=> 'required',
            'region'=> 'required',
            'zona'=> 'required',
            'colonia_barrio_aldea'=> 'required',
            'departamento_actual'=> 'required',
            'municipio_actual'=> 'required',
            'referencia_vivienda'=> 'required',
            'telefono_casa'=> 'required',
            'celular_1'=> 'required',
            'celular_2'=> 'required',
        ]);

        $patient->update($request->all());

        return redirect()->route('pacientes.index')
                        ->with('success','Paciente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient->delete();

        return redirect()->route('pacientes.index')
                        ->with('success','Paciente eliminado correctamente');
    }
}

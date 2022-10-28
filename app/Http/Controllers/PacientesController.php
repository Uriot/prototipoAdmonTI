<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Pacientes;
use Illuminate\Support\Facades\DB;
use PDF;

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
                ->select('id_Paciente', 'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1', 'id_estado_paciente')
                ->orderBY('Nombre_1')
                ->paginate(6);
        } else {

            $texto = trim($request->get('texto'));
            //$pacientes = Patient::paginate(6);
            $pacientes = DB::table('tb_paciente')
                ->select('id_Paciente', 'Nombre_1', 'Nombre_2', 'Apellido_1', 'Apellido_2', 'Direccion', 'Celular_1', 'id_estado_paciente')
                ->where('Nombre_1', 'LIKE', '%' . $texto . '%')
                ->orwhere('Nombre_2', 'LIKE', '%' . $texto . '%')
                ->orwhere('Apellido_1', 'LIKE', '%' . $texto . '%')
                ->orwhere('Apellido_2', 'LIKE', '%' . $texto . '%')
                ->orderBY('Nombre_1')
                ->paginate(6);
        }
        $estados = DB:: select('select id_estado_paciente as id, estado as nombre from tb_estado_paciente');
        return view('pacientes.index', compact('pacientes', 'texto', 'estados'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $results = DB::select('select * from tb_departamento ');

        $parentesco = DB::select('select id_parentesco , tipo_parentesco from tb_parentesco');
        $depto = DB::select('select ID_DEPARTAMENTO, DEPARTAMENTO from tb_departamento ');
        //$paciente = DB::select("select * from tbl_pacientes inner join"); //name, apellido, id_departamento, id_municipio
        // DB::table('tb_departamento')->select('ID_DEPARTAMENTO', 'DEPARTAMENTO');
        return  view('pacientes.create', compact('depto', 'parentesco'));
    }

    public function updateState($id, $estado)
    {
        //$municipiosValues = DB::select("select ID_MUNICIPIO, MUNICIPIO from tb_municipio where ID_DEPARTAMENTO = $id");

        //Query para modificar estado de paciente.
        //update tb_paciente set id_estado_paciente = $estado where id_Paciente = $id
        $bueno = $estado;
        DB::update('update tb_paciente set id_estado_paciente = ? where id_Paciente = ?'
        ,[$bueno, $id]);
        return redirect()->route('pacientes.index',$estado);
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
        if ($request->telefono2 == "") {
            $request->telefono2 = 0;
        }
        if ($request->telefono2General == "") {
            $request->telefono2General = 0;
        }
        if ($request->dpi == "") {
            $request->dpi = 0;
        }
        $values = array(
            $request->noExpediente,
            $request->name1,
            $request->name2,
            $request->name2,
            $request->lastName1,
            $request->lastName2,
            $request->lastName3,
            $request->estadoCivil,
            $request->accesoIGSS,
            $request->nacionalidad,
            $request->edad,
            $request->genero,
            $request->fechaNacimiento,
            1,
            $request->religion,
            $request->address,
            $request->zona,
            $request->coloniaBarrioAldea,
            $request->muniActual,
            $request->refVivienda,
            str_replace("-", "", $request->telefonoCasa),
            str_replace("-", "", $request->telefono1),
            str_replace("-", "", $request->telefono2),
            // $request->telefono1,
            // $request->telefono2,           

            str_replace(" ", "", $request->dpi),
            $request->muniOrigen,
            $request->estadoDPI,
            $request->dpiFechaVencimiento,

            // $request->deptoOrigen,
            // $request->deptoActual,

            $request->nameEncargado,
            $request->lastNameEncargado,
            $request->parentescoGeneral,
            // $request->especifiqueGeneral,
            $request->addressGeneral,
            $request->zonaGeneral,
            $request->coloniaBarrioAldeaGeneral,
            // $request->deptoActualGeneral,
            $request->muniActualGeneral,
            // $request->telefono1General,
            str_replace("-", "", $request->telefono1General),
            str_replace("-", "", $request->telefono2General),
            // $request->telefono2General,

            $request->namePadre,
            $request->lastNamePadre,
            $request->radioOpPadre,

            $request->nameMadre,
            $request->lastNameMadre,
            $request->radioOpMadre,

            $request->especifiqueGeneral,
            $request->caso
        );

        $valueFormat = json_encode($values);
        $valueFormat = str_replace("[", "", $valueFormat);
        $valueFormat = str_replace("]", "", $valueFormat);
        DB::select('call PR_PACIENTES(' . $valueFormat . ')');


        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado correctamente');
        // Blog::create($request->all());

        // return redirect()->route('pacientes.index')
        //     ->with('success', 'Paciente creado correctamente.');
    }

    public function municipiosGet($id)
    {
        $municipiosValues = DB::select("select ID_MUNICIPIO, MUNICIPIO from tb_municipio where ID_DEPARTAMENTO = $id");

        return $municipiosValues;
    }

    public function expediente($id)
    {
        $paciente = Pacientes::find($id);
        $pdf = PDF::loadView('pdf.expediente', compact('paciente'));
        return $pdf->stream();
    }

    public function municipiosGetEd($value, $id)
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
    public function show($id_Paciente)
    {
        $depto = DB::select('select ID_DEPARTAMENTO, DEPARTAMENTO from tb_departamento ');
        $parentesco = DB::select('select id_parentesco , tipo_parentesco from tb_parentesco');
        $paciente = DB::select("select 
        p.no_expediente as noExpediente,
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
        p.id_estado_paciente as paciente_activo, 
        p.religion,
        p.direccion,
        p.zona,
        p.colonia_barrio_aldea,
        p.referencia_vivienda as referencia_vivienda,
        p.telefono_casa,
        p.celular_1,
        IF(Celular_2 = 0, '', p.Celular_2 ) as Celular_2,
        p.id_familiar_responsable as id_familiar_responsable,
        mactual.id_municipio as id_municipio_actual,
        mactual.municipio as municipio_actual,
        dactual.id_departamento as id_departamento_actual,
        dactual.departamento as departamento_actual,
        dd.iddatos_dpi as id_datos_dpi,
        IF(dd.dpi = 0, '', dd.dpi ) as dpi,
        dd.estado_dpi as estado_dpi,
        dd.fecha_vencimiento as fecha_vencimiento_dpi,
        mdpi.id_municipio as id_municipio_dpi,
        mdpi.municipio as municipio_dpi,
        ddpi.id_departamento as id_departamento_dpi,
        ddpi.departamento as departamento_dpi
    from tb_paciente p 
    inner join tb_municipio mactual on mactual.ID_MUNICIPIO = p.ID_Municipio 
    inner join tb_departamento dactual on dactual.ID_DEPARTAMENTO = mactual.ID_DEPARTAMENTO
    inner join tb_datos_dpi dd on dd.idDatos_DPI = p.idDatos_DPI
    inner join tb_municipio mdpi on mdpi.ID_MUNICIPIO = dd.ID_Municipio 
    inner join tb_departamento ddpi on ddpi.ID_DEPARTAMENTO = mdpi.ID_DEPARTAMENTO
    where id_Paciente = " . $id_Paciente);

        $generalPacientes = DB::SELECT("select 
                p.id_Paciente,
                fr.id_familiar_responsable,
                fr.nom_padre as nombrePadre,
                fr.apell_padre as apellidoPadre,

                ifnull(fr.estado_sit_dad, 2020) as estadoPadre,

                fr.nom_madre as nombreMadre,
                fr.apell_madre as apellidoMadre,

                ifnull(fr.estado_sit_mom, 2020)as estadoMadre,

                fr.nom_encar as nombreEncargado,
                fr.apell_encar as apellidoEncargado,
                fr.id_parentesco as idParentesco,
                pr.tipo_parentesco as tipoParentesco,
                fr.direccion,
                fr.zona,
                fr.colonia_barrio_aldea as coloniaBarrioAldea,
                m.ID_MUNICIPIO,
                m.MUNICIPIO,
                d.ID_DEPARTAMENTO,
                d.DEPARTAMENTO,
                fr.Celular_1 as telefono_1,
                IF(fr.Celular_2 = 0, '', fr.Celular_2 ) as telefono_2
            from tb_familiar_responsable fr 
            inner join tb_paciente p on p.Id_Familiar_Responsable = fr.id_familiar_responsable
            inner join tb_municipio m on m.id_municipio = fr.id_municipio
            inner join tb_departamento d on d.ID_DEPARTAMENTO = m.ID_DEPARTAMENTO
            inner join tb_parentesco pr on pr.id_parentesco = fr.id_parentesco
            where p.id_Paciente = " . $id_Paciente);
        foreach ($paciente as $pass) {
            $pacientes = $pass;
        }
        foreach ($generalPacientes as $gp) {
            $generalPaciente = $gp;
        }
        // $pacientes = Pacientes::find($id_Paciente); 
        // $pacientes = Pacientes::find($id_Paciente);
        return view('pacientes.show', compact('pacientes', 'depto', 'generalPaciente', 'parentesco'));
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
        $parentesco = DB::select('select id_parentesco , tipo_parentesco from tb_parentesco');
        $paciente = DB::select("select 
                                    p.no_expediente as noExpediente,
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
                                    p.id_estado_paciente as paciente_activo, 
                                    p.religion,
                                    p.direccion,
                                    p.zona,
                                    p.colonia_barrio_aldea,
                                    p.referencia_vivienda as referencia_vivienda,
                                    p.telefono_casa,
                                    p.celular_1,
                                    IF(Celular_2 = 0, '', p.Celular_2 ) as Celular_2,
                                    p.id_familiar_responsable as id_familiar_responsable,
                                    mactual.id_municipio as id_municipio_actual,
                                    mactual.municipio as municipio_actual,
                                    dactual.id_departamento as id_departamento_actual,
                                    dactual.departamento as departamento_actual,
                                    dd.iddatos_dpi as id_datos_dpi,
                                    IF(dd.dpi = 0, '', dd.dpi ) as dpi,
                                    dd.estado_dpi as estado_dpi,
                                    dd.fecha_vencimiento as fecha_vencimiento_dpi,
                                    mdpi.id_municipio as id_municipio_dpi,
                                    mdpi.municipio as municipio_dpi,
                                    ddpi.id_departamento as id_departamento_dpi,
                                    ddpi.departamento as departamento_dpi
                                from tb_paciente p 
                                inner join tb_municipio mactual on mactual.ID_MUNICIPIO = p.ID_Municipio 
                                inner join tb_departamento dactual on dactual.ID_DEPARTAMENTO = mactual.ID_DEPARTAMENTO
                                inner join tb_datos_dpi dd on dd.idDatos_DPI = p.idDatos_DPI
                                inner join tb_municipio mdpi on mdpi.ID_MUNICIPIO = dd.ID_Municipio 
                                inner join tb_departamento ddpi on ddpi.ID_DEPARTAMENTO = mdpi.ID_DEPARTAMENTO
                                where id_Paciente = " . $id_Paciente);

        $generalPacientes = DB::SELECT("select 
                                            p.id_Paciente,
                                            fr.id_familiar_responsable,
                                            fr.nom_padre as nombrePadre,
                                            fr.apell_padre as apellidoPadre,

                                            ifnull(fr.estado_sit_dad, 2020) as estadoPadre,

                                            fr.nom_madre as nombreMadre,
                                            fr.apell_madre as apellidoMadre,
   
                                            ifnull(fr.estado_sit_mom, 2020)as estadoMadre,

                                            fr.nom_encar as nombreEncargado,
                                            fr.apell_encar as apellidoEncargado,
                                            fr.id_parentesco as idParentesco,
                                            pr.tipo_parentesco as tipoParentesco,
                                            fr.direccion,
                                            fr.zona,
                                            fr.colonia_barrio_aldea as coloniaBarrioAldea,
                                            m.ID_MUNICIPIO,
                                            m.MUNICIPIO,
                                            d.ID_DEPARTAMENTO,
                                            d.DEPARTAMENTO,
                                            fr.Celular_1 as telefono_1,
                                            IF(fr.Celular_2 = 0, '', fr.Celular_2 ) as telefono_2
                                        from tb_familiar_responsable fr 
                                        inner join tb_paciente p on p.Id_Familiar_Responsable = fr.id_familiar_responsable
                                        inner join tb_municipio m on m.id_municipio = fr.id_municipio
                                        inner join tb_departamento d on d.ID_DEPARTAMENTO = m.ID_DEPARTAMENTO
                                        inner join tb_parentesco pr on pr.id_parentesco = fr.id_parentesco
                                        where p.id_Paciente = " . $id_Paciente);

        foreach ($paciente as $pass) {
            $pacientes = $pass;
        }
        foreach ($generalPacientes as $gp) {
            $generalPaciente = $gp;
        }
        // $pacientes = Pacientes::find($id_Paciente); 
        // $pacientes = Pacientes::find($id_Paciente);
        return view('pacientes.edit', compact('pacientes', 'depto', 'generalPaciente', 'parentesco'));
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
        if ($request->telefono2 == "") {
            $request->telefono2 = 0;
        }
        if ($request->telefono2General == "") {
            $request->telefono2General = 0;
        }
        if ($request->dpi == "") {
            $request->dpi = 0;
        }
        $values = array(
            $request->noExpediente,
            $request->name1,
            $request->name2,
            $request->name2,
            $request->lastName1,
            $request->lastName2,
            $request->lastName3,
            $request->estadoCivil,
            $request->accesoIGSS,
            $request->nacionalidad,
            $request->edad,
            $request->genero,
            $request->fechaNacimiento,
            1,
            $request->religion,
            $request->address,
            $request->zona,
            $request->coloniaBarrioAldea,
            $request->muniActual,
            $request->refVivienda,
            str_replace("-", "", $request->telefonoCasa),
            str_replace("-", "", $request->telefono1),
            str_replace("-", "", $request->telefono2),
            // $request->telefono1,
            // $request->telefono2,           

            str_replace(" ", "", $request->dpi),
            $request->muniOrigen,
            $request->estadoDPI,
            $request->dpiFechaVencimiento,

            // $request->deptoOrigen,
            // $request->deptoActual,

            $request->nameEncargado,
            $request->lastNameEncargado,
            $request->parentescoGeneral,
            // $request->especifiqueGeneral,
            $request->addressGeneral,
            $request->zonaGeneral,
            $request->coloniaBarrioAldeaGeneral,
            // $request->deptoActualGeneral,
            $request->muniActualGeneral,
            // $request->telefono1General,
            str_replace("-", "", $request->telefono1General),
            str_replace("-", "", $request->telefono2General),
            // $request->telefono2General,

            $request->namePadre,
            $request->lastNamePadre,
            $request->radioOpPadre,

            $request->nameMadre,
            $request->lastNameMadre,
            $request->radioOpMadre,

            $request->especifiqueGeneral,
            $request->idPaciente,
            "U"
        );

        $valueFormat = json_encode($values);
        $valueFormat = str_replace("[", "", $valueFormat);
        $valueFormat = str_replace("]", "", $valueFormat);
        DB::select('call SP_UPDATE_PACIENTE(' . $valueFormat . ')');



        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente modificado correctamente');
        // return $valueFormat;
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

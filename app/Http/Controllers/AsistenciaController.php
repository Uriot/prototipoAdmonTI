<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
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

    public function edit(Request $request, $id_Paciente)
    {
        $events = array();
        $asistencias = DB::select("select id_asistencias as id, id_paciente,fecha_asistencia start_date, 'Asistencia' as title, observacion  from tb_asistencias where id_Paciente = " . $id_Paciente);

        foreach ($asistencias as $asistencia) {
            $events[] = [
                'id' => $asistencia->id,
                'idPaciente' => $asistencia->id_paciente,
                'observacion' => $asistencia->observacion,
                'title' => $asistencia->title,
                'start' => $asistencia->start_date,
                'end' => $asistencia->start_date
            ];
        }
        // return $events;

        // $asistencias = DB::table('tb_asistencias')
        //     ->select('id_asistencias', 'id_paciente', 'fecha_asistencia', 'observacion')
        //     ->where('id_paciente', '=', $id_Paciente);


        return view('pacientes.asistencia', ['events' => $events, 'id_Paciente' => $id_Paciente]);
        // return view('pacientes.asistencia', compact('id_Paciente', 'asistencias','event'));
    }
    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Asistencia::create([
                    'observacion'        =>    $request->observacion,
                    'fecha_asistencia'        =>    $request->fecha_asistencia
                ]);

                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Asistencia::find($request->id)->update([
                    'observacion'        =>    $request->title,
                    'fecha_asistencia'        =>    $request->start
                ]);

                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = Asistencia::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }
    public function update(Request $request, $id)
    {

        if ($request->id_asistencias) {
            $asistencia = Asistencia::find($request->id_asistencias);
            $asistencia->id_asistencias = $request->id_asistencias;
            $asistencia->fecha_asistencia = $request->start;
            $asistencia->observacion = $request->description;
            $asistencia->update();
        } else {
            $asistencia = new Asistencia();
            $asistencia->id_paciente = $request->id_Paciente;
            $asistencia->fecha_asistencia = $request->start_datetime;
            $asistencia->observacion = $request->description;
            $asistencia->save();
        }

        return redirect()->route('asistencia.edit', $request->id_Paciente)
            ->with('success', 'Asistencia creda con éxito');
    }


    public function asistenciasGet($id, $id_Paciente)
    {
        $asistencias = DB::table('tb_paciente')
            ->select('id_asistencias', 'id_paciente', 'fecha_asistencia', 'observacion')
            ->where('id_paciente', '=', $id_Paciente);

        return $asistencias;
    }
}

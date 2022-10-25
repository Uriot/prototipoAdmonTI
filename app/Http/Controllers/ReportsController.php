<?php

namespace App\Http\Controllers;

use App\Models\Dpi;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class ReportsController extends Controller
{


    public function patients(Request $request)
    {
        if(is_null($request->get('filter'))) {
            $patients = Pacientes::paginate(10);
        } else {
            $filters = $request->get('filter');
            $filters = [
                'fromAge' => $filters[0],
                'toAge'   => $filters[1],
                'name'    => $filters[2],
                'dpi'     => $filters[3],
            ];
            $patients = new Pacientes();
            $patients = $patients->getForFilters($request->get('filter'))->paginate(10);
        }
        $dpi = isset($filters['dpi']) ?? false;
        return view('reports.patients', compact('patients', 'dpi'));
    }

}

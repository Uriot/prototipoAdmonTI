<?php

namespace App\Http\Controllers;

use App\Exports\PacientesExport;
use App\Models\Dpi;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isNull;

class ReportsController extends Controller
{
    protected $filters; // Array para almacenar los filtros de busqueda
    public function patients(Request $request)
    {
        $get = '';
        if (is_null($request->get('filter'))) {
            $patients = Pacientes::all();
        } else {
            $filters = $request->get('filter');
            $dpi = isset($filters[3]) ? true : false;
            $get .= isset($filters[0]) ? "filter%5B%5D={$filters[0]}" : 'filter%5B%5D=';
            $get .= isset($filters[1]) ? "&filter%5B%5D={$filters[1]}" : '&filter%5B%5D=';
            $get .= isset($filters[2]) ? "&filter%5B%5D={$filters[2]}" : '&filter%5B%5D=';
            $get .= isset($filters[3]) ? "&filter%5B%5D={$dpi}" : '';
            $patients = new Pacientes();
            $patients = $patients->getForFilters($filters)->get();
        }
        $get = ($get == '?' || isNull($get)) ? $get : '';
        $dpi = isset($dpi) ?? false;
        return view('reports.patients', compact('patients', 'dpi', 'get'));
    }

    public function patientsToPDF(Request $request)
    {
        if (is_null($request->get('filter'))) {
            $patients = Pacientes::all();
        } else {
            $filters = $request->get('filter');
            $patients = new Pacientes();
            $patients = $patients->getForFilters($request->get('filter'))->get();
            $dpi = isset($filters[3]) ?? false;
        }
        $dpi = isset($dpi) ?? false;

        // return view('pdf.patientsPDF', compact('patients', 'dpi'));

        $pdf = PDF::loadView('pdf.patientsPDF', compact('patients', 'dpi'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('pacientes.pdf');
    }

    public function patientsToExcel (Request $request)
    {
        $filters = null;
        if (!is_null($request->get('filter'))) {
            $patients = Pacientes::all();
            $filters = $request->get('filter');
            $dpi = isset($filters[3]) ?? false;
        }

        $dpi = isset($dpi) ?? false;

        return Excel::download(new PacientesExport($filters, $dpi), 'pacientes.xlsx');
    }
}
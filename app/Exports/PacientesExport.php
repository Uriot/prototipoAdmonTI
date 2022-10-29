<?php

namespace App\Exports;

use App\Models\Pacientes;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class PacientesExport implements FromCollection, ShouldAutoSize
class PacientesExport implements FromView, ShouldAutoSize
{

    public function __construct($filters = null, $dpi = false)
    {
        $this->filters = $filters;
        $this->dpi = $dpi;
    }
    public function view(): View
    {
        if (is_null($this->filters)) {
            $patients = Pacientes::all();
        } else {
            $patients = new Pacientes();
            $patients = $patients->getForFilters($this->filters)->get();
        };
        $dpi = $this->dpi;
        return view('excel.patientsExcel', compact('patients', 'dpi'));
    }
}
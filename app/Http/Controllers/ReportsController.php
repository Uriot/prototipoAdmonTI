<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{


    public function patients()
    {
        return view('reports.patients');
    }

}

<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ExpedienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//! Rutas iniciales sin middleware
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reportes/paciente/expediente/{id}', [PacientesController::class, 'expediente']);

Route::group(['middleware' => ['auth']], function () {
    //! Rutas de controladores con funciones create, store, edit, update, destroy
    Route::resource('roles', RolController::class);
    Route::resource('pacientes', PacientesController::class);
    Route::resource('asistencia', AsistenciaController::class);
    Route::resource('expediente', ExpedienteController::class);
    Route::resource('users', UserController::class);

    //! Rutas de peticiones get especificas
    // Route::get('asistencia/{id}/asistenciasGet/{idGet}', [AsistenciaController::class, 'asistenciasGet']);
    // Route::get('full-calender', [AsistenciaController::class, 'edit']);
    Route::get('full-calender/action', [AsistenciaController::class, 'action']);
   
    Route::get('reporte/pacientes', [ReportsController::class, 'patients'])->name('reports.patients');
    Route::get('reporte/pacientes/pdf', [ReportsController::class, 'patientsToPDF'])->name('reports.patientsToPDF');
    Route::get('reporte/pacientes/excel', [ReportsController::class, 'patientsToExcel'])->name('reports.patientsToExcel');
    Route::get('pacientes/municipiosGet/{id}', [PacientesController::class, 'municipiosGet']);
    Route::get('pacientes/{paciente}/municipiosGet/{id}', [PacientesController::class, 'municipiosGetEd']);
    Route::get('updateState/paciente/{id}/estado/{estado}', [PacientesController::class, 'updateState']);
});
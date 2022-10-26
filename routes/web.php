<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacientesController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('pacientes', PacientesController::class);
    Route::resource('asistencia', AsistenciaController::class);
    Route::get('pacientes/municipiosGet/{id}', [PacientesController::class, 'municipiosGet']);
    Route::get('pacientes/{paciente}/municipiosGet/{id}', [PacientesController::class, 'municipiosGetEd']);
    Route::get('updateState/paciente/{id}/estado/{estado}', [PacientesController::class, 'updateState']);
});
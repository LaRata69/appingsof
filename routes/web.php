<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//CARGA MASVIA ASIGNATURA FALTA PONERLO EN VISTA DE DOCENTE
Route::get('import-asignatura',[App\Http\Controllers\AsignaturaController::class,'importForm']);

Route::post('import',[App\Http\Controllers\AsignaturaController::class,'import'])->name('asignatura.import');

Route::get('import-asignatura',[App\Http\Controllers\AsignaturaController::class, 'desplegarAsignaturas']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function() {

    //Rutas para ser accedidas por usuarios REGISTRADOS
    Route::get('/administrador', [AdminController::class, 'index'])->name('admin_index');
    Route::get('/alumno', [AlumnoController::class, 'index'])->name('alumno_index');
    Route::get('/docente', [ProfesorController::class, 'index'])->name('docente_index');

});
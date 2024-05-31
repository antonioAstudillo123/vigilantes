<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reportes\Reporte;
use App\Http\Controllers\Bitacora\Registros;
use App\Http\Controllers\Registro\Registrar;
use App\Http\Controllers\Vigilantes\MostrarVigilante;
use App\Http\Controllers\Vigilantes\Registrar as VigilantesRegistrar;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    [
        'reset' => false,
    ]

);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/registrarRonda' , [Registrar::class , 'store']);

Route::middleware(['auth'])->group(function()
{
   Route::post('/registrarVigilante' , [VigilantesRegistrar::class , 'store']);
   Route::get('/bitacora' , [Registros::class , 'index'])->name('bitacora.registros');

   Route::get('/reportes' , [Reporte::class , 'index'])->name('reportes.index');

   Route::post('/reportes/graficaCircular' , [Reporte::class , 'reportePromedioVigilante']);

   Route::post('/reportes/graficaBarras' , [Reporte::class , 'reportePromedioPlantel']);

   Route::post('/reportes/indicador' , [Reporte::class , 'reportePromedioVecesMes']);


   Route::get('/vigilantes/mostrar' ,[MostrarVigilante::class , 'index'] );



});

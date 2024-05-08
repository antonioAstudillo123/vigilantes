<?php

use App\Http\Controllers\Registro\Registrar;
use App\Http\Controllers\Vigilantes\Registrar as VigilantesRegistrar;
use Illuminate\Support\Facades\Route;


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

});

<?php

/**
 * Mostramos la bitacora de todos los registros sobre las rondas de vigilancia
 * que han realizado cada vigilante dentro de sus respectivos planteles
 */


namespace App\Http\Controllers\Bitacora;


use App\Http\Controllers\Controller;


class Registros extends Controller
{
    public function index(){
        return view('bitacora.registros');
    }
}

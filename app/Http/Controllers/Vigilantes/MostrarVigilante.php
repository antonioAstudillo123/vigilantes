<?php

namespace App\Http\Controllers\Vigilantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MostrarVigilante extends Controller
{
    public function index(){
        return view('vigilantes.mostrar');
    }
}

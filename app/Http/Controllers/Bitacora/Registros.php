<?php

namespace App\Http\Controllers\Bitacora;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Registros extends Controller
{
    public function index(){
        return view('bitacora.registros');
    }
}

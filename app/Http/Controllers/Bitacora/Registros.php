<?php

namespace App\Http\Controllers\Bitacora;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class Registros extends Controller
{
    public function index(){
        return view('bitacora.registros');
    }
}

<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\services\usuarios\UsuarioService;

class UsuariosController extends Controller
{
    private $servicio;

    public function __construct(UsuarioService $servicio){
        $this->servicio = $servicio;
    }


    public function index()
    {
        return view('usuarios.index');
    }

    public function edit($id)
    {
        $usuario = $this->servicio->getUsuario($id);
        return view('usuarios.edit' , ['usuario' => $usuario]);
    }
}

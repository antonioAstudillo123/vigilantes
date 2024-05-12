<?php

namespace App\Http\Controllers\Registro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrarRonda\ValidarRegistro;
use App\services\registrarRondas\RegistrarRondaService as RondaService;



class Registrar extends Controller
{

    private $serviceRonda;

    public function __construct(RondaService $servicio){
        $this->serviceRonda = $servicio;
    }

    public function store(ValidarRegistro $request)
    {
        $data = $request->all();
        return $this->serviceRonda->registrar($data);
    }
}

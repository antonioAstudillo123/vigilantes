<?php

namespace App\Http\Controllers\Vigilantes;

use App\Http\Controllers\Controller;
use App\services\vigilantes\VigilantesService;


class EditarVigilante extends Controller
{

    private $servicio;

    public function __construct(VigilantesService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function edit($id)
    {
        $vigilante =  $this->servicio->getVigilante($id);
        return view('vigilantes.editar' , ['vigilante' => $vigilante]  );
    }

}

<?php

namespace App\services\vigilantes;

use App\repositories\vigilantes\VigilantesRepository;

class VigilantesService{
    private $repositorio;

    public function __construct(VigilantesRepository $repositorio){
        $this->repositorio = $repositorio;
    }

    public function getNames(){
        return $this->repositorio->getNames();
    }


    public function getVigilantes(){
        return $this->repositorio->getVigilantes();
    }
}

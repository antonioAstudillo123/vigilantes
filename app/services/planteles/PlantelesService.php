<?php

namespace App\services\planteles;

use Illuminate\Support\Facades\DB;
use App\repositories\planteles\PlantelesRepository;

class PlantelesService{
    private $repositorio;

    public function __construct(PlantelesRepository $repositorio){
        $this->repositorio = $repositorio;
    }

    public function getNames(){
        return $this->repositorio->getNames();
    }
}

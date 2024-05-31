<?php

namespace App\services\vigilantes;

use Exception;
use App\Exceptions\NumeroEmpleadoUnique;
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


    public function getVigilante($id)
    {
        return $this->repositorio->getVigilante($id);
    }

    public function updateVigilante($id , $numeroEmpleado , $nombre , $plantel)
    {

        //Antes de actualizar debemos comprobar que el número de empleado sea unico

        if($this->repositorio->isUniqueEmpleado($numeroEmpleado , $id)){
            throw new NumeroEmpleadoUnique("No actualizamos el registro, el número de empleado ingresado le pertenece a otro usuario.");
        }

        return $this->repositorio->updateVigilante($id , $numeroEmpleado , $nombre , $plantel);
    }


    public function deleteVigilante($id)
    {
        return $this->repositorio->deleteVigilante($id);
    }
}

<?php

namespace App\repositories\vigilantes;

use Illuminate\Support\Facades\DB;


class VigilantesRepository{

    private $tabla;


    public function __construct(){
        $this->tabla = 'vigilantes';
    }

    /**
     * Por medio del numero del empleado, obtenemos el id de un vigilante
     * para poder usarlo en alguna operacion
    *
    * @param [type] $numeroEmpleado
    * @return void
    */
    public function getIdVigilante($numeroEmpleado){
        return DB::table($this->tabla)->select('id')->where('numeroEmpleado' , '=' , $numeroEmpleado)->get();
    }



    /**
     * Comprobamos si un vigilante por medio de su numero de empleado existe en el sistema
     *
     * @return void
     */
    public function existsVigilante($numeroEmpleado){
        return DB::table($this->tabla)->where('numeroEmpleado',$numeroEmpleado)->exists();
    }

}

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




    /**
     * Obtenemos todos los nombres de los vigilantes, para usarlos en algún proceso que se requiera
     *
     * @return void
     */
    public function getNames(){
        return  DB::table($this->tabla)->orderBy('nombreCompleto' , 'asc')->get();
    }




    /*
        Obtenemos todos los vigilantes del sistema
    */

    public function getVigilantes(){
        return DB::table($this->tabla)->join('planteles' , 'vigilantes.idPlantel' , '=' , 'planteles.id')
        ->select('vigilantes.numeroEmpleado' , 'vigilantes.nombreCompleto' , 'planteles.nombre');
    }

}

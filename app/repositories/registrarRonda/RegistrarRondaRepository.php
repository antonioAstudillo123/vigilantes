<?php

namespace App\repositories\registrarRonda;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\repositories\registrarRonda\RegistrarRondaInterface;

class RegistrarRondaRepository implements RegistrarRondaInterface
{

    private $tabla;

    public function __construct()
    {
        $this->tabla = 'rondas_vigilantes';
    }


    /**
     * Este metodo se utiliza para registrar una ronda de un vigilante en el sistema
     * Recibe como argumento el id del vigilante
     *
     * @return void
     */
    public function registrar($idVigilante)
    {
        //Establecemos un datatime, para no repetir el Carbon::now() en todos los campos.
        $datatime = Carbon::now();

        return DB::table($this->tabla)->insert([
            'idVigilante' => $idVigilante,
            'hora' => $datatime,
            'dia' => $datatime,
            'created_at' => $datatime,
            'updated_at' => $datatime,
        ]);
    }



    /**
     * Obtenemos la hora de la ultima ronda que ha realizado el vigilante, para comprobar si han pasado 15 minutos
     */

    public function ultimaHoraRonda($idVigilante)
    {
        return DB::table($this->tabla)->select('hora')->where('idVigilante' , $idVigilante)->orderBy('hora','desc')->first();
    }

}

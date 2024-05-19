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
        return DB::table($this->tabla)
            ->select('hora')
            ->where('idVigilante', $idVigilante)
            ->whereDate('dia', now())
            ->orderBy('hora', 'desc')
            ->first();
    }



    /**
     * Este metodo lo usamos para reutilizar la consulta de obtener la informacion de las rondas del vigilante
     * En el servicio aplicaremos la logica de filtrado de acuerdo a los argumentos o filtros que se apliquen
     * en los respectivos select's
     *
     * @return void
     */
    public function getInfoRonda(){
        return DB::table('rondas_vigilantes as rv')
                ->join('vigilantes as v', 'v.id', '=', 'rv.idVigilante')
                ->join('planteles as p', 'p.id', '=', 'v.idPlantel')
                ->select('rv.id as idRonda', 'v.nombreCompleto', 'v.numeroEmpleado', 'rv.hora', 'rv.dia', 'p.nombre');
    }

}

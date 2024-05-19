<?php

namespace App\services\registrarRondas;
use Exception;
use App\helpers\FechasHelper;
use App\repositories\vigilantes\VigilantesRepository;
use App\repositories\registrarRonda\RegistrarRondaInterface;


class RegistrarRondaService
{
    private $repositorioVigilante;
    private $repositorioRonda;


    public function __construct(RegistrarRondaInterface $rondaRepository , VigilantesRepository $vigilanteRepository ){
        $this->repositorioVigilante = $vigilanteRepository;
        $this->repositorioRonda = $rondaRepository;
    }

    /**
     * Recibemos un arreglo el cual proviene de un request
     *
     * En dicho arreglo debe de venir el número del empleado
     *
     * @param [type] $data
     * @return void
     */
    public function registrar($data)
    {

        if(!$this->repositorioVigilante->existsVigilante($data['numEmpleado'])){
            return response('El número de empleado no existe!' , 422);
        }

        try
        {
            //Obtenemos el id del vigilante, para poder comprobar la hora de su ultima solicitud de registro de ronda
            $idVigilante = $this->repositorioVigilante->getIdVigilante($data['numEmpleado']);

            /*
                Verificamos la hora del último rondín del vigilante para asegurarnos de que hayan transcurrido al menos 15 minutos desde
                su última entrada.
                Esta medida previene que un vigilante registre varias veces en un mismo rondín,
                lo cual podría distorsionar sus estadísticas. Además, garantizamos que el guardia permanezca en un mismo lugar
                durante un tiempo adecuado para una vigilancia efectiva

            */

            $ultimaHora = $this->repositorioRonda->ultimaHoraRonda($idVigilante[0]->id);

            if($ultimaHora !== null)
            {
                if(!FechasHelper::diferenciaEnMinutos($ultimaHora->hora)){
                    return response('Aún no transcurre el tiempo límite para realizar otra solicitud de registro de ronda.' , 422);
                }
            }

            $this->repositorioRonda->registrar($idVigilante[0]->id);

        }catch(Exception $e)
        {
            return response('Error en el servidor: 001' . $e, 500);
        }

        return response('¡Ronda registrada correctamente!' , 200);

    }



    /**
     * Obtenemos la informacion de las rondas de los vigilantes, para poder llenar la tabla en el modulo de bitacoras
     *
     * @return void
     */
    public function getRondasVigilantes(string $plantel = '', string $vigilante = '' , string $fechaInicio = '' , string $fechaFinal = '' ){

        $query = $this->repositorioRonda->getInfoRonda();

        if($plantel !== '' || $vigilante !== '')
        {
            if($fechaInicio !== '' && $fechaFinal !== '')
            {
                return $query->where(function ($query) use ($plantel , $vigilante){
                    $query->where('p.id', $plantel)
                        ->orWhere('v.id', $vigilante);
                })
                ->whereBetween('rv.dia', [$fechaInicio, $fechaFinal]);
            }else{
               return $query->where(function ($query) use ($plantel , $vigilante){
                    $query->where('p.id', $plantel)
                        ->orWhere('v.id', $vigilante);
                });
            }
        }
        else{
            return $query->orderBy('rv.dia' , 'desc');
        }

    }
}

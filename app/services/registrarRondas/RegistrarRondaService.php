<?php

namespace App\services\registrarRondas;
use Exception;
use App\helpers\FechasHelper;
use Illuminate\Support\Carbon;
use App\repositories\vigilantes\VigilantesRepository;
use App\repositories\registrarRonda\RegistrarRondaRepository;

class RegistrarRondaService
{
    private $repositorioVigilante;
    private $repositorioRonda;


    public function __construct(RegistrarRondaRepository $rondaRepository , VigilantesRepository $vigilanteRepository ){
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


            if(!FechasHelper::diferenciaEnMinutos($ultimaHora->hora)){
                return response('Aun no transcurre el tiempo limite para realizar otra solicitud de registro de ronda.' , 422);
            }

            $this->repositorioRonda->registrarRonda($idVigilante[0]->id);

        }catch(Exception $e)
        {
            return response('Error en el servidor: 001' , 500);
        }

        return response('¡Ronda registrada correctamente!' , 200);

    }
}

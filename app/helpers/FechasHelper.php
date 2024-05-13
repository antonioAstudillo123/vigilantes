<?php

namespace App\helpers;

use Illuminate\Support\Carbon;

class FechasHelper{

    public static function diferenciaEnMinutos($horaInicial )
    {

        $horaInicio = Carbon::createFromFormat('H:i:s', $horaInicial);
        $horaFin = Carbon::now();

        $diferenciaMinutos = $horaFin->diffInMinutes($horaInicio);


        // Comprueba si han pasado al menos 15 minutos
        if ($diferenciaMinutos >= 15) {
            return true;
        }


        return false;
    }
}

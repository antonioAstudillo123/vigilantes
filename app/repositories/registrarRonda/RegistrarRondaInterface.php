<?php

namespace App\repositories\registrarRonda;

interface RegistrarRondaInterface{
    public function registrar(string $idVigilante);
    public function ultimaHoraRonda(string $idVigilante);
}

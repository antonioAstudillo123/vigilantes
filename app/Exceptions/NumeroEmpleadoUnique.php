<?php

namespace App\Exceptions;

use Exception;

class NumeroEmpleadoUnique extends Exception
{
    public function __construct($mensaje = "", $codigo = 000, Exception $excepcion_previa = null)
    {
        // Llama al constructor de la clase Exception
        parent::__construct($mensaje, $codigo, $excepcion_previa);

        // Puedes agregar lógica adicional al constructor si es necesario
    }
}

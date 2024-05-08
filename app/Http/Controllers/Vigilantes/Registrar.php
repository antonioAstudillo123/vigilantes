<?php

namespace App\Http\Controllers\Vigilantes;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Registrar extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        try{

            if (DB::table('vigilantes')->where('numeroEmpleado', $data['numEmpleado'])->exists()) {
                return response('El número de empleado ya existe!' , 500);
            }

            DB::table('vigilantes')->insert([
               'numeroEmpleado' => $data['numEmpleado'],
               'nombreCompleto' => $data['nombreVigilante'],
               'idPlantel' => $data['plantel'],
               'created_at' => Carbon::now()
            ]);
        }catch(Exception $e)
        {
            return response('Error en el servidor: 002' . $e , 500);
        }

        return response('Vigilante creado correctamente!' , 200);
    }
}

<?php

namespace App\Http\Controllers\Registro;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;

class Registrar extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();


        if (!DB::table('vigilantes')->where('numeroEmpleado', $data['numEmpleado'])->exists()) {
            return response('El número de empleado no existe!' , 422);
        }

        //Almacenamos el registro en la tabla de rondas_vigilantes

        try
        {
            //Primero obtenemos el id del vigilante
            $id = DB::table('vigilantes')->select('id')->where('numeroEmpleado' , '=' , $data['numEmpleado'])->get();

            //Posteriormente almacenamos el registro en la tabla rondas_vigilantes
            DB::table('rondas_vigilantes')->insert([
                'idVigilante' => $id[0]->id,
                'hora' => Carbon::now(),
                'dia' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }catch(Exception $e)
        {
            return response('Error en el servidor: 001' , 500);
        }

        return response('Registro creado correctamente!' , 200);
    }
}

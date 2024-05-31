<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Reporte extends Controller
{
    public function index()
    {
        return view('reportes.reportes');
    }

    /**
     * Obtenemos el promedio de veces que un guardía hace rondines dentro del plantel
     *
     *
     */
    public function reportePromedioVigilante(Request $request)
    {
        $resultados = DB::table(DB::raw('(
            SELECT idVigilante,
                   dia,
                   COUNT(idVigilante) AS veces
            FROM rondas_vigilantes
            GROUP BY idVigilante, dia
        ) as ResultadoConsulta'))
        ->join('vigilantes', 'vigilantes.id', '=', 'ResultadoConsulta.idVigilante')
        ->select('ResultadoConsulta.idVigilante', 'vigilantes.nombreCompleto', DB::raw('CAST(SUM(ResultadoConsulta.veces) / COUNT(ResultadoConsulta.idVigilante) AS DECIMAL(9,1)) AS Promedio'))
        ->groupBy('ResultadoConsulta.idVigilante', 'vigilantes.nombreCompleto')
        ->get();


        return response()->json(['data' => $resultados] , 200);
    }



    /**
     * Obtenemos el promedio general de rondines que hacen por plantel los guardias
     */

    public function reportePromedioPlantel(Request $request){
        $resultados = DB::table('rondas_vigilantes as rv')
            ->join('vigilantes as v', 'v.id', '=', 'rv.idVigilante')
            ->join('planteles as p', 'p.id', '=', 'v.idPlantel')
            ->select('p.nombre', DB::raw('COUNT(p.nombre) as veces'))
            ->groupBy('p.nombre')
            ->orderBy('veces' , 'desc')
            ->get();

        return response()->json(['data' => $resultados] , 200);
    }



    /**
     * Obtenemos la cantidad de veces que se hacen rondines en el mes dentro de un plantel
     * para de esa manera poner generar el indicador visual dentro de la vista reportes
     *
     */
    public function reportePromedioVecesMes(Request $request)
    {
        $resultados = DB::table('rondas_vigilantes AS rv')
            ->join('vigilantes AS v', 'v.id', '=', 'rv.idVigilante')
            ->join('planteles AS p', 'p.id', '=', 'v.idPlantel')
            ->whereMonth('rv.dia', '=', Carbon::now())
            ->whereYear('rv.dia', '=', Carbon::now())
            ->select('p.nombre', DB::raw('COUNT(p.nombre) AS veces'))
            ->groupBy('p.nombre')
            ->orderBy('p.nombre')
            ->get();


        return response()->json(['data' => $resultados] , 200);
    }
}

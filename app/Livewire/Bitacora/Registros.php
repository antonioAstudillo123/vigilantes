<?php

namespace App\Livewire\Bitacora;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Registros extends Component
{
    use WithPagination;

    public function render()
    {

        $rondas = DB::table('rondas_vigilantes as rv')
                  ->join('vigilantes as v' , 'v.id' , '=' , 'rv.idVigilante')
                  ->join('planteles as p' , 'p.id' , '='  ,'v.idPlantel')
                  ->select('rv.id as idRonda' , 'v.nombreCompleto' , 'v.numeroEmpleado' , 'rv.hora' , 'rv.dia' , 'p.nombre')
                  ->paginate(10);



        return view('livewire.bitacora.registros' , ['rondas' => $rondas]);
    }
}

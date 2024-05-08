<?php

namespace App\Livewire\Bitacora;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\RegistrosRondines;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Registros extends Component
{
    use WithPagination;
    public $planteles = [];
    public $vigilantes = [];
    public $plantel = '';
    public $vigilante = '';
    public $fechaInicio = '';
    public $fechaFinal  = '';


    public function mount()
    {
        $this->planteles = DB::table('planteles')->orderBy('nombre' , 'asc')->get();
        $this->vigilantes = DB::table('vigilantes')->orderBy('nombreCompleto' , 'asc')->get();

    }

    public function render()
    {
        if($this->plantel !== '' || $this->vigilante !== '')
        {


            if($this->fechaInicio !== '' && $this->fechaFinal !== '')
            {
                $rondas = DB::table('rondas_vigilantes as rv')
                ->join('vigilantes as v', 'v.id', '=', 'rv.idVigilante')
                ->join('planteles as p', 'p.id', '=', 'v.idPlantel')
                ->select('rv.id as idRonda', 'v.nombreCompleto', 'v.numeroEmpleado', 'rv.hora', 'rv.dia', 'p.nombre')
                ->where(function ($query){
                    $query->where('p.id', $this->plantel)
                        ->orWhere('v.id', $this->vigilante);
                })
                ->whereBetween('rv.dia', [$this->fechaInicio, $this->fechaFinal])
                ->paginate(10);
            }else{
                $rondas = DB::table('rondas_vigilantes as rv')
                ->join('vigilantes as v', 'v.id', '=', 'rv.idVigilante')
                ->join('planteles as p', 'p.id', '=', 'v.idPlantel')
                ->select('rv.id as idRonda', 'v.nombreCompleto', 'v.numeroEmpleado', 'rv.hora', 'rv.dia', 'p.nombre')
                ->where(function ($query){
                    $query->where('p.id', $this->plantel)
                        ->orWhere('v.id', $this->vigilante);
                })
                ->paginate(10);
            }


        }
        else{
            $rondas = DB::table('rondas_vigilantes as rv')
            ->join('vigilantes as v' , 'v.id' , '=' , 'rv.idVigilante')
            ->join('planteles as p' , 'p.id' , '='  ,'v.idPlantel')
            ->select('rv.id as idRonda' , 'v.nombreCompleto' , 'v.numeroEmpleado' , 'rv.hora' , 'rv.dia' , 'p.nombre')
            ->orderBy('rv.dia' , 'desc')
            ->paginate(10);
        }


        return view('livewire.bitacora.registros' ,
        ['rondas' => $rondas , 'planteles' => $this->planteles , 'vigilantes' => $this->vigilantes] );
    }


    public function exportDataExcel(){

        if($this->plantel !== '' || $this->vigilante !== '')
        {


            if($this->fechaInicio !== '' && $this->fechaFinal !== '')
            {
                $rondas = DB::table('rondas_vigilantes as rv')
                ->join('vigilantes as v', 'v.id', '=', 'rv.idVigilante')
                ->join('planteles as p', 'p.id', '=', 'v.idPlantel')
                ->select('rv.id as idRonda', 'v.nombreCompleto', 'v.numeroEmpleado', 'rv.hora', 'rv.dia', 'p.nombre')
                ->where(function ($query){
                    $query->where('p.id', $this->plantel)
                        ->orWhere('v.id', $this->vigilante);
                })
                ->whereBetween('rv.dia', [$this->fechaInicio, $this->fechaFinal])
                ->get();
            }else{
                $rondas = DB::table('rondas_vigilantes as rv')
                ->join('vigilantes as v', 'v.id', '=', 'rv.idVigilante')
                ->join('planteles as p', 'p.id', '=', 'v.idPlantel')
                ->select('rv.id as idRonda', 'v.nombreCompleto', 'v.numeroEmpleado', 'rv.hora', 'rv.dia', 'p.nombre')
                ->where(function ($query){
                    $query->where('p.id', $this->plantel)
                        ->orWhere('v.id', $this->vigilante);
                })
                ->get();
            }


        }
        else{
            $rondas = DB::table('rondas_vigilantes as rv')
            ->join('vigilantes as v' , 'v.id' , '=' , 'rv.idVigilante')
            ->join('planteles as p' , 'p.id' , '='  ,'v.idPlantel')
            ->select('rv.id as idRonda' , 'v.nombreCompleto' , 'v.numeroEmpleado' , 'rv.hora' , 'rv.dia' , 'p.nombre')
            ->orderBy('p.nombre' , 'asc')
            ->get();
        }

        return Excel::download(new RegistrosRondines($rondas), 'registrosRondines.xlsx');
    }

    public function obtenerPlantel()
    {
        $this->resetPage();
        $this->render();
    }


    public function obtenerVigilante()
    {
        $this->resetPage();
        $this->render();
    }

    public function obtenerFechas()
    {
        if($this->fechaInicio !== '' && $this->fechaFinal !== '')
        {
            $this->resetPage();
            $this->render();
        }
    }

}

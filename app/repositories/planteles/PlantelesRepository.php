<?php

namespace App\repositories\planteles;

use Illuminate\Support\Facades\DB;


class PlantelesRepository{

    public function getNames(){
        return DB::table('planteles')->select('id', 'nombre')->orderBy('nombre' , 'asc')->get();
    }
}

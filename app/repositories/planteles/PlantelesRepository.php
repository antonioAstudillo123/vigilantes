<?php

namespace App\repositories\planteles;

use Illuminate\Support\Facades\DB;


class PlantelesRepository{

    public function getNames(){
        return DB::table('planteles')->orderBy('nombre' , 'asc')->get();
    }
}

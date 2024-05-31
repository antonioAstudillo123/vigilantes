<?php

namespace App\Livewire\Vigilantes;

use Livewire\Component;
use App\services\vigilantes\VigilantesService;

class MostrarVigilantes extends Component
{
    private $servicio;

    public function mount(VigilantesService $vigilante){
        $this->servicio = $vigilante;

    }


    public function render()
    {
        $vigilantes = $this->servicio->getVigilantes()->paginate(10);

        return view('livewire.vigilantes.mostrar-vigilantes' , ['vigilantes' => $vigilantes]);
    }
}

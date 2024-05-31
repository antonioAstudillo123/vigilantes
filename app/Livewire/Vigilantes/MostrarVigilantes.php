<?php

namespace App\Livewire\Vigilantes;

use Livewire\Component;
use App\services\vigilantes\VigilantesService;
use Illuminate\Database\QueryException;

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



    public function delete($id , VigilantesService $servicio)
    {
        try{
            $servicio->deleteVigilante($id);
            session()->flash('mensajeExito', '¡Vigilante eliminado con éxito!');

            $this->redirectRoute('vigilantes.mostrar');
        }catch(QueryException $E)
        {
            session()->flash('mensajeError', '¡Error al eliminar al vigilante, contacta a soporte!');
            $this->redirectRoute('vigilantes.mostrar');
        }

    }
}

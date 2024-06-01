<?php

namespace App\Livewire\Vigilantes;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\QueryException;
use App\services\vigilantes\VigilantesService;

class MostrarVigilantes extends Component
{
    use WithPagination;
    private $servicio;

    public function mount(VigilantesService $vigilante){
        $this->servicio = $vigilante;
    }

    public function render(VigilantesService $vigilante)
    {
        $vigilantes = $vigilante->getVigilantes()->paginate(10);

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

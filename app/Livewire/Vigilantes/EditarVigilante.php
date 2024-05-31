<?php

namespace App\Livewire\Vigilantes;


use Exception;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Database\QueryException;
use App\services\planteles\PlantelesService;
use App\services\vigilantes\VigilantesService;

class EditarVigilante extends Component
{
    public $planteles;


    #[Validate('required', message: 'El campo es obligatorio.')]
    #[Validate('numeric', message: 'El número de empleado debe ser un valor numérico.')]
    public $numeroEmpleado;

    #[Validate('required', message: 'El campo es obligatorio.')]
    #[Validate('regex:/^[a-zA-Z\s]+$/', message: 'Debe ingresar un campo alfabético.')]
    public $nombre;

    public $plantel;
    public $id;

    public function mount($vigilante , PlantelesService $servicioPlanteles)
    {
        $this->planteles = $servicioPlanteles->getNames();
        $this->numeroEmpleado = $vigilante->numeroEmpleado;
        $this->nombre = $vigilante->nombreCompleto;
        $this->id = $vigilante->id;
        $this->plantel = $vigilante->idPlantel;
    }

    public function render()
    {
        return view('livewire.vigilantes.editar-vigilante' , ['planteles' => $this->planteles]);
    }

    public function updateVigilante(VigilantesService $vigilanteService)
    {
        try
        {
            $this->validate();

            $vigilanteService->updateVigilante($this->id , $this->numeroEmpleado , $this->nombre , $this->plantel);

            session()->flash('mensajeExito', '¡Vigilante actualizado con éxito!');

            $this->redirectRoute('vigilantes.mostrar');

        }
        catch(QueryException $e)
        {
            session()->flash('mensajeError', '¡Tuvimos problemas al actualizar al vigilante!');
            $this->redirectRoute('vigilantes.mostrar');

        }
        catch(Exception $e)
        {
            session()->flash('mensajeError', '¡Problemas en el servidor, contacta a soporte!');
            $this->redirectRoute('vigilantes.mostrar');
        }
    }
}

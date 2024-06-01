<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use Livewire\WithPagination;
use App\services\usuarios\UsuarioService;
use Exception;
use Illuminate\Database\QueryException;

class Mostrar extends Component
{
    use WithPagination;
    private $servicio;

    public function boot(UsuarioService $servicio)
    {
        $this->servicio = $servicio;
    }


    public function render()
    {
        $usuarios = $this->servicio->getUsuarios();


        return view('livewire.usuarios.mostrar' , ['usuarios' => $usuarios]);
    }

    public function resetPassword($id)
    {

        try{
            $this->servicio->resetPassword($id);

            session()->flash('mensajeExito', '¡Contraseña reseteada exitosamente!');
        }catch(Exception $e){
            session()->flash('mensajeError', '¡No pudimos resetear la contraseña, error en el servidor. Contacta al equipo de soporte!');
        }


        $this->redirectRoute('usuarios.index');

    }


    public function deleteUser($id){
        try{
            $this->servicio->deleteUser($id);
            session()->flash('mensajeExito', '¡Usuario eliminado exitosamente!');
        }catch(Exception $e){
            session()->flash('mensajeError', '¡No pudimos eliminar al usuario, error en el servidor. Contacta al equipo de soporte!');
        }

        $this->redirectRoute('usuarios.index');
    }
}

<?php

namespace App\Livewire\Usuarios;

use Exception;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\services\usuarios\UsuarioService;

class Editar extends Component
{
    #[Validate('required', message: 'El campo es obligatorio.')]
    #[Validate('regex:/^[a-zA-Z\s]+$/', message: 'Debe ingresar un campo alfabético.')]
    public $nombre;

    #[Validate('required', message: 'El campo es obligatorio.')]
    #[Validate('email', message: 'Debe ingresar un email válido.')]
    public $correo;

    public $password;

    #[Validate('required', message: 'El campo es obligatorio.')]
    #[Validate('numeric', message: 'El campo debe ser numérico')]
    public $id;

    private $usuario;



    private $servicio;

    public function boot(UsuarioService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function mount($usuario)
    {
        $this->usuario = $usuario;
        $this->nombre = $usuario->name;
        $this->correo = $usuario->email;
        $this->id = $usuario->id;
    }

    public function render()
    {
        return view('livewire.usuarios.editar' , ['usuario' => $this->usuario]);
    }

    public function updateUser()
    {
        $this->validate();

        try{

            $this->servicio->updateUser($this->id , $this->nombre , $this->correo , $this->password);
            session()->flash('mensajeExito', '¡Datos actualizados correctamente!');
        }catch(Exception $e)
        {
            session()->flash('mensajeError', '¡No pudimos actualizar la información, error en el servidor. Contacta al equipo de soporte!' . $e);
        }

        $this->redirectRoute('usuarios.index');
    }
}

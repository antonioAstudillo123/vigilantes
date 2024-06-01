<?php

namespace App\services\usuarios;

use App\repositories\usuarios\UsuarioRepository;

class UsuarioService{

    private $repositorio;

    public function __construct(UsuarioRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function getUsuarios()
    {
        return $this->repositorio->getUsuarios();
    }

    public function getUsuario($id)
    {
        return $this->repositorio->getUsuario($id);
    }

    public function resetPassword($id)
    {
        return $this->repositorio->resetPassword($id);
    }

    public function deleteUser($id)
    {
        return $this->repositorio->deleteUser($id);
    }


    public function updateUser($id , $name , $email , $password)
    {
        return $this->repositorio->updateUser($id , $name , $email , $password);
    }



}

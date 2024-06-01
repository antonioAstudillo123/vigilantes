<?php

namespace App\repositories\usuarios;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Support\Facades\Hash;

class UsuarioRepository{

    public function getUsuarios()
    {
        return User::paginate(10);
    }

    public function getUsuario($id)
    {
        return User::findOrFail($id);
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make('Univer#1');
        return $user->save();
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }


    public function updateUser($id , $name , $email , $password)
    {
        $user = User::findOrFail($id);

        $user->name = Str::title($name);
        $user->email = $email;

        if($password !== null)
        {
            $user->password = Hash::make($password);
        }

        $user->save();
    }
}



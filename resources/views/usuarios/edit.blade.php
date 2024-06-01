@extends('layouts.app')


@section('content')
    @livewire('usuarios.editar' , ['usuario' => $usuario]);
@endsection

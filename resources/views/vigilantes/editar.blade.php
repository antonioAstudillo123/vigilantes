@extends('layouts.app')


@section('content')
    @livewire('vigilantes.editar-vigilante' , ['vigilante' => $vigilante]);
@endsection

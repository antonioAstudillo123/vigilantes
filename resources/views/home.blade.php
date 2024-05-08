@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Registrar vigilante</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="mb-3">
                        <label for="nombreVigilante" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombreVigilante" placeholder="Ingresa el nombre del vigilante">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="numEmpleado" class="form-label">Número de empleado</label>
                        <input type="number" class="form-control" id="numEmpleado" placeholder="Ingresa el número del empleado">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="plantel" class="form-label">Plantel</label>
                        <select id="plantel" class="form-select mb-3" aria-label=".form-select-lg example">
                            <option value='' selected disabled>-- Selecciona un plantel --</option>
                            @foreach ($planteles as $plantel )
                                <option value="{{ $plantel->id }}">{{ $plantel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <button id="btnRegistrar" class="btn btn-primary">Registrar vigilante</button>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/vigilantes/registrarVigilante.js') }}" type="module"></script>
@endsection

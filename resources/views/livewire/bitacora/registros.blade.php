<div>
    <div class="container">

        <div class="card mb-3">
            <div class="card-body">

                <div class="accordion" id="acordionBusqueda">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Búsqueda personalizada
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#acordionBusqueda">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Filtrar por plantel</label>
                                        <select wire:model='plantel' wire:change='obtenerPlantel'  class="form-select" aria-label="Default select example">
                                            <option value="" disabled selected>-- Elige un plantel -- </option>
                                            @foreach ($planteles as $plantel )
                                                <option value="{{ $plantel->id }}">{{ $plantel->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Filtrar por vigilante</label>
                                        <select wire:model='vigilante' wire:change='obtenerVigilante' class="form-select" aria-label="Default select example">
                                            <option value="" disabled selected>-- Elige un vigilante -- </option>
                                            @foreach ($vigilantes as $vigilante )
                                                <option value="{{ $vigilante->id }}">{{ $vigilante->nombreCompleto }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="fechaInicio" class="form-label">Fecha inicial</label>
                                        <input wire:model='fechaInicio' wire:change='obtenerFechas' type="date" class="form-control" id="fechaInicio">
                                      </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="fechaFinal" class="form-label">Fecha final</label>
                                        <input wire:model='fechaFinal' wire:change='obtenerFechas' type="date" class="form-control" id="fechaFinal">
                                      </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button wire:click='exportDataExcel' class="btn btn-outline-success"><i class="fas fa-file-excel"></i></button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>





            </div>
        </div>



        <div class="card">
            <div class="card-header">
                Registro de rondines
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Número empleado</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Día</th>
                        <th scope="col">Plantel</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($rondas as $ronda )
                        <tr>
                            <th>{{ $ronda->idRonda }}</th>
                            <td>{{ $ronda->nombreCompleto }}</td>
                            <td>{{ $ronda->numeroEmpleado }}</td>
                            <td>{{ $ronda->hora }}</td>
                            <td>{{ $ronda->dia }}</td>
                            <td>{{ $ronda->nombre }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>

            <div class="card-footer">
                {{ $rondas->links(data: ['scrollTo' => false]) }}
            </div>
        </div>

    </div>


</div>

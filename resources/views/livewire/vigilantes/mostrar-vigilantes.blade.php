<div>

    <div class="container p-2">

        @if (session('mensajeExito'))
            <div class="alert alert-success">
                {{ session('mensajeExito') }}
            </div>
        @endif
        @if (session('mensajeError'))
            <div class="alert alert-danger">
                {{ session('mensajeError') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Listado de vigilantes
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Plantel</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($vigilantes as $vigilante )
                            <tr>
                                <th scope="row">{{ $vigilante->numeroEmpleado }}</th>
                                <td>{{ $vigilante->nombreCompleto }}</td>
                                <td>{{ $vigilante->nombre }}</td>
                                <td>
                                    <a href="{{ route('vigilantes.edit', ['id' => $vigilante->id ] ) }}" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>

                                    <button wire:click="delete({{ $vigilante->id  }})"  wire:confirm='¿Estás seguro de eliminar a este vigilante?' class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $vigilantes->links(data: ['scrollTo' => false]) }}
        </div>


    </div>


</div>

<div>
    <div class="container pt-3">
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
                Listado de usuarios
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario )
                            <tr>
                                <th scope="row">{{ $usuario->id }}</th>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <button wire:click="resetPassword({{ $usuario->id }})"  class="btn btn-info"><i class="fa-solid fa-unlock-keyhole"></i></button>
                                    <a href="{{ route('usuarios.edit' , ['id' => $usuario->id]) }}" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                                    <button wire:click="deleteUser({{ $usuario->id }})" wire:confirm='¿Estás seguro de que deseas eliminar a este usuario? Esta acción eliminará toda la información relacionada con él.'  class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="card-footer">
                {{ $usuarios->links() }}
            </div>
        </div>

     </div>
</div>

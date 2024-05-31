<div>

    <div class="container p-5">

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
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($vigilantes as $vigilante )
                            <tr>
                                <th scope="row">{{ $vigilante->numeroEmpleado }}</th>
                                <td>{{ $vigilante->nombreCompleto }}</td>
                                <td>{{ $vigilante->nombre }}</td>
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

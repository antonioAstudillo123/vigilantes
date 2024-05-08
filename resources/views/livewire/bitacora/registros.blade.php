<div>
    <div class="container">

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
                {{ $rondas->links() }}
            </div>
        </div>

    </div>


</div>

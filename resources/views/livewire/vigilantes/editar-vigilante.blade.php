<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar información del vigilante
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="numEmpleado">Número de empleado</label>
                                <input wire:model='numeroEmpleado' type="text" value="{{ $numeroEmpleado }}" class="form-control" id="numEmpleado" placeholder="No tiene número de empleado">
                                @error('numeroEmpleado') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                                <input type="hidden" wire:model='{{ $id }}' >
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="plantel">Plantel</label>
                                <select id="plantel" wire:model='plantel' value='{{ $plantel }}' class="form-control">
                                    @foreach ($planteles as $plantelRow )
                                        <option value="{{ $plantelRow->id }}">{{ $plantelRow->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group mb-3">
                                <label for="nombreCompleto">Nombre completo</label>
                                <input wire:model='nombre' type="text" value="{{ $nombre}}" class="form-control" id="nombreCompleto" placeholder="No tiene nombre">
                                @error('nombre') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-footer">
                    <div class="d-flex justify-content-end p-1">
                        <button wire:click='updateVigilante' type="submit" class="btn btn-primary">Actualizar información</button>
                    </div>
            </div>
        </div>
    </div>
</div>

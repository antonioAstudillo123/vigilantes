<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar información del usuario
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre</label>
                                <input wire:model='nombre' type="text" value="{{ $nombre }}" class="form-control" id="numEmpleado" placeholder="No tiene nombre">
                                @error('nombre') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                                <input type="hidden" wire:model='{{ $id }}' >
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="correo">Correo</label>
                                <input wire:model='correo' type="text" value="{{ $correo }}" class="form-control" id="correo" placeholder="No tiene correo">
                                @error('correo') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group mb-3">
                                <label for="passwod">Contraseña</label>
                                <input wire:model='password' type="password" value="{{ $password}}" class="form-control" id="passwod" placeholder="**********">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-footer">
                    <div class="d-flex justify-content-end p-1">
                        <button wire:click='updateUser' type="submit" class="btn btn-primary">Actualizar información</button>
                    </div>
            </div>
        </div>
    </div>
</div>

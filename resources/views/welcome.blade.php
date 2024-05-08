<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vigilantes</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
        <body class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        <img src="{{ asset('img/univer_log.png')}}"  class="brand-image img-circle elevation-3" style="" alt="Logo Univer" width="30" height="24">
                    </a>

                </div>
              </nav>


            <div class="container mt-5">
                <div class="row">
                    <div class="col-12  col-lg-6 mx-auto">
                        <div class="card">
                            <div class="card-header ">
                                Registro de patrullaje
                            </div>
                            <div class="card-body">
                              <p class="card-text text-center">Ingresa tu número de empleado y presiona sobre el boton registrar.</p>
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-shield"></i></span>
                                <input id="numEmpleado" type="number" class="form-control" placeholder="Número de empleado" aria-label="número de empleado" aria-describedby="addon-wrapping">
                              </div>

                            </div>
                            <div class="card-footer p-3">
                                <div class="d-grid gap-2">
                                    <button id="btnRegistrar" class="btn btn-primary" type="button">Registrar</button>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/registro/script.js') }}" type="module"></script>

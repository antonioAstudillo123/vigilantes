@extends('layouts.app')


@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Reportes de vigilantes
        </div>

        <div class="card-body">
            <select id="selectReportes" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>-- Selecciona un reporte --</option>
                <option value="1">Promedio de vigilantes</option>
                <option value="2">Reporte por plantel</option>
                <option value="3">Reporte de riesgo</option>
              </select>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
          <span id="titleTipoReporte">Reportes sistema bitácora de vigilancias</span>
        </div>

        <div class="card-body">
            <div id="chart_div"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/reportes/script.js') }}" type="module"></script>
@endsection

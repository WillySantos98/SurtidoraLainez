@extends('Index.base')
@section('title', 'Cobros')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: white">
                <div id="SpinnerCobros1">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                        </div>
                    </div>
                </div>

                <div id="CuerpoCobros1" style="display: none">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight">
                            @include('Index.componentes.ButtonBack')
                        </div>
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h5 class="text-center text-gray-600">Cuentas en Mora Nivel 1</h5>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="">Calendario</a>
                        </div>
                    </div>

                    <table class="table table-bordered table-sm table-hover table-striped" id="TableCobros1">
                        <thead>
                            <tr>
                                <th># Reporte</th>
                                <th># Cuenta</th>
                                <th>Nombre Completo</th>
                                <th>Mora</th>
                                <th>Importancia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportes as $reporte)
                                <tr onclick="MostrarReporte('{{$reporte->codigo_reporte}}')">
                                    <td>{{$reporte->codigo_reporte}}</td>
                                    <td>{{$reporte->cod_cuenta}}</td>
                                    <td>{{$reporte->nombres}} {{$reporte->apellidos}}</td>
                                    <td>L.{{$reporte->total_intereses}}</td>
                                    <td><span class="badge badge-warning">Nivel 1</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    {!! Html::script('js/Cobros/cobros.js') !!}
@endsection


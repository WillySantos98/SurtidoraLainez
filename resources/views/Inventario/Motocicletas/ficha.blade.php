@extends('Index.base')
@section('title', 'Ficha de Motocicleta')
@section('content')
   <!-- <div class="container-fluid" style="overflow: auto; height: 570px"> -->
    <div class="container-fluid">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">@include('Index.componentes.ButtonBack')</div>
            <div class="p-2 bd-highlight">
                @foreach($informacion_moto as $info)
                    <div class="container-fluid">
                        <h4 class="text-center">Ficha de la Motocicleta --> {{$info->nombre_mar}} {{$info->nombre_mod}} {{$info->codigo}} --<</h4>
                    </div>
            </div>
        </div>
            <hr>
            <h4 class="text-center">Informacion de Entrada</h4>
            <div class="d-flex justify-content-between">
               @include('Inventario.Motocicletas.Tablas.TablaInformacionEntrada')
            </div>
            <hr>
        @endforeach

            <h4 class="text-center">Informacion de la motocicleta</h4>

        @foreach($info_modelo as $info_m)
            @include('Inventario.Motocicletas.Tablas.TablaInformacionModelo')
        @endforeach

        @foreach($info_fisico as $info_f)
            @include('Inventario.Motocicletas.Tablas.TablaInformacionFisica')
        @endforeach

        @foreach($documentos_moto as $info_m)
            @include('Inventario.Motocicletas.Tablas.TablaDocumentosMoto')
        @endforeach

            <hr>
        <h4 class="text-center">Historial de la Motocicleta</h4>

            <div class="card shadow mb-4">
                <a href="#collapse-HistorialMotocicletas" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                    <h6 class="m-0 font-weight-bold text-primary">Historial</h6>
                </a>
                <div class="collapse" id="collapse-HistorialMotocicletas">
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection
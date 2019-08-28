@extends('Index.base')
@section('title', 'Placas en Transferencia')
@section('content')
    <div class="row">
        <div class="col">@include('Index.componentes.ButtonBack')</div>
        <div class="col"><h4 class="text-center">Transferencias de Placas Aceptadas por la Sucursal de Destino</h4></div>
        <div class="col"><input class="form-control" id="myInput" type="text" placeholder="Buscar..."></div>
    </div>
    <div style="overflow-y: scroll; height: 70%; margin-top: 20px">
        <table class="table table-sm table-hover table-responsive-xl">
            <thead>
            <tr>
                <th>Cod.</th>
                <th>Almacen de Destino</th>
                <th>Almacen de Actual</th>
                <th>lote</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

@endsection

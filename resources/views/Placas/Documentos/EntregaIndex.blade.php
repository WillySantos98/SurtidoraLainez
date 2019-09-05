@extends('Index.base')
@section('title', 'Placas Entregadas')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">@include('Index.componentes.ButtonBack')</div>
            <div class="col"><h4 class="text-center">Placas Entregada a Clientes</h4></div>
            <div class="col"><input class="form-control" id="myInput" type="text" placeholder="Buscar..."></div>
        </div>

        <table style="margin-top: 10px" class="table table-responsive-lg table-hover table-sm">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Cliente</th>
                    <th>Chasis</th>
                    <th>Fecha de Entrega</th>
                    <th>Documento</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

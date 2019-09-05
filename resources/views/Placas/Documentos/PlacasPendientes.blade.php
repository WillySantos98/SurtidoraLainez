@extends('Index.base')
@section('title', 'Placas en Pendientes')
@section('content')
    <div class="row">
        <div class="col">@include('Index.componentes.ButtonBack')</div>
        <div class="col"><h4 class="text-center">Placas de Pendientes de Ventas Realizadas</h4></div>
        <div class="col"><input class="form-control" id="myInput" type="text" placeholder="Buscar..."></div>
    </div>
    <div style="overflow-y: scroll; height: 70%; margin-top: 20px">
        <table class="table table-sm table-hover table-responsive-xl">
            <thead>
            <tr>
                <th># Venta</th>
                <th># de Factura</th>
                <th>Sucursal de Venta</th>
                <th>Chasis</th>
                <th>Proveedor</th>
                <th>venta</th>
            </tr>
            </thead>
            <tbody>
                @foreach($placas as $placa)
                    <tr>
                        <td>{{$placa->cod_venta}}</td>
                        <td>{{$placa->num_venta}}</td>
                        <td>{{$placa->nombre_suc}}</td>
                        <td><a href="/inventario/motocicletas/ficha/{{$placa->id_moto}}">{{$placa->chasis}}</a></td>
                        <td>{{$placa->nombre}}</td>
                        <td><a href="/inventario/motocicletas/documentos/salidas/{{$placa->cod_venta}}">ver venta ...</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

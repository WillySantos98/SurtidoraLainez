@extends('Index.base')
@section('title', 'Motocicletas Vendidas')
@section('content')
    <div class="container-fluid">
        @include('Inventario.Motocicletas.Documentos.encabezado')
        <hr>
        <h4 class="text-center">Motocicletas Vendidas</h4>
        <div style="overflow-y: scroll; height: 450px">
            <table class="table table-hover table-sm table-responsive-lg">
                <thead>
                    <tr>
                        <th># Factura</th>
                        <th>Sucursal de Salida</th>
                        <th>Modelo</th>
                        <th>Chasis</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody id="bodyTable">
                    @foreach($motos as $moto)
                        <tr>
                            <td><a href="/inventario/motocicletas/documentos/salidas/{{$moto->cod_venta}}">{{$moto->num_venta}}</a></td>
                            <td>{{$moto->nombre_suc}}</td>
                            <td>{{$moto->nombre_mod}}</td>
                            <td>{{$moto->chasis}}</td>
                            <td>{{$moto->nombres}} {{$moto->apellidos}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('Index.componentes.buscador')
@endsection

@extends('Index.base')
@section('title', 'Ventas sin Contratos')
@section('content')


    <div class="container-fluid">
        @include('Inventario.Motocicletas.Documentos.encabezado')
        <hr>
        <div class="overflow-auto">
            <table class="table table-sm">
                <h4 class="text-center">Ventas de Contratos por Subir</h4>
                <thead>
                <tr>
                    <th>Cod. Salida</th>
                    <th>Num Salida</th>
                    <th>Sucursal de Salida</th>
                    <th>Cliente</th>
                    <th>Modelo</th>
                    <th>Venta</th>
                </tr>
                </thead>
                <tbody id="bodyTable">
                @foreach($salidas as $info)
                    <tr>
                        <td>{{$info->cod_venta}}</td>
                        <td>{{$info->num_venta}}</td>
                        <td>{{$info->nombre}}</td>
                        <td>{{$info->nombres}} {{$info->apellidos}}</td>
                        <td>{{$info->nombre_mod}}</td>
                        <td><a href="/inventario/motocicletas/documentos/salidas/{{$info->cod_venta}}">ver venta...</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $salidas->render() !!}
        </div>
    </div>

    @include('Index.componentes.buscador')
@endsection

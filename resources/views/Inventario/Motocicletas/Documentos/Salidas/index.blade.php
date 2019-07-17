@extends('Index.base')
@section('title', 'Salidas')
@section('content')


    <div class="container-fluid">
        @include('Inventario.Motocicletas.Documentos.encabezado')
        <hr>
        <div class="overflow-auto">
            <table class="table table-sm">
                <h4 class="text-center">Documentos de Salidas x Venta</h4>
                <thead>
                <tr>
                    <th>Cod. Salida</th>
                    <th>Num Salida</th>
                    <th>Nombre del Cliente</th>
                    <th>Codigo Motocicleta</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fecha de Salida</th>
                    <th>Venta</th>
                </tr>
                </thead>
                <tbody id="bodyTable">
                @foreach($salidas as $info)
                    <tr>
                        <td>{{$info->cod_venta}}</td>
                        <td>{{$info->num_venta}}</td>
                        <td>{{$info->nombres}} {{$info->apellidos}}</td>
                        <td>{{$info->id_moto}}</td>
                        <td>{{$info->nombre}}</td>
                        <td>{{$info->nombre_mod}}</td>
                        <td>{{$info->fecha_salida}}</td>
                        <td><a href="/inventario/motocicletas/documentos/salidas/{{$info->cod_venta}}">ver venta...</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('Index.componentes.buscador')
@endsection
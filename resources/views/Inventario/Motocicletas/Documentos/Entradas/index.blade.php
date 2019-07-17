@extends('Index.base')
@section('title', 'Documentos de Entradas')
@section('content')
<div class="container-fluid">
    @include('Inventario.Motocicletas.Documentos.encabezado')
    <hr>
    <div style="overflow-y: scroll; height: 450px">
        <table class="table table-sm">
            <h4 class="text-center">Documentos de Entrada</h4>
            <thead>
            <tr>
                <th># de Entrada</th>
                <th># de Transferencia</th>
                <th>Fecha de Entrada</th>
                <th>Proveedor</th>
                <th>Sucursal de Entrada</th>
                <th>Tipo de Entrada</th>
                <th>Ver Ficha</th>
            </tr>
            </thead>
            <tbody id="bodyTable">
            @foreach($DatosEntrada as $datos)
                <tr>
                    <td>{{$datos->cod_entrada}}</td>
                    <td>{{$datos->num_transferencia}}</td>
                    <td>{{$datos->fecha_entrada}}</td>
                    <td>{{$datos->nombre_pro}}</td>
                    <td>{{$datos->nombre_suc}}</td>
                    <td>{{$datos->nombre_ent}}</td>
                    <td><a href="/inventario/motocicletas/documentos/entrada/{{$datos->cod_entrada}}">Ver ficha</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Index.componentes.buscador')
@endsection
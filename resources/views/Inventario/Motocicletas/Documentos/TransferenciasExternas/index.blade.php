@extends('Index.base')
@section('title', 'Transferencias Externas')
@section('content')
    @include('Index.componentes.status')
    @include('Inventario.Motocicletas.Documentos.encabezado')
    <hr>
    <h4 class="text-center">Transferencias Externas</h4>
    <div class="container-fluid">
        <div style="overflow-y: scroll; height: 500px">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th># de Transferencia</th>
                    <th>Almacen de Salida</th>
                    <th>Fecha de Salida</th>
                    <th>Lugar de Destino</th>
                    <th>Usuario Creador</th>
                    <th>Transferencia</th>
                </tr>
                </thead>
                <tbody id="bodyTable">
                @foreach($transferencia as $trans)
                    <tr>
                        <td>{{$trans->cod_transferencia}}</td>
                        <td>{{$trans->nombre}}</td>
                        <td>{{$trans->fecha_decision}}</td>
                        <td>{{$trans->destino}}</td>
                        <td>{{$trans->usuario}}</td>
                        <td><a href="/inventario/motocicletas/documentos/salidas_x_transferencia_externa/{{$trans->cod_transferencia}}">Ver Transferencia</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
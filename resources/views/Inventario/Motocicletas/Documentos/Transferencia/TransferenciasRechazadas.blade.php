@extends('Index.base')
@section('title', 'Transferencias Rechazadas')
@section('content')
    @include('Inventario.Motocicletas.Documentos.encabezado')
    <hr>
    <h4 class="text-center">Transferencias Rechazadas</h4>
    <div class="container-fluid">
        <table class="table table-sm">
            <thead>
            <tr>
                <th># de Transferencia</th>
                <th>Almacen de Salida</th>
                <th>Fecha Solicitada</th>
                <td>Estado</td>
                <th>Transferencia</th>
            </tr>
            </thead>
            <tbody id="bodyTable">
            @foreach($transferencia as $info)
                <tr>
                    <td>{{$info->cod_transferencia}}</td>
                    <td>{{$info->nombre_suc}}</td>
                    <td>{{$info->fecha_solicitada}}</td>
                    @if($info->estado == 3)
                        <td><span class="badge badge-danger">Rechazada por Supervisor</span></td>
                    @endif
                    <td><a href="/inventario/motocicletas/documentos/transferencias_internas/{{$info->cod_transferencia}}">ver Transferencia</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
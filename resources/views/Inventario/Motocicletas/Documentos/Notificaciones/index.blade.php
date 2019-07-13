@extends('Index.base')
@section('title', 'Notificaciones Pendientes')
@section('content')
    @include('Inventario.Motocicletas.Documentos.encabezado')
    <h4 class="text-center">Notificaciones</h4>
    <table class="table table-sm">
        <thead>
            <th>Cod. de Venta</th>
            <th>Num. de Venta</th>
            <th>Nombre del Cliente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Chasis</th>
            <th>Accion</th>
        </thead>
        <tbody id="bodyTable">
        @foreach($notificaciones as  $info)
            <tr>
                <td>{{$info->cod_venta}}</td>
                <td>{{$info->num_venta}}</td>
                <td>{{$info->nombres}} {{$info->apellidos}}</td>
                <td>{{$info->nombre}}</td>
                <td>{{$info->nombre_mod}}</td>
                <td>{{$info->chasis}}</td>
                <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#ModalGeneracionNotificacion" data-id="{{$info->id}}">
                        <i class="fa fa-file" aria-hidden="true"> Generar</i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="ModalGeneracionNotificacion" tabindex="-1" role="dialog" aria-labelledby="ModalGeneracionNotificacion" aria-hidden="true">
        @include('Inventario.Motocicletas.Documentos.Notificaciones.Modals.ModalGenerarNotificacion')
    </div>
    @include('Index.componentes.buscador')
@endsection
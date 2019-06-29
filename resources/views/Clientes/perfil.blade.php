@extends('Index.base')
@section('title', 'Perfil del Cliente')
@section('content')
    @foreach($cliente as $item)
        <h3 class="text-center">Perfil del Cliente {{$item->nombres}} {{$item->apellidos}}</h3>

        <hr>
        <h6>Datos del Cliente</h6>
        <div class="row">
            <div class="col">
                <h6>Nombre Completo: {{$item->nombres}} {{$item->apellidos}}</h6>
            </div>
            <div class="col">
                <h6>Numero de Identidad: {{$item->identidad}}</h6>
            </div>
            <div class="col">
                <h6>Numero de Rtn:  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalRtn"
                                                          data-id="{{$item->id}}"
                                                          data-rtn="{{$item->rtn}}"
                                                          data-nombre="{{$item->nombres}}"><i style="" class="fa fa-address-card" aria-hidden="true"></i> {{$item->rtn}}</button> </h6>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDocumentos"
                        data-nombre="{{$item->nombres}}"> <i class="fa fa-file" aria-hidden="true"></i></button>
            </div>
        </div>
        <hr>

    @endforeach
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <a href="#collapse-Telefono" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                    <h6 class="m-0 font-weight-bold text-primary">Telefonos</h6>
                    <div class="collapse" id="collapse-Telefono">
                        <div class="card-body">
                            @include('Clientes.Tablas.TablaTelefonosCliente')
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <a href="#collapse-Direcciones" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                    <h6 class="m-0 font-weight-bold text-primary">Direcciones</h6>
                    <div class="collapse" id="collapse-Direcciones">
                        <div class="card-body">
                            @include('Clientes.Tablas.DireccionesClientes')
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="card shadow mb-4">
        <a href="#collapse-Historial" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
            <h6 class="m-0 font-weight-bold text-primary">Historial</h6>
            <div class="collapse" id="collapse-Historial">
                <div class="card-body">
                    @include('Clientes.Tablas.DireccionesClientes')
                </div>
            </div>
        </a>
    </div>

    <hr>
    <h3 class="text-center">Tabla de Articulos Solicitados por el Cliente</h3>
    <div class="container-fluid" style="overflow-y: scroll; height: 200px">
        <table class="table table-hover table-striped" >
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Fecha</th>
                <th>Ficha de la Venta</th>
            </tr>
            </thead>
            <tbody>
                @foreach($articulos_solicitados as $info)
                    <tr>
                        <td><a href="/inventario/motocicletas/ficha/{{$info->id_moto}}">{{$info->id_moto}}</a></td>
                        <td>{{$info->nombre}}</td>
                        <td>{{$info->nombre_mod}}</td>
                        <td>{{$info->fecha_salida}}</td>
                        <td>a{{$info->cod_venta}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade bd-example-modal-sm" id="ModalRtn" tabindex="-1" role="dialog" aria-labelledby="ModalRtn" aria-hidden="true">
        @include('Clientes.Modals.ModalRtn')
    </div>
    <div class="modal fade bd-example-modal-xl" id="ModalDocumentos" tabindex="-1" role="dialog" aria-labelledby="ModalDocumentos" aria-hidden="true">
        @include('Clientes.Modals.ModalDocumentos')
    </div>
@endsection
@extends('Index.base')
@section('title', 'Permisos de Circulacion')
@section('content')
@include('Inventario.Motocicletas.Documentos.encabezado')
<div class="container-fluid">
    <h4 class="text-center">Nombre de Clientes</h4>
</div>
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>Nombre Completo del Cliente</th>
                <th>Numero de Identidad</th>
                <th>Generador</th>
            </tr>
        </thead>
        <tbody id="bodyTable">
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nombres}} {{$cliente->apellidos}}</td>
                    <td>{{$cliente->identidad}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMotocicletasPorClientes" value="{{$cliente->id}}"
                                data-nombre="{{$cliente->nombres}} {{$cliente->apellidos}}" data-id="{{$cliente->id}}" onclick="MotosPorCliente(this.value)">
                            Ver Compras
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


<div class="modal fade" id="ModalMotocicletasPorClientes" tabindex="-1" role="dialog" aria-labelledby="ModalMotocicletasPorClientes" aria-hidden="true">
    @include('PermisosCirculacion.Modals.ModalCompras')
</div>


@include('Index.componentes.buscador')
@endsection

@extends('Index.base')
@section('title', 'Registro de Clientes')
@section('content')

    @include('Index.componentes.any')
    @include('Index.componentes.status')

    <div class="custom-container"></div>
    <h3 class="text-center">Registro de Nuevo Cliente</h3>
    <hr>
    <div class="container-fluid">
        <div class="container-fluid w-100">
            @include('Clientes.formularios.FormularioRegistroCliente')
        </div>
    </div>

@endsection

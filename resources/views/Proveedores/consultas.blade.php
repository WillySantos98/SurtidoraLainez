@extends('Index.base')
@section('title', 'Consulta de Proveedores')
@section('content')

    <div class="container-fluid">
        <hr>
        <h4 class="text-center">Contenidos de los Proveedores para Editar</h4>
        <hr>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p>
                        {{$error}}
                    </p>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col col-4" style="overflow-y: scroll; height: 350px">
                <hr>
                <h4 class="text-center">Tabla de Tipo de Vehiculos</h4>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <button class="btn btn-info p-2 bd-highlight" style="background-color: white; border: grey;">
                    <input class="form-control" id="myInput" type="text" placeholder="Buscar tipos de motos..."></button>
                    @include('Proveedores.tablas.TablaTipoVehiculo')
                <hr>
            </div>
            <div class="col" style="overflow-y: scroll; height: 350px">
                <hr>
                <h4 class="text-center">Tabla de Modelos de Motocicletas</h4>
                @if(session('modelos'))
                    <div class="alert alert-success">
                        {{ session('modelos') }}
                    </div>
                @endif
                <button class="btn btn-info p-2 bd-highlight" style="background-color: white; border: grey;">
                    <input class="form-control" id="myInput2" type="text" placeholder="Buscar modelos..."></button>

                @include('Proveedores.tablas.TablaModelos')
                <hr>
            </div>
        </div>
        <hr>
        <h4 class="text-center">Tabla de Proveedores</h4>
        <button class="btn btn-info p-2 bd-highlight" style="background-color: white; border: grey;">
            <input class="form-control" id="myInput3" type="text" placeholder="Buscar proveedor..."></button>
        <div  style="overflow-y: scroll; height: 350px">
            @include('Proveedores.tablas.TablaProveedores')
        </div>
    </div>


@endsection
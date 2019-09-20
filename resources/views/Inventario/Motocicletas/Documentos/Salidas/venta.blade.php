@extends('Index.base')
@section('title', 'SL Ficha de Venta')
@section('content')
    <div class="container-fluid">
        <div class="card border-left-primary">
            @foreach($cliente as $info)
                @include('Index.componentes.status')
                <div class="d-flex justify-content-between" style="padding: 5px">
                    @include('Index.componentes.ButtonBack')
                    <h4 class="text-gray-500">Venta Código {{$info->cod_venta}}</h4>
                </div>
            <div class="row">
                <div class="col">
                    <div class="card border-left-warning" style="padding: 3px">
                        @include('Inventario.Motocicletas.Documentos.Salidas.Tablas.TablaInfoVenta')
                    </div>
                </div>
                <div class="col">
                    <div class="card border-left-warning" style="padding: 3px">
                        @include('Inventario.Motocicletas.Documentos.Salidas.Tablas.TablaInfoCliente')
                        <br>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-left-warning" style="padding: 3px">
                        @include('Inventario.Motocicletas.Documentos.Salidas.Tablas.TablaInfoMoto')
                    </div>
                </div>
            </div>
            @endforeach
            <hr>
            <div class="row">
                <div class="col"><h5 class="text-gray-400 text-center">Información de Financiera</h5></div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>


    </div>
@endsection

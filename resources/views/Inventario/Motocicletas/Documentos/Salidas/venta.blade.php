@extends('Index.base')
@section('title', 'SL Ficha de Venta')
@section('content')
    <div class="container-fluid">
        @include('Index.componentes.status')
        <hr>
        <div class="d-flex justify-content-between">
            <a href="{{route('salidas.index')}}" class="btn btn-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"> Volver Atras</i>
            </a>
            @foreach($cliente as $info)
                <h4 class="text-center">Venta con codigo {{$info->cod_venta}}</h4>
            @endforeach
        </div>
        <hr>
        <h5 class="text-center">Informacion de la Venta</h5>
        @foreach($cliente as $info)
            @include('Inventario.Motocicletas.Documentos.Salidas.Tablas.TablaInfoVenta')
        @endforeach
        <hr>
        <h5 class="text-center">Informacion del Cliente</h5>
        @foreach($cliente as $info)
            @include('Inventario.Motocicletas.Documentos.Salidas.Tablas.TablaInfoCliente')
        @endforeach
        <hr>
        <h5 class="text-center">Informacion de la Motocicleta</h5>
        @foreach($cliente as $info)
            @include('Inventario.Motocicletas.Documentos.Salidas.Tablas.TablaInfoMoto')
        @endforeach
    </div>
@endsection
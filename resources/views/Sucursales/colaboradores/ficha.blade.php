@extends('Index.base')
@section('title', 'Surtidora Lainez - Ficha de Colaboradores')
@section('content')

    @include('Index.componentes.status')
    @foreach($ConsultaColaborador as $colaborador)
        <div class="d-flex p-2 bd-highlight text-center">Ficha de : {{$colaborador->nombre}}</div>

        @include('Sucursales.tablas.TablaColaboradorCompleta')

    @endforeach
    <hr>
    <h3 class="text-center">Historial del Colaborador</h3>
@endsection

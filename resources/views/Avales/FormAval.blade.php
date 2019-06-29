@extends('Index.base')
@section('title', 'Registro de Avales')
@section('content')

    @include('Index.componentes.any')
    @include('Index.componentes.status')
    <h3 class="text-center">Registro de Nuevo Aval</h3>
    <hr>
    <div class="container-fluid">

        <div class="container-fluid w-100">

            @include('Avales.formularios.FormularioRegistroAval')

        </div>
    </div>
    <hr>

@endsection
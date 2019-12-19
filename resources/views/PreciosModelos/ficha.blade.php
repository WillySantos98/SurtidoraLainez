@extends('Index.base')
@section('title', 'Asignacion de Precios')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div >@include('Index.componentes.ButtonBack')</div>
            @foreach($modelos as $mol)
            <h4 class="text-center">Asignacion de Precios del Modelo {{$mol->nombre_mod}}</h4>
            @endforeach
        </div>
        <hr>
        @include('PreciosModelos.FormPrecio')
    </div>

@endsection

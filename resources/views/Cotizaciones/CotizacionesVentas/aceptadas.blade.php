@extends('Index.base')
@section('title', 'Cotizaciones Ventas Aceptadas')
@section('content')

    <div class="card">
        <div class="row" style="padding: 5px">
            <div class="col">@include('Index.componentes.ButtonBack')</div>
            <div class="col"><h4>Cotizacion {{$cod}}</h4></div>
        </div>
        @foreach($cotizaciones as $cotizacion)
            @include('Cotizaciones.cot')
        @endforeach

    </div>



@endsection

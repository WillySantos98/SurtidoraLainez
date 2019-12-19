@extends('Index.base')
@section('title', 'Cotizaciones Abiertas')
@section('content')

    <div class="card">
        <div class="row" style="padding: 5px">
            <div class="col">@include('Index.componentes.ButtonBack')</div>
            <div class="col"><h4>Cotizacion {{$cod}}</h4></div>
        </div>
        @foreach($cotizaciones as $cotizacion)
            <div class="row" style="padding: 5px">
                <div class="col-auto">
                    <button class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </div>
                <div class="col-auto">
                    <a href="/documentos/cotizaciones/cotizaciones_potenciales_abiertas/pdf/{{$cod}}" target="_blank" class="btn btn-outline-warning">
                        <i class="fa fa-print" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            @include('Cotizaciones.cot')
        @endforeach
    </div>



@endsection

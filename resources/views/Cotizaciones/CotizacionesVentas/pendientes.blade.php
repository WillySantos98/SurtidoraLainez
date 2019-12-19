@extends('Index.base')
@section('title', 'Cotizaciones Ventas Pendientes')
@section('content')

    <div class="card">
        <div class="row" style="padding: 5px">
            <div class="col">@include('Index.componentes.ButtonBack')</div>
            <div class="col"><h4>Cotizacion {{$cod}}</h4></div>
        </div>
        @foreach($cotizaciones as $cotizacion)
            @if($cotizacion->estado_condicion == 2)
                <form action="{{route('cotizacion.aceptar')}}" method="post">
                    @csrf
                    <div class="row" style="padding: 5px">
                        <div class="col-auto">
                            <label for="">La cotización se ajusta a una buena venta</label>
                        </div>
{{--                        <div class="col-auto">--}}
{{--                            <button class="btn btn-outline-danger" onclick="AceptarCotizacion()"><i class="fa fa-times" aria-hidden="true"></i></button>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <button class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></button>--}}
{{--                        </div>--}}
                        <div class="col-auto">
                            <select name="SelectDec" class="form-control" id="">
                                <option value="0">--Seleccione una Opcion</option>
                                <option value="3">Aceptar Cotizacion</option>
                                <option value="4">No Aceptar Cotizacion</option>
                            </select>
                            <input type="text" name="cod" value="{{$cod}}" hidden>
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-outline-primary" value="Registrar Decision">
                        </div>
                    </div>
                </form>
            @endif
            @include('Cotizaciones.cot')
        @endforeach

    </div>



@endsection

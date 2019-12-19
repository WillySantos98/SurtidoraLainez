@extends('Index.base')
@section('title', 'Asignacion de Cuentas')
@section('content')

    <div class="container">
        <div id="SpinnerAsignacionIndex">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div id="SpinnerElementoAsignacionIndex" style="display: none">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    @include('Index.componentes.ButtonBack')
                </div>
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h3 class="text-center text-gray-600"><strong>Salidas sin cuentas de Surtidora Lainez</strong></h3>
                </div>
            </div>
            <table id="TableAsignacion" class="table table-sm table-bordered table-hover table">
                <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Salida</th>
                    <th>Asignar Cuenta</th>
                </tr>
                </thead>
                <tbody>
                @foreach($salidas as $salida)
                    <tr>
                        <td>{{$salida->nombres}} {{$salida->apellidos}}</td>
                        <td>{{$salida->cod_venta}}</td>
                        <td>{{$salida->nombre}}</td>
                        <td>{{$salida->nombre_mod}}</td>
                        <td><a href="/cuentas/asignacion/{{$salida->cod_venta}}">Asignarle cuenta</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('js')
    {!! Html::script('js/Cuentas/Asignacion.js') !!}
@endsection

@extends('Index.base')
@section('title', 'Cuentas')
@section('content')
    {{--@include('Cuentas.Componentes.Menu')--}}
    <div class="container card" style="padding: 10px">
        <div class="card-header" style="background-color: white">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    @include('Index.componentes.ButtonBack')
                </div>
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h5 class="text-center text-gray-600"><strong>Cuenta {{$cod}}</strong></h5>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 5px">
            <div class="col-auto">
                <div class="list-group">
                    <button class="list-group-item list-group-item-action " onclick="MostrarSeccionCuenta(1)">
                        Informacion de la Cuenta
                    </button>
                    <button onclick="MostrarSeccionCuenta(2)" id="BotonesCuentas2" disabled class="list-group-item list-group-item-action">Historial de Pagos</button>
                    <button onclick="MostrarSeccionCuenta(3)" id="BotonesCuentas3" disabled class="list-group-item list-group-item-action">Historial de Mora</button>
                    <button onclick="MostrarSeccionCuenta(4)" id="BotonesCuentas4" disabled class="list-group-item list-group-item-action">Proximos Pagos</button>
                    <button onclick="MostrarSeccionCuenta(5)" id="BotonesCuentas5" disabled class="list-group-item list-group-item-action">Estado de Cuenta</button>
                    <button class="list-group-item list-group-item-action" disabled>Estado de Ganancias</button>
                    <button class="list-group-item list-group-item-action" disabled>Avales</button>
                    <button class="list-group-item list-group-item-action" disabled>Referencias</button>
                    <button onclick="MostrarSeccionCuenta(9)" class="list-group-item list-group-item-action">Modificar</button>
                </div>
            </div>
            <div id="Cuerpo2Cuentas" class="col" style="padding: 10px">
                <input type="text" value="{{$cod}}" id="InputCodigoCuenta" hidden>
                <div id="CuerpoDefaultCuentas">@include('Cuentas.Cuenta.CuerpoDefault')</div>
                <div id="CuerpoHistorialMora" style="display: none">@include('Cuentas.Cuenta.HistoriaMora')</div>
                <div id="CuerpoHistorialPagos" style="display: none">@include('Cuentas.Cuenta.CuerpoPagos')</div>
                <div id="CuerpoProximoPagos" style="display: none">@include('Cuentas.Cuenta.CuerpoProximoPagos')</div>
                <div id="CuerpoEstadoCuenta" style="display: none">@include('Cuentas.Cuenta.EstadoCuenta')</div>
                <div id="CuentaModificar" style="display: none;">@include('Cuentas.Cuenta.Modificar')</div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {!! Html::script('js/Cuentas/cuenta.js') !!}
@endsection


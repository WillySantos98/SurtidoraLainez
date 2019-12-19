@extends('Index.base')
@section('title', 'Asignacion de Cuenta')
@section('content')

    <div class="container card">
        <div class="d-flex bd-highlight">
            <div class="p-2 bd-highlight">
                @include('Index.componentes.ButtonBack')
            </div>
            <div class="p-2 flex-grow-1 bd-highlight">
                <h5 class="text-center text-gray-600"><strong>Asignación de Cuenta</strong></h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-auto">
                <div class="list-group">
                    <button type="button" onclick="MostrarSeccionAsignacion(1)" class="list-group-item list-group-item-action">Verificacion de Datos</button>
                    <button type="button" id="BotonesAsignacion2" onclick="MostrarSeccionAsignacion(2)" disabled class="list-group-item list-group-item-action" >Informacion del Precio</button>
                    <button type="button" id="BotonesAsignacion3" onclick="MostrarSeccionAsignacion(3)" disabled class="list-group-item list-group-item-action" >Asignaciones de Pagos</button>
                </div>
            </div>
            <div class="col">
                <div id="Seccion1Asignacion">
                    <div id="CuerpoVerificacionInicial">@include('Cuentas.Asignacion.Secciones.VerificacionInicial')</div>
                    <div id="CuerpoPrecioAsignacion" style="display: none">@include('Cuentas.Asignacion.Secciones.InformacionPrecio')</div>
                    <div id="CuerpoPagosAsignacion" style="display: none">@include('Cuentas.Asignacion.Secciones.Pagos')</div>
                </div>
            </div>
            <div id="CodigoCuentaAsignacion"></div>
        </div>
    </div>

@endsection
@section('js')
    {!! Html::script('js/Cuentas/Asignaciones.js') !!}
@endsection

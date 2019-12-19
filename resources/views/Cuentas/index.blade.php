@extends('Index.base')
@section('title', 'Cuentas')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Cuentas de Surtidora Lainez</h6>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-auto ">
                    <button style="height: 110px; width: 110px;" onclick="CuentasBtnCuentas()" class="btn btn-outline-info">Cuentas</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" onclick="AsignacionCuenta()"  class="btn btn-outline-info">Asignacion de Cuenta</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" onclick="PostearCuentas()" class="btn btn-outline-info">Postear Cuentas</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" onclick="OtrasCuentas()" class="btn btn-outline-info">Otras Cuentas</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" onclick="CalendarioAbonos()" class="btn btn-outline-info">Calendario de Abonos</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" onclick="Caja()" class="btn btn-outline-info">Caja</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" onclick="Mora1()" class="btn btn-outline-danger">Cuentas en Mora: Nivel 1</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" class="btn btn-outline-danger">Cuentas en Mora: Nivel 2</button>
                </div>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" class="btn btn-outline-danger">Cuentas en Mora: Nivel 3</button>
                </div>
                <div class="col-auto">
                    <button style="height: 110px; width: 110px;" class="btn btn-outline-danger">Cuentas en Mora: Nivel 4</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    {!! Html::script('js/Cuentas/cuentas.js') !!}
@endsection

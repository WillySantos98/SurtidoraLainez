@extends('Index.base')
@section('title', 'Posteo de Cuentas')
@section('content')
    <div class="container card">
        <div id="SpinnerPosteoCuentasIndex">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div id="SpinnerElementosPosteoCuentasIndex" style="display: none">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    @include('Index.componentes.ButtonBack')
                </div>
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h3 class="text-center">Posteo de Cuentas</h3>
                </div>
            </div>
            <table class="table table-responsive-lg table-hover table-sm table-bordered" id="TableCargarCuentasPostear">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Cliente</th>
                    <th>Articulo</th>
                    <th>Saldo</th>
                    <th>Intereses</th>
                    <th>Saldo Total</th>
                    <th>Postear Abono</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cuentas as $cuenta)
                    <tr>
                        <td>{{$cuenta->cod_cuenta}}</td>
                        <td>{{$cuenta->nombres}} {{$cuenta->apellidos}}</td>
                        <td>{{$cuenta->nombre_mod}}</td>
                        <td>L.{{$cuenta->saldo_actual}}</td>
                        <td>L.{{$cuenta->total_intereses}}</td>
                        <td>L.{{$cuenta->saldo_actual + $cuenta->total_intereses}}</td>
                        <td><a href="/cuenta/posteo/{{$cuenta->cod_cuenta}}">Postear Cuenta</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    {!! Html::script('js/Cuentas/CargarCuentas.js') !!}
@endsection

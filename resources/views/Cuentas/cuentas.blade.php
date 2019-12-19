@extends('Index.base')
@section('title', 'Cuentas')
@section('content')
{{--@include('Cuentas.Componentes.Menu')--}}
<div class="container card" style="padding: 10px">
    <div id="SpinnerCuentasIndex">
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
            </div>
        </div>
    </div>
   <div id="SpinnerElementosCuentasIndex" style="display: none">
       <div class="d-flex bd-highlight">
           <div class="p-2 bd-highlight">
               @include('Index.componentes.ButtonBack')
           </div>
           <div class="p-2 flex-grow-1 bd-highlight">
               <h3 class="text-center text-gray-600"><strong>Cuentas de Surtidora Lainez</strong></h3>
           </div>
       </div>
       <table class="table table-hover table-bordered table-sm" id="TableCuentas">
           <thead>
           <tr>
               <th>Codigo</th>
               <th>Nombre Completo</th>
               <th>Descripcion</th>
               <th>Total Cuenta</th>
               <th>Total Mora</th>
           </tr>
           </thead>
           <tbody>
           @foreach($cuentas as $cuenta)
               <tr>
                   <td><a href="/cuenta/{{$cuenta->cod_cuenta}}">{{$cuenta->cod_cuenta}}</a></td>
                   <td>{{$cuenta->nombres}} {{$cuenta->apellidos}}</td>
                   <td>{{$cuenta->nombre_mod}}</td>
                   <td>L.{{$cuenta->saldo_actual}}</td>
                   <td>L.{{$cuenta->total_intereses}}</td>
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


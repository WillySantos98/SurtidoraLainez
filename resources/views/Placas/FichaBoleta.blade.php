@extends('Index.base')
@section('title', 'Ficha de Boleta')
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">@include('Index.componentes.ButtonBack')</div>
            <div class="p-2 bd-highlight"><h4 class="text-center">Ficha de la Boleta</h4></div>
        </div>
        <hr>
        <h5>-Informacion de la Boleta Ingresada</h5>
        @foreach($boleta as $bol)
            <div class="row">
                <div class="col"><strong>*NUMERO DE INGRESO:</strong> {{$bol->num_ingreso}}</div>
                <div class="col"><strong>*NUMERO DE BOLETA:</strong> {{$bol->num_boleta}}</div>
                <div class="col"><strong>*NUMERO DE COMPROBANTE:</strong> {{$bol->comprobante}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>*FECHA DE VENCIMIENTO:</strong> {{$bol->fecha_vencimiento}}</div>
                <div class="col"><strong>*NUMERO DE PLACA:</strong> {{$bol->num_placa}}</div>
                <div class="col"><strong>*IDENTIFICACION:</strong> {{$bol->identificacion}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>*PROPIETARIO:</strong> {{$bol->propietario}}</div>
                <div class="col"><strong>*AÑO:</strong> {{$bol->ano}}</div>
                <div class="col"><strong>*ESTADO:</strong> @if($bol->estado == 1) En poder de Surtidora Lainez @elseif($bol->estado == 2) Entregada al cliente @endif</div>
            </div>
            <div class="row">
                <div class="col"><strong>*CHASIS DE MOTOCICLETA:</strong> {{$bol->fecha_vencimiento}}</div>
                <div class="col"><strong>*USUARIO REGISTRADOR:</strong> {{$bol->usuario}}</div>
                <div class="col"><strong>*ALMACEN DE ENTRADA:</strong> {{$bol->identificacion}}</div>
            </div>
            <div class="row">
                <div class="col" style="color: green"><strong>*ESTADO DE PLACA:</strong> @if($bol->estado_enlazo == 1) Si Vino Placa  @elseif($bol->estado_enlazo == 2) No Vino Placa @endif</div>
                <div class="col"><strong>*OBSERVACION:</strong> {{$bol->observaciones}}</div>
                <div class="col"><strong>*NUMERO DE VENTA:</strong> <a href="/inventario/motocicletas/documentos/salidas/{{$bol->cod_venta}}" target="_blank">{{$bol->cod_venta}}</a></div>
            </div>
        @endforeach
        <h5 style="margin-top: 25px">-Informacion del Cliente</h5>
        @foreach($cliente as $cli)
            <div class="row">
                <div class="col"><strong>*NOMBRES:</strong> {{$cli->nombres}}</div>
                <div class="col"><strong>*APELLIDOS:</strong> {{$cli->apellidos}}</div>
                <div class="col"><strong>*IDENTIDAD:</strong> {{$cli->identidad}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>*RTN:</strong> {{$cli->rtn}}</div>
            </div>
        @endforeach
        <h5 style="margin-top: 25px">-Informacion del Vehiculo</h5>
        @foreach($vehiculo as $veh)
            <div class="row">
                <div class="col"><strong>*CODIGO DE MOTO:</strong> {{$veh->id_moto}}</div>
                <div class="col"><strong>*CHASIS:</strong> {{$veh->chasis}}</div>
                <div class="col"><strong>*MOTOR:</strong> {{$veh->motor}}</div>
            </div><div class="row">
                <div class="col"><strong>*COLOR:</strong> {{$veh->color}}</div>
                <div class="col"><strong>*MODELO:</strong> {{$veh->nombre_mod}}</div>
                <div class="col"><strong>*MARCA:</strong> {{$veh->nombre_marca}}</div>
            </div><div class="row">
                <div class="col"><strong>*PROVEEDOR:</strong> {{$veh->nombre_pro}}</div>
                <div class="col"><strong>*CIL:</strong> {{$veh->cilindraje}}</div>
                <div class="col"><strong>*TIENE PLACA ESTA MOTO:</strong>
                @if($veh->estado_placa == 1)
                    No tiene placa aun
                @elseif($veh->estado_placa == 2)
                    Si tiene placa
                @endif
                </div>
            </div>
        @endforeach

        <h5 style="margin-top: 25px">-Conclucion</h5>
        <div class="row">
            @foreach($boleta as $bol)
                <div class="col"><strong>*REGISTRO DE LA BOLETA:</strong>{{$bol->nombre_alm}}</div>
                @break
            @endforeach
            @foreach($vehiculo as $veh)
                    <div class="col"><strong>*SUCURSAL DE VENTA:</strong>{{$veh->nombre_suc}}</div>
            @endforeach
        </div>
        <div class="row">
            @foreach($cliente as $cli)
                <div class="col"><strong>*SUCURSAL DE ENTREGA:</strong>{{$cli->nombre_suc}}</div>
                @break
            @endforeach
            @foreach($almacen as $alm)
                <div class="col"><strong>*UBICACION ACTUAL DE BOLETA/PLACA:</strong>{{$alm->nombre}}</div>
                @break
            @endforeach
        </div>
        <div class="row">
            @foreach($cliente as $cli)
                @foreach($almacen as $alm)
                    @if($cli->id_suc == $alm->id)
                        <div class="col"><strong>*CONCLUCION:</strong>Con esta boleta esta todo bien.</div>
                    @else
                        <div class="col"><strong>*CONCLUCION:</strong>Hacer Transferencia urgente de esta boleta/placa a la sucursal de entrega, para la entrega inmediata al cliente.</div>
                    @endif
                    @break
                @endforeach
                @break
            @endforeach
        </div>
    </div>
@endsection

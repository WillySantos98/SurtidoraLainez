
    <div class="row">
        @foreach($cuentas as $cuenta)
            <div class="col">
                <div class="card">
                    <div style="padding: 10px">
                        <h6 class="text-center text-gray-400" style="font-size: 20px"><strong>Saldo Actual</strong></h6>
                        <h1 style="font-size: 60px"><strong>L.{{$cuenta->saldo_actual + $cuenta->total_intereses}}</strong></h1>
                        <h6><strong>Saldo Normal:</strong> L. {{$cuenta->saldo_actual}}</h6>
                        @foreach($pagos as $pago)
                            @if($cuenta->intervalo_pago == 0)
                                <h6><strong>Fecha del siguiente pago:</strong> {{$pago->dia_pago}}</h6>
                                <h6><strong>Fecha limite del siguiente pago:</strong> {{$pago->dia_limite_pago}}</h6>
                            @endif
                            @if($cuenta->intervalo_pago == 1)
                                <h6><strong>Fecha del siguiente pago:</strong> {{$pago->dia_pago}}</h6>
                                <h6><strong>Fecha limite del siguiente pago:</strong> {{$pago->dia_limite_pago}}</h6>
                            @endif
                            @if($cuenta->intervalo_pago == 2)
                                <h6><strong>Fecha del siguiente pago:</strong> {{$pago->dia_pago}}</h6>
                                <h6><strong>Fecha limite del siguiente pago:</strong> {{$pago->dia_limite_pago}}</h6>
                            @endif
                            @break
                        @endforeach
                        @if($cuenta->estado_cuenta == 1)
                            <h6><strong>Estado de la Cuenta:</strong><span class="badge badge-warning">Cuenta Abierta</span></h6>
                        @endif
                        @if($cuenta->estado_cuenta == 2)
                            <h6><strong>Estado de la Cuenta:</strong><span class="badge badge-success">Cuenta cancelada</span></h6>
                        @endif
                        @if($cuenta->estado_interes == 1)
                            <h6><strong>Estado de Mora:</strong><span class="badge badge-success">Cuenta al dia</span></h6>
                        @endif
                        @if($cuenta->estado_interes == 2)
                            <h6><strong>Estado de Mora:</strong><span class="badge badge-danger">Cuenta morosa</span></h6>
                        @endif
                        <h6><strong>Saldo en mora:</strong>L.{{$cuenta->total_intereses}}</h6>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($cuentas as $cuenta)
            <div class="col">
                <div class="card">
                    <div style="padding: 10px">
                        <h6 class="text-center text-gray-400" style="font-size: 20px"><strong>Informacion del Cliente y Articulo</strong></h6>
                        <h6 class="text-gray-500"><strong>*Informacion del cliente</strong></h6>
                        <h6><strong>Nombre:</strong> {{$cuenta->nombres}}</h6>
                        <h6><strong>Apellido:</strong> {{$cuenta->apellidos}}</h6>
                        <h6><strong>Identidad:</strong> {{$cuenta->identidad}}</h6>
                        <h6 class="text-gray-500"><strong>*Informacion del vehiculo</strong></h6>
                        <h6><strong>Marca:</strong> {{$cuenta->nombre}}</h6>
                        <h6><strong>Modelo:</strong> {{$cuenta->nombre_mod}}</h6>
                        <h6><strong>Chasis:</strong> {{$cuenta->chasis}}</h6>
                        <h6><strong>Motor:</strong> {{$cuenta->motor}}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row" style="margin-top: 10px">
        <div class="col-auto">
            <div class="card">
                <div style="padding: 10px">
                    <h6 class="text-center text-gray-400" style="font-size: 20px"><strong>Informacion del la cuenta</strong></h6>
                    <h6 class="text-gray-700"><strong>Fecha de inicio: </strong>{{$cuenta->fecha_salida}}</h6>
                    @if($cuenta->tipoventa_id == 1)
                        <h6 class="text-gray-700"><strong>Tipo de cuenta: </strong>Credito</h6>
                    @endif
                    @if($cuenta->tipoventa_id == 2)
                        <h6 class="text-gray-700"><strong>Tipo de cuenta: </strong>Contado</h6>
                    @endif
                    @if($cuenta->intervalo_pago == 0 && $cuenta->prima == 0)
                        <h6 class="text-gray-700"><strong>Tipo de cuenta: </strong>No tiene porque es de contado</h6>
                    @elseif($cuenta->intervalo_pago == 1)
                        <h6 class="text-gray-700"><strong>Tipo de cuenta: </strong>Mensual</h6>
                    @elseif($cuenta->intervalo_pago == 2)
                        <h6 class="text-gray-700"><strong>Tipo de cuenta: </strong>Quincenal</h6>
                    @endif
                    <h6 class="text-gray-700"><strong>Saldo Inicial: </strong>L. {{$cuenta->total_inicial_cuenta}}</h6>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card">
                <div style="padding: 10px">
                    <h6 class="text-center text-gray-400" style="font-size: 20px"><strong>Recibos</strong></h6>
                    <div>
                        @foreach($recibos as $recibo)
                            <div class="row">
                                <div class="col-auto">{{$recibo->fecha}}</div>
                                <div class="col-auto">
                                    <a href="">{{$recibo->cod_recibo}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


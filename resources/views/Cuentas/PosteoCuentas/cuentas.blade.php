@extends('Index.base')
@section('title', 'Posteo de Cuentas')
@section('content')
    <div class="container card">
        <div class="card-header" style="background-color: white">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    @include('Index.componentes.ButtonBack')
                </div>
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h4 class="text-center">
                        @foreach($info as $inf)
                            Cuenta de {{$inf->nombres}} {{$inf->apellidos}}
                        @endforeach
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row" style="padding: 5px">
                <div class="col card" >
                    <div class="card-body">
                        <h5 class="text-center">Informacion del cliente</h5>
                        @foreach($info as $inf)
                            <div class="row"><strong>Nombre Completo:</strong>{{$inf->nombres}} {{$inf->apellidos}}</div>
                            <div class="row"><strong>Identidad:</strong> {{$inf->identidad}}</div>
                            <div class="row"><strong>Correo Electronico:</strong></div>
                        @endforeach
                    </div>
                </div>
                <div class="col card" >
                    <div class="card-body">
                        <h5 class="text-center">Informacion del articulo</h5>
                        @foreach($info as $inf)
                            <div class="row"><strong>Marca:</strong>{{$inf->nombre}}</div>
                            <div class="row"><strong>Modelo:</strong>{{$inf->nombre_mod}}</div>
                            <div class="row"><strong>Color:</strong>{{$inf->color}}</div>
                        @endforeach
                    </div>
                </div>
                <div class="col card">
                    <div class="card-body">
                        <h5 class="text-center">Informacion de la cuenta</h5>
                        @foreach($info as $inf)

                            @if($inf->estado_interes == 1)
                                <div class="row"><strong>Mora:</strong>
                                    <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Esta Cuenta No Tiene Mora Pendiente">
                                        Al dia</span></div>
                            @elseif($inf->estado_interes == 2)
                                <div class="row"><strong>Mora:</strong>
                                    <span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Esta Cuenta Tiene Mora Pendiente. Cobrar">Mora</span></div>
                            @endif
                            @if($inf->estado_cuenta == 1)
                                <div class="row"><strong>Estado de la Cuenta:</strong>
                                    <span class="badge badge-warning" data-toggle="tooltip" data-placement="top"
                                    title="Bien significa que la cuenta aun no vence.">Bien</span>
                                </div>
                            @elseif($inf->estado_cuenta == 2)
                                <div class="row"><strong>Estado de la Cuenta:</strong><span class="badge badge-success">Cancelada</span></div>
                            @elseif($inf->estado_cuenta == 3)
                                <div class="row"><strong>Estado de la Cuenta:</strong><span class="badge badge-danger">Cuenta Vencida</span></div>
                            @endif
                            <div class="row"><strong>Codigo de la cuenta</strong>
                                <a target="_blank" data-toggle="tooltip" data-placement="top"
                                   title="Ver Cuenta del Cliente" href="/cuenta/{{$inf->cod_cuenta}}">{{$inf->cod_cuenta}}</a>
                            </div>
                            <div class="row"><strong>Descripcion:</strong>
                                {{$inf->descripcion}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row" style="padding: 5px">
                <div class="col-auto card">
                    <h6 class="text-center">Pagos Pendientes</h6>
                    <div style="overflow-y: scroll; height: 400px">
                        <table class="table table-bordered table table-hover " style="font-size: 11px;">
                            <thead>
                            <tr>
                                <th>Fecha Inicio Mora</th>
                                <th>Fecha de Abono</th>
                                <th>Fecha limite</th>
                                <th># de pago</th>
                                <th>Total a pagar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pagos as $pago)
                                <tr>
                                    <td>Cuota</td>
                                    <td>{{$pago->dia_pago}}</td>
                                    <td>{{$pago->dia_limite_pago}}</td>
                                    <td>{{$pago->descripcion}}</td>
                                    <td>L.{{$pago->cuota}}</td>
                                </tr>
                            @endforeach
                            @foreach($moras as $mora)
                                <tr>
                                    <td>{{$mora->fecha_inicio}}</td>
                                    <td>Mora - {{$mora->codigo}}</td>
                                    <td></td>
                                    <td>{{$mora->descripcion}}</td>
                                    <td>L.{{$mora->interes}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col card">
                    <h6 class="text-center">Posteo de la Cuenta</h6>
                    <form action="{{route('posteo.registrar')}}" method="post">
                        @csrf
                        <div style="overflow-y: scroll; height: 300px">
                            <table class="table table-sm table-bordered table-responsive-lg" style="font-size: 11px">
                                <thead>
                                <tr>
                                    <th>Cuenta</th>
                                    <th>Monto a Pagar</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="text" value="{{$cod}}" class="form-control" style="width: 120px" disabled></td>
                                    <input type="text" value="{{$cod}}" hidden name="CodigoCuenta">
                                    <td><input type="text" placeholder="1000" class="form-control" data-toggle="tooltip" data-placement="top"
                                               title="Pon la Cantidad que el Cliente va Abonar a la Cuenta" id="Posteo-Pago" style="width: 90px"></td>
                                    <input value="{{$cod}}" id="Posteo-CodigoCuenta" hidden>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary" onclick="CalcularPosteo()" >Distribuir</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" disabled
                                                title="Solicita Permiso para Cambiar la Distribucion de Pagos" id="Postear-Token">Token</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm table-bordered table-responsive-lg" style="font-size: 11px">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="4">Informacion de los pagos</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Tipo de Pago</th>
                                    <th>Descripcion</th>
                                    <th>Pendientes</th>
                                    <th>Pagara</th>
                                    <th>Saldo Final</th>
                                    <th>Aun hay</th>
                                </tr>
                                </thead>
                                <tbody id="TbodyTableCalularPagoPosteo">
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row" style="padding: 5px">
                            <div class="col-auto">
                                <input type="text" placeholder="token 12345" style="width: 130px" class="form-control"
                                       data-toggle="tooltip" data-placement="top" title="Ingresa el token que el supervisor te envio" disabled>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-outline-warning"
                                        data-toggle="tooltip" data-placement="top" title="Verifica el token para poder modificar el esquema de pago" disabled>Verifica Token</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#ModalPosteoVerificar"
                                        disabled id="Submit-Posteo">
                                    Registrar Pago
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="ModalPosteoVerificar" tabindex="-1" role="dialog" aria-labelledby="ModalPosteoVerificar" aria-hidden="true">
                            @include('Cuentas.PosteoCuentas.ModalVerificar')
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    {!! Html::script('js/Cuentas/Posteo.js') !!}
@endsection

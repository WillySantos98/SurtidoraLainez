@extends('Index.base')
@section('title', 'Documentos de Entradas')
@section('content')
    <div class="container-fluid">
        @include('Index.componentes.status')
        <h4 class="text-center">Seleccione el Tipo de Documento</h4>
        <br>

        <div class="d-flex justify-content-between">

            <a href="{{route('docEntrada.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Entradas de Motocicletas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$entradas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('salidas.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Salidas x Ventas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$salidas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('notificaciones.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Notificaciones Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$notificaciones}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('notificacion.gen')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Notificaciones Generadas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$notificaciones2}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>


        <div class="d-flex justify-content-between">
            <a href="{{route('transferencias_internas.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-warning shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transferencias Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_p}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('aceptadas.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-success shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transferencias</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_a}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('transferencia.rechazadas')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-danger shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Trans. Rechazadas x Supervisor</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_r}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('declinada.transferencia.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-danger shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Trans. Declinadas x Gerente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_declinadas}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{route('exitosas.transferencia.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-success shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transferencias Exitosas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_exitosas}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('transferencias_externas.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-warning shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transferencias Externas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transferencias_externas}}</div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <i class="fas fa-arrow-right text-gray-300"></i>
                            </div>
                            <div class="row">
                                <i class="fas fa-arrow-left text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('placas.pendientes')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Placas Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$placas_pendientes}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('permisos.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Generar Permisos Para Circular sin Placa</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <div class="d-flex justify-content-between">
            <a href="{{route('placasTransferencias')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Placas En Transferencia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$placas_transferencia}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('placas.aceptadas.sucursal')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transferencias Aceptadas por Suc.</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$placas_aceptadas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('placas.entrega')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Placas Entregadas a Clien.</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$placas_entregada}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$entradas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection

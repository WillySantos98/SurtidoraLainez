@extends('Index.base')
@section('title', 'Documentos de Entradas')
@section('content')
    <div class="container-fluid">
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

            <a href="{{route('salidas.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Notificaciones</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$salidas}}</div>
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
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transferencias Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_p}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('aceptadas.index')}}" class="nav-link" style="width: 24%">
                <div class="col card border-left-primary shadow py-2">
                    <div class="row">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transferencias I. Aceptadas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_a}}</div>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transferencias I. Rechazadas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trans_r}}</div>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Salidas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$salidas}}</div>
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

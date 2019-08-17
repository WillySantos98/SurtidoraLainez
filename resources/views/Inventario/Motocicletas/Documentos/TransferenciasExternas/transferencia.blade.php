@extends('Index.base')
@section('title', 'TransferenciasExterna')
@section('content')
    <div class="container-fluid">
        @foreach($transferencia as $trans)
            <div class="row">
                <div class="d-flex justify-content-start">
                    @include('Index.componentes.ButtonBack')
                </div>
                <div class="col">
                    <h4 class="text-center">Transferencia Externa {{$trans->cod_transferencia}}</h4>
                </div>
            </div>

            <div class="card border-left-primary " style="margin-top: 10px">
                @include('Inventario.Motocicletas.Documentos.TransferenciasExternas.datos')
            </div>
        @endforeach
            <hr>
        <div class="card border-left-primary">
            @include('Inventario.Motocicletas.Documentos.TransferenciasExternas.motos')
        </div>
            <hr>
        <div class="card border-left-primary">

            <div class="card shadow mb-4">
                <a href="#collapse-HistorialMotocicletas" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                    <h6 class="m-0 font-weight-bold text-primary">Historial que se ha realizado con esta transferencia</h6>
                </a>
                <div class="collapse" id="collapse-HistorialMotocicletas">
                    <div class="card-body">
                        <div STYLE="overflow-y: scroll; height: 160px">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Accion que se Realizo</th>
                                    <th>Fecha de la Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($historial as $histo)
                                    <tr>
                                        <td>{{$histo->usuario}}</td>
                                        <td>{{$histo->descripcion}}</td>
                                        <td>{{$histo->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

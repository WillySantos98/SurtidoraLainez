@extends('Index.base')
@section('title', 'Ficha de Motocicleta')
@section('content')
    <!-- <div class="container-fluid" style="overflow: auto; height: 570px"> -->
    <div class="container-fluid">
        @include('Index.componentes.status')
        <div class="d-flex justify-content-between">
            @include('Index.componentes.ButtonBack')
            </a>
            @foreach($DatosEncabezado as $info)
                <h3 class="text-center">Informacion de la Entrada {{$info->cod_entrada}}</h3>

            <div>
                <button class="btn btn-dark" data-toggle="modal" data-target="#ModalEditEntrada"
                        data-nombre="{{$info->cod_entrada}}"> <i data-feather="edit"></i></button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#ModalEntradaDocumentos"
                        data-nombre="{{$info->cod_entrada}}"> <i data-feather="file"></i></button>
            </div>
            @endforeach
        </div>
            <hr>

        <h5 class="text-center">Informacion Entrada</h5>
            @foreach($DatosEntrada as $info)
                @include('Inventario.Motocicletas.Documentos.Entradas.Tables.EncabezadoFicha')
            @endforeach

        <h5 class="text-center">Motocicletas de la Entrada</h5>
        @include('Inventario.Motocicletas.Documentos.Entradas.Tables.CuerpoFicha')

        <hr>

        <div class="card shadow mb-4">
            <a href="#collapse-HistorialMotocicletas" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                <h6 class="m-0 font-weight-bold text-primary">Historial que se ha realizado con esta transferencia</h6>
            </a>
            <div class="collapse" id="collapse-HistorialMotocicletas">
                <div class="card-body">
                    <div STYLE="overflow-y: scroll; height: 250px">
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
                                @foreach($DatosEncabezado as $info)
                                    @if($histo->codigo == $info->cod_entrada)
                                        <tr>
                                            <td>{{$histo->usuario}}</td>
                                            <td>{{$histo->descripcion}} {{$histo->codigo}}</td>
                                            <td>{{$histo->created_at}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="ModalEntradaDocumentos" tabindex="-1" role="dialog" aria-labelledby="ModalEntradaDocumentosDocumentos" aria-hidden="true">
        @include('Inventario.Motocicletas.Modals.ModalEntradaDocumentos')
    </div>
    <div class="modal fade" id="ModalEditEntrada" tabindex="-1" role="dialog" aria-labelledby="ModalEditEntrada" aria-hidden="true">
        @include('Inventario.Motocicletas.Documentos.Entradas.ModalEditEntrada')
    </div>
@endsection
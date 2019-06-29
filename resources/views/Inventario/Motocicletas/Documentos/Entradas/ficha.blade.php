@extends('Index.base')
@section('title', 'Ficha de Motocicleta')
@section('content')
    <!-- <div class="container-fluid" style="overflow: auto; height: 570px"> -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <a href="{{route('docEntrada.index')}}" class="btn btn-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"> Volver Atras</i>
            </a>
            @foreach($DatosEncabezado as $info)
                <h3 class="text-center">Informacion de la Entrada {{$info->cod_entrada}}</h3>

            <button class="btn btn-warning" data-toggle="modal" data-target="#ModalEntradaDocumentos"
                    data-nombre="{{$info->cod_entrada}}"> <i class="fa fa-file" aria-hidden="true"></i></button>
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

        <h4 class="text-center">Historial de la Motocicleta</h4>

        <div class="card shadow mb-4">
            <a href="#collapse-HistorialMotocicletas" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                <h6 class="m-0 font-weight-bold text-primary">Historial</h6>
            </a>
            <div class="collapse" id="collapse-HistorialMotocicletas">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="ModalEntradaDocumentos" tabindex="-1" role="dialog" aria-labelledby="ModalEntradaDocumentosDocumentos" aria-hidden="true">
        @include('Inventario.Motocicletas.Modals.ModalEntradaDocumentos')
    </div>
@endsection
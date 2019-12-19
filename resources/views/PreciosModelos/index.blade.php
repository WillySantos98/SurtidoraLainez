@extends('Index.base')
@section('title', 'Asignacion de Precios')
@section('content')
    <div class="container-fluid">
        <h4 class="text-center">Modelos Existentes</h4>
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalVerImpuestos">Impuestos</button>
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalVerGA">Gastos Administrativos</button>
            <input class="form-control w-25" id="myInput" type="text" placeholder="Buscar...">

        </div>
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="row" id="BodyContainer">
                @foreach($modelos as $modelo)
                    <div class="col-auto" style="margin-top: 10px">
                        <a href="/modelos/asignacion_precios/modelo/{{$modelo->nombre_mod}}" class="btn btn-outline-info" style="width: 140px; height: 140px">
                            <br>
                            <div class="row">
                                <div class="col">{{$modelo->proveedor}}</div>
                            </div>
                            <div class="row">
                                <div class="col">{{$modelo->marca}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><strong>{{$modelo->nombre_mod}}</strong></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="modal fade bd-example-modal-xl" id="ModalVerImpuestos" tabindex="-1" role="dialog" aria-labelledby="ModalVerImpuestos" aria-hidden="true">
        @include('PreciosModelos.Modals.ModalVerImpuestos')
    </div>
    <div class="modal fade bd-example-modal-xl" id="ModalVerGA" tabindex="-1" role="dialog" aria-labelledby="ModalVerGA" aria-hidden="true">
        @include('PreciosModelos.Modals.ModalVerGastosAdministrativos')
    </div>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#BodyContainer .col-auto").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection

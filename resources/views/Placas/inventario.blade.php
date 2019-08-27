@extends('Index.base')
@section('title', 'Inventario de Placas')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/css/uikit.min.css" />

    <div class="container-fluid">
        <div class="row">
            <div class="col">@include('Index.componentes.ButtonBack')</div>
            <div class="col"><h4 class="text-center">Inventario de Boletas/Placas</h4></div>
            <div class="col"><input class="form-control" id="myInput" type="text" placeholder="Buscar..."></div>
        </div>
        <div style="overflow-y: scroll; height: 550px">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th># Boleta</th>
                        <th># Placa</th>
                        <th>Chasis</th>
                        <th>Nombre del Cliente</th>
                        <th>Entregado</th>
                        <th>Estado Placa</th>
                        <th>Informacion</th>
                        <th>Ver Boleta</th>
                    </tr>
                </thead>
                <tbody id="bodyTable">
                @foreach($placas as $placa)
                    <tr>
                        <td>{{$placa->num_boleta}}</td>
                        <td style="color: green">{{$placa->num_placa}}</td>
                        <td>{{$placa->chasis}}</td>
                        <td>{{$placa->nombres}} {{$placa->apellidos}}</td>
                        <td>
                            @if($placa->estado == 1)
                                <span class="badge-warning">No</span>
                            @else($placa->estado ==2)
                                <span class="badge-success">Si</span>
                            @endif
                        </td>
                        @if($placa->estado_enlazo == 1)
                            <td><span class="badge-success">Recibida</span></td>
                        @else
                            <td><span class="badge-warning">No vino</span></td>
                        @endif
                        <td><button uk-toggle="target: #ModalInfoPlaca" value="{{$placa->num_boleta}}" class="btn btn-outline-success" onclick="InfoPlaca(this.value)">Ver info</button></td>
                        <td><a href="/placas/boleta/{{$placa->num_boleta}}">Ver Boleta</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div id="ModalInfoPlaca" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h2 class="uk-modal-title">Informacion Resumida</h2>
            <div id="CuerpoModalInfoPlaca">

            </div>
        </div>
    </div>

    <!-- UIkit JS -->
    @include('Index.componentes.buscador')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit-icons.min.js"></script>

@endsection

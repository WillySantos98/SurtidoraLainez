@extends('Index.base')
@section('title', 'Placas en Transferencia')
@section('content')
    <div class="row">
        <div class="col">@include('Index.componentes.ButtonBack')</div>
        <div class="col"><h4 class="text-center">Transferencias Aceptadas por Sucursal</h4></div>
        <div class="col"><input class="form-control" id="myInput" type="text" placeholder="Buscar..."></div>
    </div>
    <div style="overflow-y: scroll; height: 70%; margin-top: 20px">
        <table class="table table-sm table-hover table-responsive-xl">
            <thead>
            <tr>
                <th>Cod.</th>
                <th>Almacen de Origen</th>
                <th>Almacen de Destino</th>
                <th>lote</th>
            </tr>
            </thead>
            <tbody>
                @foreach($placas as $placa)
                    <tr>
                        <td>{{$placa->cod_transferencia}}</td>
                        <td>{{$placa->nombre}}</td>
                        @foreach($placas_final as $placa_f)
                            @if($placa->cod_transferencia == $placa_f->cod_transferencia)
                                <td>{{$placa_f->nombre}}</td>
                            @endif
                        @endforeach
                        <td>
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalLotePlacas" value="{{$placa->id}}" onclick="LotesPlacas2(this.value)">Ver Lote</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('Placas.Modals.ModalLotePlacas')
@endsection

@extends('Index.base')
@section('title', 'Transferencia de Placas')
@section('content')
    <div class="container-fluid">
        <h4 class="text-center">Formulario de Transferencia de Boletas/Placas</h4>
        <form action="{{route('placas.transferencia.save')}}" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Almacen de Origen</label>
                        <select name="SelectAlmacenOrigen"  required class="form-control" id="SelectAlmacenOrigenFormTransPlacas" onchange="cargarSucursales(this.value)">
                            <option value="">Seleccione una opcion</option>
                            @foreach($almacenes as $alm)
                                <option value="{{$alm->id}}">{{$alm->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Almacen de Destino</label>
                        <select name="SelectAlmacenDestino" id="SelectAlmacenDestinoFormTransPlacas" class="form-control" required onchange="cargarPlacasSucursal(this.value)"></select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Usuario Responsable</label>
                        <input type="text" class="form-control" value="{{Auth::user()->usuario}}" readonly>
                        <input type="text" name="InputIdUsuario" value="{{Auth::user()->id}}" hidden>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card" style="height: 330px">
                        <h6>Boletas/Placas para transferir de la sucursal de origen</h6>
                        <hr>
                        <div style="overflow-y: scroll;height: 260px">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th style="font-size: 12px">BOLETA</th>
                                    <th style="font-size: 12px">PLACA</th>
                                    <th style="font-size: 12px">CHASIS</th>
                                    <th style="font-size: 12px">EST. PLACA</th>
                                    <th style="font-size: 12px">INFO.</th>
                                    <th style="font-size: 12px">ADD</th>
                                </tr>
                                </thead>
                                <tbody id="CuerpoFormularioPlacasCard1">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="height: 330px">
                        <h6>Boletas/Placas que se van a transferir a sucursal de destino</h6>
                        <hr>
                        <div style="overflow-y: scroll;height: 260px">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th style="font-size: 12px">BOLETA</th>
                                    <th style="font-size: 12px">PLACA</th>
                                    <th style="font-size: 12px">CHASIS</th>
                                    <th style="font-size: 12px">EST. PLACA</th>
                                    <th style="font-size: 12px">DELETE</th>
                                </tr>
                                </thead>
                                <tbody id="CuerpoFormularioPlacasCard2">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="ModalVerInfoFromTrans" tabindex="-1" role="dialog" aria-labelledby="ModalVerInfoFromTrans" aria-hidden="true">
        @include('Placas.Modals.ModalVerInfoBoleta')
    </div>
@endsection

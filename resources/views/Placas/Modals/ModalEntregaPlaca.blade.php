
<div class="modal fade" id="ModalEntregaPlaca" tabindex="-1" role="dialog" aria-labelledby="ModalEntregaPlaca" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formato de Entrega de Placas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($boleta as $bol)
                <div class="row">
                    <div class="col">
                        <strong>Boleta: {{$bol->num_boleta}}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>Placa: {{$bol->num_placa}}</strong>
                    </div>
                    <div class="col">
                       <strong>Vino Placa: </strong> @if($bol->estado_enlazo == 1) Si Vino Placa  @elseif($bol->estado_enlazo == 2) No Vino Placa @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>Pago de Matricula: {{$bol->precio_matricula}}</strong>
                    </div>
                    <div class="col">
                        <strong>Estado de Pago: @if($bol->estado_pago_matricula == 2) Pagado @else No Pagado @endif </strong>
                    </div>
                </div>
                @foreach($cliente as $cli)
                <div class="row">
                    <div class="col">Nombre Cliente: {{$cli->nombres}}  {{$cli->apellidos}}</div>
                </div>
                @endforeach
                @foreach($vehiculo as $veh)
                <div class="row">
                    <div class="col">Chasis: {{$veh->chasis}}</div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col">
                        <a href="/placas/documento_entrega/{{$bol->num_boleta}}" target="_blank">Crear documento de entrega</a>
                    </div>
                </div>
                @endforeach
                <div class="row" style="margin-top: 20px">
                    <form action="{{route('placas.entrega.save')}}" method="post"  enctype="multipart/form-data" id="FormEntregaPlaca" onchange="FormEntregaPlacas()">
                        @csrf
                        <div class="form-group">
                            @foreach($boleta as $bol)
                                @if($bol->estado_pago_matricula == 2)
                                    <label for="">Hizo Entrega</label>
                                    <input type="text" value="{{$bol->id}}" name="InputIdPlaca" hidden>
                                    <select name="SelectEntrega" class="form-control" id="FormEntregaPlaca-SelectEntrega">
                                        <option value="-">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="">Subir Documento</label>
                                        <input type="file" name="FileDocumento" id="FormEntregaPlaca-File" class="form-control">
                                    </div>
                                @else
                                    <strong>Tiene que pagar la matricula para poder hacer la entrega</strong>
                                @endif
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary" onclick="EnviarForm()" id="Boton-Submit-Form">Confirmar Entrega</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

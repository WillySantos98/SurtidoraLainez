<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Busqueda de Cotizacion Aprobadas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <div style="overflow-y: scroll; height: 550px">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <div class="p-2 bd-highlight">
                        <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
                    </div>
                </div>
                <table class="table table-sm table-hover" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Fecha Creacion</th>
                            <th>Nombre Completo</th>
                            <th>Modelo</th>
                            <th>Total </th>
                            <th>Cuota</th>
                            <th>Prima</th>
                            <th>Intervalo de Pago</th>
                            <th>Duracion del Credito</th>
                            <th>Cuota Final</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                        @foreach($cotizaciones as $cotizacion)
                            <tr>
                                <td>{{$cotizacion->cod_cotizacion}}</td>
                                <td>{{$cotizacion->fecha_creacion}}</td>
                                <td>{{$cotizacion->nombre_interesado}} {{$cotizacion->apellido_interesado}}</td>
                                <td>{{$cotizacion->nombre_mod}}</td>
                                <td>L.{{$cotizacion->total_pagar}}</td>
                                <td>L.{{$cotizacion->cuota}}</td>
                                <td>L.{{$cotizacion->prima}}</td>
                                <td>
                                    @if($cotizacion->intervalo_tiempo_pago == 1)
                                        Mensual
                                    @elseif($cotizacion->intervalo_tiempo_pago == 2)
                                        Quincenal
                                    @else
                                        No tiene, precio de contado
                                    @endif
                                </td>
                                <td>{{$cotizacion->meses}} meses</td>
                                <td>
                                    @if($cotizacion->intervalo_tiempo_pago == 0 && $cotizacion->prima == 0 && $cotizacion->meses == 0)
                                        Precio de Contado
                                    @else
                                        L.{{$cotizacion->cuota/$cotizacion->intervalo_tiempo_pago}}
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-outline-success" type="button" data-dismiss="modal" value="{{$cotizacion->total_pagar}}.{{$cotizacion->prima}}.{{$cotizacion->meses}}.{{$cotizacion->intervalo_tiempo_pago}}.{{$cotizacion->cuota}}.{{$cotizacion->precio_contado}}"
                                     onclick="AddCotizacion(this.value)">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('Index.componentes.buscador')

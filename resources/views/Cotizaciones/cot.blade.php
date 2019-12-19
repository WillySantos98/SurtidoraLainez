<div class="row" style="padding: 5px">
    <div class="col ">
        <div class="card border-left-warning">
            <div class="row" x>
                <div class="col"><h5 class="text-center text-gray-400"><strong>Informacion del cliente</strong></h5></div>
            </div>
            <div class="row">
                <div class="col"><strong>Nombre: </strong>{{$cotizacion->nombre_interesado}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>Apellido: </strong>{{$cotizacion->apellido_interesado}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>Identificacion: </strong>{{$cotizacion->identificacion_interesado}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>Telefono: </strong>{{$cotizacion->telefono}}</div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-left-info">
            <div class="row"><div class="col"><h5 class="text-center text-gray-400"><strong>Informacion del Vehiculo</strong></h5></div></div>
            <div class="row"><div class="col"><strong>Marcas: </strong>{{$cotizacion->nombre}}</div></div>
            <div class="row"><div class="col"><strong>Modelo: </strong>{{$cotizacion->nombre_mod}}</div></div>
            <div class="row"><div class="col"><strong>Tipo de Vehiculo: </strong>{{$cotizacion->nombre_v}}</div></div>
            <div class="row"><div class="col"><strong>Ruedas: </strong>{{$cotizacion->ruedas}}</div></div>
        </div>
    </div>
</div>

<div class="row" style="padding: 5px">
    <div class="col">
        <div class="card border-left-primary">
            <div class="row">
                <div class="col"><h5 class="text-center text-gray-400"><strong>Informacion del Colaborador</strong></h5></div>
            </div>
            <div class="row">
                <div class="col"><strong>Nombre Completo: </strong>{{$cotizacion->nombre_col}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>Cargo: </strong>{{$cotizacion->nombre_col_t}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>Sucursal Asignada: </strong>{{$cotizacion->nombre_suc}}</div>
            </div>
            <div class="row">
                <div class="col"><strong>Telefono: </strong>{{$cotizacion->telefono}}</div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-left-success">
            <div class="row"><div class="col"><h5 class="text-center text-gray-400"><strong>Informacion de la Cotizacion</strong></h5></div></div>
            <div class="row"><div class="col"><strong>Fecha de Cracion: </strong>{{$cotizacion->fecha_creacion}}</div></div>
            <div class="row"><div class="col"><strong>Fecha de Cierre: </strong>{{$cotizacion->fecha_cierre}}</div></div>
            <div class="row"><div class="col"><strong>Veces Contactado: </strong>{{$cotizacion->veces_contactado}}</div></div>
            <div class="row"><div class="col"><strong>Estado: </strong>
                    @if($cotizacion->estado == 1 )
                        <span class="badge badge-warning">En Siguimiento</span>
                    @elseif($cotizacion->estado == 2 )
                        <span class="badge badge-danger">Cerrado</span>
                    @endif
                    @if($cotizacion->estado_condicion == 2)
                        <span class="badge badge-danger">Pendiente para realizar venta</span>
                    @elseif($cotizacion->estado_condicion == 3)
                        <span class="badge badge-success">Aceptada por facturacion</span>
                    @elseif($cotizacion->estado_condicion == 4)
                        <span class="badge badge-danger">Declinada por Facturacion</span>
                    @endif
                </div></div>
        </div>
    </div>
</div>
<div class="row" style="padding: 5px">
    <div class="col">
        <div class="card border-left-danger">
            <div class="row"><div class="col"><h5 class="text-center text-gray-400"><strong>Informacion del Precio</strong></h5></div></div>
            <div class="row"><div class="col"><strong>Tipo de Cotizacion: </strong>
                    @if($cotizacion->intervalo_tiempo_pago == 0 && $cotizacion->prima == 0 && $cotizacion->meses == 0)
                        Contado
                    @else
                        Credito
                    @endif
                </div></div>
            <div class="row"><div class="col"><strong>Precio del Vehiculo: </strong>L.{{$cotizacion->total_pagar}}</div></div>
            <div class="row"><div class="col"><strong>Prima: </strong>L.{{$cotizacion->prima}}</div></div>
            <div class="row"><div class="col"><strong>Meses del Credito: </strong>{{$cotizacion->meses}}</div></div>
            <div class="row"><div class="col"><strong>Cuota Mensual: </strong>L.{{$cotizacion->cuota}}</div></div>
            <div class="row"><div class="col"><strong>Intervalo de Pago: </strong>
                    @if($cotizacion->intervalo_tiempo_pago == 1)
                        Mensual
                    @elseif($cotizacion->intervalo_tiempo_pago == 2)
                        Quincenal
                    @else
                        No tiene, porque se cotizo en precio de contado
                    @endif
                </div></div>
            <div class="row"><div class="col"><strong>Cuota Final: </strong>
                    @if($cotizacion->intervalo_tiempo_pago == 0 && $cotizacion->prima == 0 && $cotizacion->meses == 0)
                        Precio de Contado
                    @else
                        {{$cotizacion->cuota/$cotizacion->intervalo_tiempo_pago}}
                    @endif
                </div></div>
        </div>
    </div>
</div>

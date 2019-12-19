<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#ModalBuscarCliente"
                > <i class="fa fa-address-book" aria-hidden="true"> Buscar Cliente</i></button>
            </div>
            <div class="col">
                <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#ModalBuscarMoto">
                    <i class="fa fa-motorcycle" aria-hidden="true" id="FormSalidaVenta-ModalMotocicletas"> Buscar Vehiculo</i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="card border-left-success">
                    <div class="row"><div class="col"><h6 class="text-center text-gray-400">Datos del Cliente</h6></div></div>
                    <div class="row">
                        <div class="col-auto"><strong>Nombres:</strong></div>
                        <div class="col-auto" id="InputNombres"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Apellidos:</strong></div>
                        <div class="col-auto" id="InputApellidos"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Identidad</strong></div>
                        <div class="col-auto" id="InputIdentidad"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>RTN:</strong></div>
                        <div class="col-auto" id="InputRtn"></div>
                    </div>
                    <div class="row">
                        <div class="col" id="InputId"></div>
                    </div>
                </div>
                <div class="card border-left-warning">
                    <div class="row"><div class="col"><h6 class="text-center text-gray-400">Datos del Vehiculo</h6></div></div>
                    <div class="row">
                        <div class="col-auto"><strong>Codigo:</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Proveedor:</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Marca:</strong></div>
                        <div class="col-auto" id="InputMarca"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Modelo:</strong></div>
                        <div class="col-auto" id="InputModelo"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Chasis:</strong></div>
                        <div class="col-auto" id="InputChasis"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Motor:</strong></div>
                        <div class="col-auto" id="InputMotor"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Color:</strong></div>
                        <div class="col-auto" id="InputColor"></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Año:</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><strong>Tipo de vehiculo:</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-auto" id="InputIdMoto"></div>
                        <div class="col-auto">
                            <input type="text" name="Usuario" value="{{Auth::user()->id}}" hidden>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="Formcliente-Oculto-Total" hidden name="TotalCuenta"> {{-- este es el campo del total de la cuenta --}}
    <input type="text" id="Formcliente-Oculto-Prima" hidden name="Prima"> {{-- este es el campo de la prima--}}
    <input type="text" id="Formcliente-Oculto-Cuota" hidden name="Cuota">
    <input type="text" name="SaldoFinanciado" id="Formcliente-Oculto-Financiado" hidden> {{-- este es el campo del saldo financiado--}}
    <input type="text" id="Formcliente-Oculto-Intervalo" name="Intervalo" hidden>  {{-- aca esta el campo intervalo--}}
    <input type="text" id="Formcliente-Oculto-Meses" hidden name="Plazo"> {{-- aca esta el campo de plazo--}}
    <div class="col " >
        <div class="row" ><div class="col">
            <button class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#ModalBuscarCotizacion">
                <i class="fa fa-history" aria-hidden="true"></i> Buscar Cotización</button>
        </div></div>
        <hr>
        <div class="row card border-left-info" id="BodyInformacionPagos"style=" overflow-y:scroll;height: 369px">
            <div class="col" style="font-size: 12px">
                <div class="row">
                    <div class="col"><strong id="FormCliente-Precio">*Precio:</strong></div>
                    <div class="col"><strong id="FormCliente-Prima">*Prima:</strong></div>
                    <div class="col"><strong id="FormCliente-Cuota">*Cuota:</strong></div>
                </div>
                <div class="row">
                    <div class="col"><strong id="FormCliente-IP">*Intervalo Pago:</strong></div>
                    <div class="col"><strong id="FormCliente-Duracion">*Duracion:</strong></div>
                    <div class="col"><strong id="FormCliente-PrecioFinanciado">*Precio financi.:</strong></div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-auto"><label for=""><strong>*Dias de pago:</strong></label></div>
                        <div class="col-auto">
                            <input type="number" class="form-control" disabled id="DiasPago" name="DiasPago" style="height: 20px; width: 80px">
                        </div>
                        <div class="col-auto"><label for=""><strong>*Dias de gracia:</strong></label></div>
                        <div class="col-auto">
                            <input type="number" class="form-control" disabled value="0" name="DiasGracia" id="DiasGracia" style="height: 20px; width: 80px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <label for=""><strong>*Fecha de 1er pago:</strong></label>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" disabled name="PrimerPago" id="FechaPrimerPago" style="height: 20px">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <button class="btn btn-outline-info" id="BtnCalcularPagos" disabled type="button" onclick="calcularPagos()" style="height: 30px; font-size: 12px">Calcular Pagos</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 8px">
                    <div class="col">
                        <h6 class="text-center text-gray-400">Cuadro de Fechas de Pago</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-hover table-sm" style="font-size: 12px" >
                            <thead>
                                <tr>
                                    <th># Pago</th>
                                    <th>Fecha</th>
                                    <th>Saldo Inicial</th>
                                    <th>Cuota</th>
                                    <th>Saldo Final</th>
                                </tr>
                            </thead>
                            <tbody id="DesglocePagos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <label for="">Observacion</label>
    <input type="text" name="Observacion" value="Venta sin ningun inconveniente" class="form-control">
</div>

<button type="submit" class="btn btn-outline-primary" id="Boton-Submit-Form">Registrar Venta</button>


<div class="modal fade bd-example-modal-xl" id="ModalBuscarCliente" tabindex="-1" role="dialog" aria-labelledby="ModalBuscarCliente" aria-hidden="true">
    @include('Inventario.Motocicletas.Salidas.Modals.ModalBuscarCliente')
</div>

<div class="modal fade bd-example-modal-xl" id="ModalBuscarMoto" tabindex="-1" role="dialog" aria-labelledby="ModalBuscarMoto" aria-hidden="true">
    @include('Inventario.Motocicletas.Salidas.Modals.ModalBuscarMoto')
</div>

<div class="modal fade bd-example-modal-xl" id="ModalBuscarCotizacion" tabindex="-1" role="dialog" aria-labelledby="ModalBuscarCotizacion" aria-hidden="true">
    @include('Inventario.Motocicletas.Salidas.Modals.ModalBuscarCotizacion')
</div>

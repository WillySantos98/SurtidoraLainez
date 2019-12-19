<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Añadiendo nueva acción al reporte {{$cod}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="row">
                    <div class="col">
                        <input type="text" value="{{$cod}}" hidden id="Input-CodigoReporte">
                        <div class="form-group">
                            <label for="">Forma de Contactado</label>
                            <select name="SelectContactado" id="SelectContactado" class="form-control form-control-sm">
                                <option value="0">Seleccione una opcion</option>
                                <option value="1">Mensaje</option>
                                <option value="2">Correo Electronico</option>
                                <option value="3">Llamada</option>
                                <option value="4">Visita</option>
                                <option value="5">WhatsApp</option>
                                <option value="6">Otras</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Usuario</label>
                        <input type="text" disabled value="{{Auth::user()->usuario}}" class="form-control form-control-sm">
                    </div>
                    <div class="col">
                        <label for="">Resultado de Accion</label>
                        <select name="SelectResultado" id="SelectResultadoAccion" class="form-control form-control-sm">
                            <option value="0">Seleccione una opcion</option>
                            <option value="1">Exitoso</option>
                            <option value="2">Sin Exito</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Observaciones Rapidas</label>
                            <select name="" id="SelectObservacionesRapidas" class="form-control form-control-sm" >
                                <option value="0">Sin seleccionar</option>
                                <option value="1">Se logro contactar al cliente, y se le informo sobre su estado de cuenta y dio promesa de pago.</option>
                                <option value="2">Se logro contactar al cliente, y se le informo sobre su estado de cuenta pero no se llego a un acuerdo con alguna forma de pago.</option>
                                <option value="3">Se logro contactar al cliente por llamada, y se le informo sobre su estado de cuenta pero el cliente corto la llamada.</option>
                                <option value="4">Se logro contactar al cliente por visita, y dio promesa de pago.</option>
                                <option value="5">Se logro contactar al cliente por visita, y no se le encontro.</option>
                                <option value="6">No se logro contactar al cliente,</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Observacion</label>
                            <textarea name="Observacion" id="ObservacionAccionReporte" class="form-control form-control-sm" cols="30" rows="5"></textarea>
                            <span>Colocar todo referente a la accion que se realizo para tratar de avisar al cliente sobre el estado de su cuenta</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6 class="text-center">Promesa de Pago</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-success" disabled id="Btn-AddPromesadePago">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row" id="CuerpoAddPromesaPago">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="LimpiarModa()" >Limpiar Modal</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="LimpiarModa()">Cerrar</button>
            <button type="button" class="btn btn-primary" id="Btn-AddAccionReporte">Guardar Accion</button>
        </div>
    </div>
</div>

<h4 class="text-center">Asignacion de Precio</h4>
<div class="card">
    <form action="">
        <div style="padding: 5px">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Intervalo de Pago</label>
                        <select name="" id="SelectIntervaloPagoAsignacion" class="form-control">
                            <option value="0">Selecciona un Intervalo de Pago</option>
                            <option value="0">Venta al Contado</option>
                            <option value="1">Mensual</option>
                            <option value="2">Quincenal</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Plazo en Meses</label>
                        <input type="number" id="CampoPlazoAsignacion" class="form-control" value="0">
                        <span>Si es al Contado dejarlo en 0.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Saldo Inicial</label>
                        <input type="text" class="form-control" id="CampoSaldoInicialAsignacion" value="0">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Prima</label>
                        <input type="text" class="form-control" id="CampoPrimaAsignacion" value="0">
                        <span>Si es al contado dejar en 0.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="CampoFechaAsignacion">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Dias de Pago</label>
                        <input type="number" class="form-control" value="0" id="CampoDiasPagoAsignacion">
                        <span>Si es al contado deje en 0</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-warning btn-sm" style="margin-right: 5px" id="RegistrarCuenta">Registrar Precio Inicial</button>
                        <button type="button" class="btn btn-outline-success btn-sm" id="BotonAsignarSeccion3" onclick="SeccionHabilitar(3)" disabled>Siguiente paso</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

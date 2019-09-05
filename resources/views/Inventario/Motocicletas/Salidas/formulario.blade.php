<div class="row">
    <div class="col">
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalBuscarCliente"
                > <i class="fa fa-address-book" aria-hidden="true"> Buscar Cliente</i></button>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Nombres</label>
            <div id="InputNombres">
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Apellidos</label>
            <div id="InputApellidos">
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Identidad</label>
            <div id="InputIdentidad">
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Rtn</label>
            <div id="InputRtn">
                <input type="text" class="form-control" readonly>
            </div>
            <div id="InputId">

            </div>
        </div>
    </div>

    <div class="col">
        <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#ModalBuscarMoto">
            <i class="fa fa-motorcycle" aria-hidden="true"> Buscar Motocicleta</i></button>

        <div class="form-group" style="margin-top: 16px">
            <label for="">Modelo Completo</label>
            <div id="InputMarca">
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Chasis</label>
            <div id="InputChasis">
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Motor</label>
            <div id="InputMotor">
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group" style="margin-top: 16px">
            <label for="">Color</label>
            <div id="InputColor">
                <input type="text" class="form-control" readonly>
            </div>
            <div id="InputIdMoto">
            </div>
            <input type="text" name="Usuario" value="{{Auth::user()->id}}" hidden>
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

<form id="FormCliente" action="{{route('cliente.save')}}" method="post" enctype="multipart/form-data"  >
    {{ csrf_field() }}
    <h4 class="text-center">Datos Personales</h4>
    <div class="row">
        <div class="col">
            <label for="NombresCliente">Nombres del Cliente</label>
            <input type="text" class="form-control" required id="FormCliente-NombresCliente" name="NombresCliente"  placeholder="Nombres del cliente">
        </div>
        <div class="col">
            <label for="ApellidosCliente">Apellidos del Cliente</label>
            <input type="text" class="form-control" required id="FormCliente-ApellidosCliente" name="ApellidosCliente"  placeholder="Apellidos del cliente">
        </div>
        <div class="col">
            <label for="IdentidadCliente">Numero de Identidad del Cliente</label>
            <input type="text" class="form-control" required id="FormCliente-IdentidadCliente" name="IdentidadCliente" placeholder="Numero de identidad" maxlength="13">
        </div>
        <div class="col">
            <label for="RtnCliente">Rtn del Cliente</label>
            <input type="text" class="form-control"  name="RtnCliente" placeholder="Rtn del cliente" maxlength="14">
        </div>
    </div>
    <div style="margin-top: 40px">
        <div class="row">
            <div class="col" style="overflow-y: scroll; height: 250px">
                @include('Clientes.formularios.FormularioRegistroClienteTelefono')
            </div>
            <div class="col" style="overflow-y: scroll; height: 250px">
                @include('Clientes.formularios.FormularioRegistroClienteDireccion')
            </div>
            <div class="col" style="overflow-y: scroll; height: 250px">
                @include('Clientes.formularios.FormularioRegistroClienteDocumentos')
            </div>
        </div>
    </div>
    <hr>
    <div class="row" >
        <button type="submit"  onclick="DesabilitarInput()" id="Boton-Submit-Form"  class="btn btn-primary ">Registrar Cliente</button>
    </div>
</form>

<div class="modal fade bd-example-modal-sm" id="ModalVerificacion" tabindex="-1" role="dialog" aria-labelledby="ModalVerificacion" aria-hidden="true">
    @include('Clientes.Modals.ModalRtn')
</div>



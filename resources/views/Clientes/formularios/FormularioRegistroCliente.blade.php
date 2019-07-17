<form id="FormAdd" action="{{route('cliente.save')}}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-center">Datos Personales</h3>
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="NombresCliente">Nombres del Cliente</label>
                        <input type="text" class="form-control" required id="NombresCliente" name="NombresCliente" placeholder="Nombres del cliente">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ApellidosCliente">Apellidos del Cliente</label>
                        <input type="text" class="form-control" required id="ApellidosCliente" name="ApellidosCliente" placeholder="Apellidos del cliente">
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="IdentidadCliente">Numero de Identidad del Cliente</label>
                        <input type="text" class="form-control" required id="IdentidadCliente" name="IdentidadCliente" placeholder="Numero de identidad">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="RtnCliente">Rtn del Cliente</label>
                        <input type="text" class="form-control" id="RtnCliente" name="RtnCliente" placeholder="Rtn del cliente">
                    </div>
                </div>
        </div>
        <div class="col-md-4" style="overflow-y: scroll; height: 250px">
            @include('Clientes.formularios.FormularioRegistroClienteDocumentos')
        </div>
    </div>
    <div class="row">
        <div class="col-md-7" style="overflow-y: scroll; height: 250px">
            @include('Clientes.formularios.FormularioRegistroClienteDireccion')
        </div>
        <div class="col" style="overflow-y: scroll; height: 250px">
            @include('Clientes.formularios.FormularioRegistroClienteTelefono')
        </div>
    </div>

    <input type="submit"  class="btn btn-primary" value="Guardar Cliente" >
</form>
<hr>

{{--<div class="modal fade bd-example-modal-sm" id="ModalVerificacion" tabindex="-1" role="dialog" aria-labelledby="ModalVerificacion" aria-hidden="true">--}}
{{--    @include('Clientes.Modals.ModalRtn')--}}
{{--</div>--}}


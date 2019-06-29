<div style="overflow-y: scroll; height: 600px">
    <form id="FormAdd" action="{{route('cliente.save')}}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <h3 class="text-center">Datos Personales</h3>
        <div class="d-flex justify-content-center">
            <div class="form-group w-25">
                <label for="Nombres">Nombre Completo</label>
                <input type="text" class="form-control" required id="Nombres" name="Nombres" placeholder="Nombres del cliente">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-group w-25">
                <label for="Identidad">Numero de Identidad del Aval</label>
                <input type="text" class="form-control" required id="Identidad" name="Identidad" placeholder="Numero de identidad">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-group w-25">
                <label>Telefonos</label>
                <button type="button" id="BtnRegistroTelefono" href=""  class="btn btn-info">
                    <i data-feather="plus"></i>
                </button>
                <table id="TableTelefono">
                    <tr>
                        <td>
                            <div class="d-flex justify-content-start">
                                <input type="tel" class="form-control w-100" id="RowTelefono" required name="TelefonosClientes[]" placeholder="99999999">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-group w-25">
                <label for="DireccionesCliente">Direcciones</label>
                <button type="button" id="BtnRegistroDireccion" class="btn btn-info">
                    <i data-feather="plus"></i>
                </button>
                <table id="TableDirecciones" style="width: 95%" >
                    <tr>
                        <textarea class="form-control" required id="DireccionesCliente" name="DireccionesClientes[]" rows="3"></textarea>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-group w-25">
                <label for="Documentos">Documetos Escaneados</label>
                <button type="button" id="BtnFile" class="btn btn-info">
                    <i data-feather="plus"></i>
                </button>
                <table id="TableDocumentos">
                    <tr>
                        <input type="file" class="form-control w-100" name="Documentos[]">
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit"  class="btn btn-primary" value="Guardar Aval" >
        </div>
    </form>
</div>
<hr>



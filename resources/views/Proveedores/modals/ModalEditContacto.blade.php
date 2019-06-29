<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('save.contacto.edit')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre del Proveedor</label>
                            <input type="text" id="NombreProveedor" disabled name="NombreProveedor" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Nombre del Contacto</label>
                        <input type="text" name="NombreContacto" readonly id="NombreContacto" class="form-control" required>
                        <input type="text" id="Id" hidden name="Id" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono del Contacto</label>
                            <input type="tel" required name="Telefono" id="Telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Correo del Contacto</label>
                        <input type="email" required name="Correo" id="Correo" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Función del Contacto</label>
                            <input type="text" name="Funcion" id="Funcion" required class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Estado </label>
                            <select name="SelectEstado" class="form-control" id="">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>
        </div>

    </div>
</div>


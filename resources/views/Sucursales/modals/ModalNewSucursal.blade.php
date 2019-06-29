<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva Sucursal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('sucursal.save')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre de la Sucursal</label>
                            <input type="text" name="NombreSucursal" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Abreviatura de la Sucursal</label>
                        <input type="text" name="Slug" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="tel" required name="Telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Correo</label>
                        <input type="email" required name="Correo" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Direccion completa</label>
                            <input type="text" name="Direccion" required class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <input type="submit" value="Guardar" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>
        </div>

    </div>
</div>
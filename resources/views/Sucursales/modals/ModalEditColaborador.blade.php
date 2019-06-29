<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('save.colaborador.edit')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Nombre del Colaborador</label>
                    <input type="text" class="form-control" name="Nombre"  id="Nombre" required>
                    <input type="text" class="form-control" name="Id" hidden id="Id" required>
                </div>
                <div class="form-group">
                    <label for="">Correo Electronico</label>
                    <input type="text" class="form-control" name="Correo" id="Correo" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" required name="Telefono" id="Telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Estado</label>
                            <select name="SelectEstado" class="form-control" id="">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary"  value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#ModalEditColaborador').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nombre = button.data('nombre');
        var correo = button.data('email');
        var telefono = button.data('telefono');
        var modal = $(this);
        modal.find('.modal-body #Nombre').val(nombre);
        modal.find('.modal-body #Id').val(id);
        modal.find('.modal-body #Correo').val(correo);
        modal.find('.modal-body #Telefono').val(telefono);
        modal.find('.modal-header #titulo').html("Editando el Colaborador "+nombre);
    });
</script>

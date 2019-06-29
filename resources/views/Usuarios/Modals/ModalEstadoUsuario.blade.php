<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Modal de Estado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="form-group">
                    <label for="">Seleccione Estado</label>
                    <input type="text" id="Id" >
                    <select name="SelectEstado" class="form-control" id="Estado">
                        <option value="2">-----</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivos</option>
                    </select>
                </div>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
<script>
    $('#ModalUsuarioEstado').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-body #Id').val(id);
    });
</script>

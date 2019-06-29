<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('save.rtn')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Rtn del Cliente</label>
                            <input type="text" id="Id"  hidden name="Id" class="form-control" required>
                            <input type="text" id="Rtn" name="Rtn" class="form-control" required>
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
<script>
    $('#ModalRtn').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nombre = button.data('nombre');
        var rtn = button.data('rtn');
        var modal = $(this);
        modal.find('.modal-body #Id').val(id);
        modal.find('.modal-body #Rtn').val(rtn);
        modal.find('.modal-header #titulo').html("Editando Rtn de "+nombre);
    });
</script>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('edit_num_factura')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Numero de Factura</label>
                    <input type="text" id="InputFactura" name="Factura" class="form-control" required>
                    <input type="text" id="InputCod" hidden name="InputCod">
                    <input type="text" id="InputId" hidden name="InputId">
                </div>
                <div class="form-group">
                    <input type="submit"  class="btn btn-outline-primary" value="Registrar Cambio">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $('#ModalEditNumFactura').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var cod = button.data('cod');
        var id = button.data('id');
        var venta = button.data('num');
        var modal = $(this);
        modal.find('.modal-header #titulo').html("Venta "+cod);
        modal.find('.modal-body #InputCod').val(cod);
        modal.find('.modal-body #InputId').val(id);
        modal.find('.modal-body #InputFactura').val(venta)
    });
</script>

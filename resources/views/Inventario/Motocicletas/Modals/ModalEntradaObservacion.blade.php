<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Modal de Observaciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <textarea name="Observacion" id="Observacion" cols="25" rows="10"></textarea>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
<script>
    $('#ModalEntradaObservacion').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var nombre = button.data('nombre');
        var modal = $(this);
        modal.find('.modal-body #Observacion').val(nombre);
    });
</script>
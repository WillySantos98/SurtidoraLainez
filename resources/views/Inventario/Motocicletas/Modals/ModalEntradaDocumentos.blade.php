<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            @include('Inventario.Motocicletas.Componentes.GaleriaEntradaDocumentos')
        </div>
    </div>
</div>
<script>
    $('#ModalEntradaDocumentos').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var nombre = button.data('nombre');
        var modal = $(this);
        modal.find('.modal-header #titulo').html("Documentos del numero de entrada "+nombre);
    });
</script>

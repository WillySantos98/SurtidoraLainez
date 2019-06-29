<div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Generando Notificaciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('generacion.notificacion')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <span>Seleccion la fecha que se registre en la</span>
                    <span>generacion de la Notificacion</span>
                    <input name="Id" type="text" id="Id" class="form-control" hidden>
                    <input name="Fecha" type="date" required class="form-control" >
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-outline-primary" value="Generar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#ModalGeneracionNotificacion').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-body #Id').val(id);
    });

</script>
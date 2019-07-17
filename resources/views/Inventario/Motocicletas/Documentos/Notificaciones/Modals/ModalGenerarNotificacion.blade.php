<div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Generando Notificaciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post">
                <div class="form-group">
                    <span>Seleccion la fecha que se registre en la</span>
                    <span>generacion de la Notificacion</span>
                    <input name="Id" type="text" id="IdNotificacion" class="form-control" hidden>
                    <input name="Fecha" id="FechaNotificacion" type="date" required class="form-control" >
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-outline-primary" onclick="GenerarNotificacion()">Generar</button>
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
        modal.find('.modal-body #IdNotificacion').val(id);
    });

    function GenerarNotificacion() {
        var id =document.getElementById("IdNotificacion").value;
        var fecha = document.getElementById("FechaNotificacion").value;

        window.open('/inventario/motocicletas/notificaciones/generar/'+id+'/'+fecha, '_blank');
    }
</script>
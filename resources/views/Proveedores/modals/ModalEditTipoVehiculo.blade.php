<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('save.tipovehiculo.edit')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre del tipo de Vehiculo</label>
                            <input type="text" id="Nombre" name="Nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Cantidad de Ruedas</label>
                        <input type="number" name="Ruedas" id="Ruedas" class="form-control" required>
                        <input type="text" id="Id" hidden name="Id" class="form-control">
                    </div>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>
        </div>

    </div>
</div>
<script>
    $('#ModalEditTipoVehiculo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nombre = button.data('nombre');
        var ruedas = button.data('ruedas');
        var funcion = button.data('funcion');
        var modal = $(this);
        modal.find('.modal-body #Nombre').val(nombre);
        modal.find('.modal-body #Id').val(id);
        modal.find('.modal-body #Ruedas').val(ruedas);
        modal.find('.modal-body #Funcion').val(funcion);
        modal.find('.modal-header #titulo').html("Editando el Tipo de Vehiculo "+nombre);
    });
</script>
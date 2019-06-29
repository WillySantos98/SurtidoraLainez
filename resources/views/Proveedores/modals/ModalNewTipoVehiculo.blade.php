<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tipo de Motocicleta Nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('tipovehiculo.save')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Nomnre del Tipo de Motocicleta</label>
                    <input type="text" required name="Nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Cantidad de Ruedas</label>
                    <input type="number" name="Ruedas" class="form-control" required >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary"  value="Guardar Tipo de Motocicleta">
                </div>
            </form>
        </div>

    </div>
</div>

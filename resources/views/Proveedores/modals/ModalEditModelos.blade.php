<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('save.modelos.edit')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Nombre del Proveedor</label>
                    <input type="text" class="form-control" name="SelectProveedor" disabled id="SelectProveedor" required>
                    <input type="text" class="form-control" name="Id" hidden id="Id" required>
                </div>
                <div class="form-group">
                    <label for="">Nombre de la Marca</label>
                    <input type="text" class="form-control" name="SelectMarca" disabled id="SelectMarca" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre del Modelo</label>
                            <input type="text" required name="NombreModelo" id="NombreModelo" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Cilindraje</label>
                            <input type="number" required name="Cilindraje" id="Cilindraje" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Seleccione un Tipo de Vehiculo</label>
                    <select name="SelectTipoVehiculo" id="" class="form-control" required>
                        <option value="">---------------</option>
                        @foreach($tipoVehiculo as $tv)
                            <option value="{{$tv->id}}">{{$tv->nombre_v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary"  value="Guardar Marca">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#ModalEditModelos').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nombrePro = button.data('nombre_pro');
        var nombreMar = button.data('nombre_marca');
        var nombreMod = button.data('nombre_mod');
        var cilindraje = button.data('cilindraje');
        var modal = $(this);
        modal.find('.modal-body #SelectProveedor').val(nombrePro);
        modal.find('.modal-body #Id').val(id);
        modal.find('.modal-body #SelectMarca').val(nombreMar);
        modal.find('.modal-body #NombreModelo').val(nombreMod);
        modal.find('.modal-body #Cilindraje').val(cilindraje);
        modal.find('.modal-body #Id').val(id);
        modal.find('.modal-header #titulo').html("Editando el Modelo "+nombreMod);
    });
</script>

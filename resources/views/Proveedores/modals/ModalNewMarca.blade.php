<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Marca Nueva</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('marca.save')}}" method="post" id="FormNuevaMarca">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Seleccione Proveedor</label>
                    <select name="SelectProveedor" id="" class="form-control" required>
                        <option value="">---------------</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nombre de la Marca</label>
                    <input type="text" name="NombreMarca" class="form-control" id="FormNuevaMarca-NombreMarca" required>
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

</script>
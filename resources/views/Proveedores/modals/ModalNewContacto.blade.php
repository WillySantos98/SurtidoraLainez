<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contacto Nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('save.contacto')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Seleccione un Proveedor</label>
                            <select name="SelectProveedor" required class="form-control" id="">
                                <option value="">-----</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                @endforeach
                            </select>
                            <span>El proveedor es la empresa donde labora.</span>
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Nombre del Contacto</label>
                        <input type="text" name="NombreContacto" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono del Contacto</label>
                            <input type="tel" required name="Telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Correo del Contacto</label>
                        <input type="email" required name="Correo" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Función del Contacto</label>
                            <input type="text" name="Funcion" required class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>
        </div>

    </div>
</div>
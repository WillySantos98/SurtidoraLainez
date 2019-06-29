<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Modelo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('modelo.save')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Seleccione Proveedor</label>
                    <select name="SelectProveedor" id="" class="form-control" required onchange="cargarmarcas(this.value);">
                        <option value="">---------------</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                        @endforeach
                    </select>
                    <span>Si el proveedor no existe revise si esta activo, sino esxiste hay que crearlo.</span>
                </div>
                <div class="form-group">
                    <label for="">Seleccione una Marca</label>
                    <select name="SelectMarca" class="form-control" id="SelectMarca" required>

                    </select>
                    <span>Si el modelo no existe, revise si esta agregado.</span>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre del Modelo</label>
                            <input type="text" required name="NombreModelo" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Cilindraje</label>
                            <input type="number" required name="Cilindraje" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Seleccione un Tipo de Vehiculo</label>
                    <select name="SelectTipoVehiculo" id="" class="form-control" required>
                        <option value="">---------------</option>
                        @foreach($tipovehiculo as $tv)
                            <option value="{{$tv->id}}">{{$tv->nombre_v}}</option>
                        @endforeach
                    </select>
                    <span>Si el tipo de vehiculo que busca no existe, verifique si esta agregado</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary"  value="Guardar Marca">
                </div>
            </form>
        </div>
    </div>
</div>



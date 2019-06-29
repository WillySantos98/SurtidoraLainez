<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Colaborador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('colaborador.save')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre Completo</label>
                            <input type="text" name="Nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Fecha de Nacimiento</label>
                        <input type="date" name="FechaNacimiento" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="tel" required name="Telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Correo</label>
                        <input type="email" required name="Correo" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Fecha de Inicio</label>
                            <input type="date" name="FechaInicio" required class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tipo de Colaborador</label>
                            <select name="SelectTipoColaborador" required class="form-control" id="">
                                <option value="">-----</option>
                                    @foreach($TColaboradores as $tc)
                                    <option value="{{$tc->id}}">{{$tc->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Sucursal Asignada</label>
                            <select name="SelectSucursal" required class="form-control" id="">
                                <option value="">-----</option>
                                    @foreach($Sucursales as $sucursales)
                                        <option value="{{$sucursales->id}}">{{$sucursales->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <input type="submit" value="Guardar" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>
        </div>

    </div>
</div>
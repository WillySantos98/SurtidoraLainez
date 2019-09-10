<div class="modal fade" id="ModalCrearSub-seccionesMenu" tabindex="-1" role="dialog" aria-labelledby="ModalCrearSeccionesMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Sub-secciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('usuario.save_subsecciones')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Seleccione la Seccion</label>
                        <select name="SelectTipoSeccion" id="" class="form-control">
                            @foreach($secciones as $seccion)
                                <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nombre de la Sub-seccion</label>
                        <input type="text" name="NombreSubSeccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar Sub-seccion</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

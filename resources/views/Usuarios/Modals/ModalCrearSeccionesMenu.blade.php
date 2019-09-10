<div class="modal fade" id="ModalCrearSeccionesMenu" tabindex="-1" role="dialog" aria-labelledby="ModalCrearSeccionesMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Secciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('usuario.save_secciones')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de la Seccion</label>
                        <input type="text" name="NombreSeccion" class="form-control" required minlength="5">
                        <span>(El nombre de la seccion solo la debe de asignar cuando el desarrollador realizo ya esa seccion del menu)</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar Seccion</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seleccion de Modelo </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for="">Seleccione una Marca</label>
                <select  id="SelectMarca" class="form-control" required onchange="cargarmodelos(this.value)">

                </select>
            </div>
            <div class="col">
              <label for="">Seleccione un Modelo</label>
                <select   class="form-control" id="SelectModelo" required onchange="cargardatosmodelos(this.value)">

                </select>
            </div>
          </div>
          <hr>
          <div class="form-group" style="margin-top:20px" id="CuerpoModalFormularioConsignado">

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="AgregarRegistrosConsignacion"  data-dismiss="modal">Registrar datos de la moto</button>
          </div>
        </div>

    </div>
</div>

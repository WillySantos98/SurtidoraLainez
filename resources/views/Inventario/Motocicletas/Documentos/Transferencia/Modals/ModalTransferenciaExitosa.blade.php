<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('transferencia.exitosa')}}" method="post">
                {{csrf_field()}}
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Motor</th>
                        <th>Chasis</th>
                        <th>Casco</th>
                        <th>Bateria</th>
                        <th>Acido</th>
                        <th>Hoja de Garantia</th>
                        <th>Llaves</th>
                    </tr>
                    </thead>
                    <tbody id="CuerpoFormTransferenciaExitosa">

                    </tbody>
                </table>
                <hr>
                <input type="submit" value="Aceptar la Trnasferencia" class="btn btn-outline-success">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

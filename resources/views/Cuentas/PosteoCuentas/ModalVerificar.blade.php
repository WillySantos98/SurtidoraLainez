<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmacion de Pago</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Vas registrar un posteo a la cuenta <strong>{{$cod}}</strong> por</p>
            <h6><strong id="ValorPosteo"></strong></h6>
            <br>
            <p>Cuando presiones "Registrar Pago" no podras rectificar el posteo.</p>
            <p><strong>Por favor asegurate de la distribución de pagos.</strong></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver a Verificar</button>
            <input type="submit" class="btn btn-outline-success" value="Registrar Pago"
            data-toggle="tooltip" data-placement="top" title="Cuando presiones registrar pago se va postear la Cuenta">
        </div>
    </div>
</div>

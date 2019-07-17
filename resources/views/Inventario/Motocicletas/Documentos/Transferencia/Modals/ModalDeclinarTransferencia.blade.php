<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('declinada.transferencia')}}" method="post">
                {{csrf_field()}}
                <input type="text" id="InputCod" name="InputCodTransferencia" hidden>
                <input type="text" value="{{Auth::user()->id}}" hidden name="UserTransferencia">
                <input type="text" value="{{Auth::user()->usuario}}" hidden name="User">
                <span>Si declina la trasnferencia, La transfrencia sera cancelada.</span>
                <span>Si cancela el recibimiento tiene que ser con autorizacion de su superior.</span>
                <textarea name="TXAObservacion" id="" required class="form-control" cols="30" placeholder="Espefifique porque la transferencia se cancela" rows="10"></textarea>
                <input type="submit" value="Declinar la Transferencia" class="btn btn-outline-primary">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $('#ModalDeclinarTransferencia').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var cod = button.data('cod');
        var modal = $(this);
        modal.find('.modal-header #titulo').html("Declinacion de la transferencia "+cod);
        modal.find('.modal-body #InputCod').val(cod)
    });
</script>
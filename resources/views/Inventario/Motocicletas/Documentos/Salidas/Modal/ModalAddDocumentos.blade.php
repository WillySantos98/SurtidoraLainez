<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Registro de Documentos de la Venta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('add.doc')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div id="CodVentaFormDoc">

                </div>
                <div id="IdVentaFormDoc">

                </div>
                <div class="form-group">
                    <label for="">Seleccione los documentos de la venta</label>
                    <input type="file" multiple class="form-control" name="Documentos[]">
                </div>
                <input type="submit" value="Guardar Documentos" class="btn btn-outline-info">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $('#ModalAddDocumentosVentas').on('show.bs.modal', function (event) {
        var cod = document.getElementById("InputCod").value;
        var id = document.getElementById("InputId").value;
        document.getElementById("CodVentaFormDoc").innerHTML = "<input type='text' name='CodVenta' value='"+cod+"' hidden>"
        document.getElementById("IdVentaFormDoc").innerHTML = "<input type='text' name='IdVenta' value='"+id+"' hidden>"
    });
</script>
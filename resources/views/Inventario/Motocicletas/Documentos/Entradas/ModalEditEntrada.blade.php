<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tituloModalEditEntrada"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="bodyModalEditEntrada">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $('#ModalEditEntrada').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('nombre');
        var modal = $(this);
        modal.find('.modal-header #tituloModalEditEntrada').html("Edicion de la entrada "+id);

        axios.get('/inventario/edit_entrada/'+id).then(
            function (entrada) {
                html = '';
                console.log(entrada.data);
                for (var i = 0; i<entrada.data.length; i++){
                    html =`
                        <form action="{{route('edit.entrada')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Codigo de Entrada: </label>
                                    </div>
                                    <div class="col">
                                        <input name="InputCodEntrada" id="inputModalCodEntrada" class="form-control" type="text" readonly value="${entrada.data[i].cod_entrada}">
                                        <input name="InputIdentrada" class="form-control" type="text" hidden value="${entrada.data[i].id}">
                                        <input name="InputIdUser" class="form-control" type="text" hidden value="{{Auth::user()->id}}">
                                        <input name="InputUser" class="form-control" type="text" hidden value="{{Auth::user()->usuario}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for=""># de Transferencia: </label>
                                    </div>
                                    <div class="col">
                                        <input  class="form-control" name="InputNumTransferencia" type="text" value="${entrada.data[i].num_transferencia}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Fecha de Ingreso: </label>
                                    </div>
                                    <div class="col">
                                        <input  class="form-control" name="InputFecha" type="date" value="${entrada.data[i].fecha_entrada}">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                        </form>
                    `
                }

                document.getElementById("bodyModalEditEntrada").innerHTML = html;
                //document.getElementById('inputModalCodEntrada').readOnly = true;
            }
        )
    });
</script>
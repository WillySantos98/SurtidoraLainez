<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="titulo">Busqueda de Motocicletas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" >
        <div style="overflow-y: scroll; height: 550px">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="p-2 bd-highlight">
                    <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
                </div>
            </div>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Chasis</th>
                    <th>Motor</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Selecionar</th>
                </tr>
                </thead>
                <tbody id="TablaMotoTransferencia">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#TablaMotoTransferencia tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
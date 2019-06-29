<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Busqueda de Motocicleta</h5>
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
                        <input class="form-control" id="myInputM" type="text" placeholder="Buscar...">
                    </div>
                </div>
                <table class="table table-sm">
                    <thead>
                        <th>Codigo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Chasis</th>
                        <th>Motor</th>
                        <th>Color</th>
                    </thead>
                    <tbody id="bodyTableMoto">
                    @foreach($motos as $info)
                        <tr>
                            <td>{{$info->id_moto}}</td>
                            <td>{{$info->nombre}}</td>
                            <td>{{$info->nombre_mod}}</td>
                            <td>{{$info->chasis}}</td>
                            <td>{{$info->motor}}</td>
                            <td>{{$info->color}}</td>
                            <td><button class="btn btn-success" data-dismiss="modal" value="{{$info->id}}.{{$info->nombre}}.{{$info->nombre_mod}}.{{$info->chasis}}.{{$info->motor}}.{{$info->color}}" onclick="addMoto(this.value)">
                                    <i class="fa fa-arrow-right" aria-hidden="true"> Seleccionar</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#myInputM").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#bodyTableMoto tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
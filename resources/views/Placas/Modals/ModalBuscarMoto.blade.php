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
                        <input class="form-control" id="myInputVincular" type="text" placeholder="Buscar...">
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
                    <th>Vincular</th>
                    </thead>
                    <tbody id="bodyTableMotoVincular">
                        @foreach($motos as $moto)
                        <tr>
                            <td>{{$moto->id_moto}}</td>
                            <td>{{$moto->nombre}}</td>
                            <td>{{$moto->nombre_mod}}</td>
                            <td>{{$moto->chasis}}</td>
                            <td>{{$moto->motor}}</td>
                            <td>{{$moto->color}}</td>
                            <td>
                                <button onclick="VinculacionMoto(this.value)" data-dismiss="modal"
                                        value="{{$moto->id}}.{{$moto->nombre}}.{{$moto->nombre_mod}}.{{$moto->chasis}}.{{$moto->motor}}.{{$moto->color}}.{{$moto->ano}}.{{$moto->cilindraje}}"
                                        class="btn btn-outline-success"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
        $("#myInputVincular").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#bodyTableMotoVincular tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function VinculacionMoto(val) {
        var cadena = val;
        var datos = cadena.split('.');
        let id = datos[0];
        let marca = datos[1], modelo = datos[2], chasis = datos[3], motor = datos[4], color = datos[5], ano=datos[6], cilindraje = datos[7];

        document.getElementById("BoletaMarca").innerHTML = marca;
        document.getElementById("BoletaModelo").innerHTML = modelo;
        document.getElementById("BoletaColor").innerHTML =  color;
        document.getElementById("BoletaMotor").innerHTML = motor;
        document.getElementById("BoletaChasis").innerHTML = chasis;
        document.getElementById("BoletaAno").innerHTML = ano;
        document.getElementById("BoletaCil").innerHTML = cilindraje;
        document.getElementById("BoletaInputIdMoto").innerHTML = '<input value="'+id+'" type="text" hidden>';

    }

</script>

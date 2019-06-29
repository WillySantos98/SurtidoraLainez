<table class="table table-hover ">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Ruedas</th>
        <th>Editar</th>
    </tr>
    </thead>
    <tbody id="TableTV">
    @foreach($tipoVehiculo as $tv)
    <tr>
        <td>{{$tv->nombre_v}}</td>
        <td>{{$tv->ruedas}}</td>
        <td class="text-center">
            <a type="button" class="btn btn" style="background-color: orangered; padding: 0px"  data-toggle="modal" data-target="#ModalEditTipoVehiculo"
            data-id="{{$tv->id}}"
            data-ruedas="{{$tv->ruedas}}"
            data-nombre="{{$tv->nombre_v}}">
                <span class="badge badge-danger"><i data-feather="edit"></i></span>
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade " id="ModalEditTipoVehiculo" tabindex="-1" role="dialog" aria-labelledby="ModalEditTipoVehiculo" aria-hidden="true">
    @include('Proveedores.modals.ModalEditTipoVehiculo')
</div>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log("funciona");
            $("#TableTV tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

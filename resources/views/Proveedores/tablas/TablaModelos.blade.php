<table class="table table-hover">
    <thead>
    <tr>
        <th>Proveedor</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Cilindraje</th>
        <th>Tipo</th>
        <th>Editar</th>
    </tr>
    </thead>
    <tbody id="TableModelos">
    @foreach($modelos as $modelo)
        <tr>
            <td>{{$modelo->nombre_Pro}}</td>
            <td>{{$modelo->nombre}}</td>
            <td>{{$modelo->nombre_mod}}</td>
            <td>{{$modelo->cilindraje}}-cc</td>
            <td>{{$modelo->nombre_v}}</td>
            <td class="text-center">
                <a type="button" class="btn btn" style="background-color: orangered; padding: 0px"  data-toggle="modal" data-target="#ModalEditModelos"
                data-id="{{$modelo->id}}"
                data-nombre_pro="{{$modelo->nombre_Pro}}"
                data-nombre_marca="{{$modelo->nombre}}"
                data-nombre_mod="{{$modelo->nombre_mod}}"
                data-cilindraje="{{$modelo->cilindraje}}">
                    <span class="badge badge-danger"><i data-feather="edit"></i></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade " id="ModalEditModelos" tabindex="-1" role="dialog" aria-labelledby="ModalEditModelos" aria-hidden="true">
    @include('Proveedores.modals.ModalEditModelos')
</div>

<script>
    $(document).ready(function(){
        $("#myInput2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log("funciona");
            $("#TableModelos tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

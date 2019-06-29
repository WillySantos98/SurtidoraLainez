<table class="table table-hover" >
<thead>
<tr>
    <th>Rtn</th>
    <th>Nombre</th>
    <th>Telefono</th>
    <th>Email</th>
    <th>Dirección</th>
    <th>Estado</th>
    <th>Editar</th>
</tr>
</thead>
<tbody id="TableProveedores">
@foreach($proveedor as $pro)
    <tr>
        <td>{{$pro->rtn}}</td>
        <td>{{$pro->nombre}}</td>
        <td>{{$pro->telefono}}</td>
        <td>{{$pro->email}}-cc</td>
        <td>{{$pro->direccion}}</td>
        @if($pro->estado == 1)
            <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
        @else
            <td class="text-center"><span class="badge badge-danger"><i data-feather="user-x"></i></span></td>
        @endif
        <td class="text-center">
            <a type="button" class="btn btn" style="background-color: orangered; padding: 0px"  data-toggle="modal" data-target="#ModalEditProveedor">
                <span class="badge badge-danger"><i data-feather="edit"></i></span>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
</table>

<div class="modal fade " id="ModalEditProveedor" tabindex="-1" role="dialog" aria-labelledby="ModalEditProveedor" aria-hidden="true">
    @include('Proveedores.modals.ModalEditProveedor')
</div>

<script>
    $(document).ready(function(){
        $("#myInput3").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log("funciona");
            $("#TableProveedores tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
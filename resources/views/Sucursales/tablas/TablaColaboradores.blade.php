<div style="overflow-y: scroll; height: 350px">
    <button class="btn btn-info p-2 bd-highlight" style="background-color: white; border: grey;">
        <input class="form-control" id="myInput" type="text" placeholder="Buscar Colaborador..."></button>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th class="text-center">Estado</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Mas informacion</th>
        </tr>
        </thead>
        <tbody id="MyTable">
        @foreach($Colaboradores as $colaborador)
            <tr>
                <td>{{$colaborador->nombre}}</td>
                @if($colaborador->estado == 1)
                    <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
                @else
                    <td class="text-center"><span class="badge badge-danger"><i data-feather="user-x"></i></span></td>
                @endif
                <td>{{$colaborador->email}}</td>
                <td>{{$colaborador->telefono}}</td>
                <td><a href="colaborador/{{$colaborador->id}}">Mas...</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log("funciona");
            $("#MyTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

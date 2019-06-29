<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Direccion</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datosDireccion as $itemDatos)
        <tr>
            <td>{{$itemDatos->direccion}}</td>
            @if($itemDatos->estado == 1)
                <td>
                    <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                </td>
            @else
                <td>
                    <button class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></button>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

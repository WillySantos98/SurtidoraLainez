<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Nombre Completo</th>
        <th>Identidad</th>
        <th>Rtn</th>
        <th>Mas Informacion</th>
    </tr>
    </thead>
    <tbody id="MyTable">
    @foreach($clientes as $item)
        <tr>
            <td>{{$item->nombres}} {{$item->apellidos}}</td>
            <td>{{$item->identidad}}</td>
            <td>{{$item->rtn}}</td>
            <td><a href="clientes/perfil/{{$item->id}}">Mas...</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $clientes->render() !!}

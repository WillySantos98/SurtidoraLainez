<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Numero Telefonico</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datosTelefono as $itemTelefono)
        <tr>
            <td>{{$itemTelefono->numero}}</td>
            @if($itemTelefono->estado == 1)
                <td>
                    <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
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
<script>

</script>
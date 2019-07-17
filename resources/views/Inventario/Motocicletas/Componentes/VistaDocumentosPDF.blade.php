<table class="table table-sm">
    <thead>
    <tr>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    @foreach($entrada_documentos as $doc)
        <tr>
            <td><a href="/documentos/entradas/{{$doc->nombre}}" target="_blank">{{$doc->nombre}}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-sm">
    <thead>
    <tr>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fotos_moto as $doc)
        <tr>
            <td><a href="/documentos/entradas/docmotos/{{$doc->nombre}}" target="_blank">{{$doc->nombre}}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
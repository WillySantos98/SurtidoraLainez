<table class="table table-sm">
    <thead>
    <tr>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datosDocumentos as $doc)
        <tr>
            <td><a href="{{asset('/documentos/clientes/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

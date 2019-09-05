<table class="table table-sm">
    <thead>
    <tr>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody id="tbodyVistaDocumentoEntrada">

    </tbody>
</table>

<script>
    if(document.getElementById("tbodyVistaDocumentoEntrada")){
        let dominio = document.domain;
        let html = '';
        if (dominio == 'surtidoralainez.com'){
            html +=`
                 @foreach($entrada_documentos as $doc)
                     <tr>
                        <td><a href="{{asset('documentos/entradas/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
                    </tr>
                @endforeach
            `
            document.getElementById("tbodyVistaDocumentoEntrada").innerHTML =  html
        }else if(dominio == 'multiservicioscomercialestito.com'){
            html +=`
                 @foreach($entrada_documentos as $doc)
                    <tr>
                        <td><a href="{{asset('/public/documentos/entradas/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
                    </tr>
                @endforeach
            `
            document.getElementById("tbodyVistaDocumentoEntrada").innerHTML =  html
        }
    }
</script>

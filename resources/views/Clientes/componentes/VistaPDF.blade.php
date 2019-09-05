<table class="table table-sm">
    <thead>
    <tr>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody id="VistaPdfDocumentos">

    </tbody>
</table>

<script>
    if(document.getElementById("VistaPdfDocumentos")){
        let dominio = document.domain;
        let html ='';
        if (dominio == 'surtidoralainez.com'){
            @foreach($datosDocumentos as $doc)
                html +=`
                <tr>
                <td><a href="{{asset('/documentos/clientes/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
                </tr>
    `
            @endforeach
            document.getElementById("VistaPdfDocumentos").innerHTML = html;
        }else if(dominio == 'www.multiservicioscomercialestito.com'){
            @foreach($datosDocumentos as $doc)
                html +=`
                <tr>
                <td><a href="{{asset('/public/documentos/clientes/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
                </tr>
    `
            @endforeach
            document.getElementById("VistaPdfDocumentos").innerHTML = html;
        }
    }


</script>

<table class="table table-sm">
    <thead>
    <tr>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody id="tbodyVistaPdfMotos">

    </tbody>
</table>

<script>
    if (document.getElementById("tbodyVistaPdfMotos")){
        let dominio = document.domain
        let html =''
        if(dominio == 'surtidoralainez.com'){
            html +=`
                @foreach($fotos_moto as $doc)
                    <tr>
                        <td><a href="{{asset('/documentos/entradas/docmotos/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
                    </tr>
                @endforeach
            `
            document.getElementById("tbodyVistaPdfMotos").innerHTML = html
        }else if(dominio == 'multiservicioscomercialestito.com'){
            html +=`
                @foreach($fotos_moto as $doc)
                    <tr>
                        <td><a href="{{asset('/public/documentos/entradas/docmotos/'.$doc->nombre)}}" target="_blank">{{$doc->nombre}}</a></td>
                    </tr>
                @endforeach
            `
            document.getElementById("tbodyVistaPdfMotos").innerHTML = html
        }
    }
</script>

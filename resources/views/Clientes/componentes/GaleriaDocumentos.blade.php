<meta name="viewport" content="width=device-width, initial-scale=1">
@include('Clientes.componentes.CssGaleria')
<body>
<div class="container"  id="VistaGaleriaClientes">
</div>
</body>

<script>

    if(document.getElementById("VistaGaleriaClientes")){
        let dominio = document.domain;
        var html = '';
        if (dominio == 'surtidoralainez.com'){
            html +=`
            @foreach($datosDocumentos as $itemDocumentos)
                <div class="mySlides">
                    <img class="rounded mx-auto d-block" src="{{asset('/documentos/clientes/'.$itemDocumentos->nombre)}}" style="width:350px; height: 450px">
                    <div class="d-flex justify-content-center">
                        @foreach($cliente as $item)
                            <a href="{{asset('/documentos/clientes/'.$item->nombre)}}" target="_blank">Ver completa</a>
                            <hr>
                            <a href="{{asset('/documentos/clientes/'.$item->nombre)}}" download="Documento-{{$itemDocumentos->nombres}}-{{$itemDocumentos->apellidos}}-{{$itemDocumentos->nombre}}" >Descargar Documento </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
             <hr>
            <div class="row">
                @foreach($datosDocumentos as $itemDocumentos)
                    <div class="column">
                        <img class="demo cursor" src="{{asset('/documentos/clientes/'.$itemDocumentos->nombre)}}" style="width:150px;height: 150px"
                             onclick="currentSlide({{$i=$i+1}})" alt="The Woods">
                    </div>
                @endforeach
            </div>
            `
            document.getElementById("VistaGaleriaClientes").innerHTML = html

        } else if(dominio == 'www.multiservicioscomercialestito.com'){
            html +=`
            @foreach($datosDocumentos as $itemDocumentos)
                <div class="mySlides">
                    <img class="rounded mx-auto d-block" src="{{asset('/public/documentos/clientes/'.$itemDocumentos->nombre)}}" style="width:350px; height: 450px">
                        <div class="d-flex justify-content-center">
                            @foreach($cliente as $item)
                                <a href="{{asset('/public/documentos/clientes/'.$item->nombre)}}" target="_blank">Ver completa</a>
                                <hr>
                                <a href="{{asset('/public/documentos/clientes/'.$item->nombre)}}" download="Documento-{{$itemDocumentos->nombres}}-{{$itemDocumentos->apellidos}}-{{$itemDocumentos->nombre}}" >Descargar Documento </a>
                            @endforeach
                        </div>
                </div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            <hr>
            <div class="row">
                @foreach($datosDocumentos as $itemDocumentos)
                    <div class="column">
                        <img class="demo cursor" src="{{asset('/public/documentos/clientes/'.$itemDocumentos->nombre)}}" style="width:150px;height: 150px"
                             onclick="currentSlide({{$i=$i+1}})" alt="The Woods">
                    </div>
                @endforeach
            </div>
            `
            document.getElementById("VistaGaleriaClientes").innerHTML = html
        }
    }


    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }


</script>

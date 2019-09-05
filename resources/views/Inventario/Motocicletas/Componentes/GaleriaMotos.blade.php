@include('Clientes.componentes.CssGaleria')
<body>

<div class="container" id="MotoVistaFotosGaleria">

</div>

<script>
    if(document.getElementById("MotoVistaFotosGaleria")){
        let html = ''
        let dominio = document.domain

        if(dominio == 'surtidoralainez.com'){
            html +=`
                <input type="hidden" {{$i=0}}>
                @foreach($fotos_moto as $doc)
            <div class="mySlides">
                <div class="numbertext">{{$i = $i + 1}} / {{$contador_doc}}</div>
                            <img src="{{asset('/documentos/entradas/docmotos/'.$doc->nombre)}}" class="rounded mx-auto d-block" style="width:350px; height: 450px">
                            <a href="{{asset('/documentos/entradas/docmotos/'.$doc->nombre)}}" download="Documentos de moto-{{$doc->id_moto}}-{{$doc->nombre}}" >Descargar Documento </a>
                            <a href="{{asset('/documentos/entradas/docmotos/'.$doc->nombre)}}" target="_blank">Ver completa</a>
                        </div>
                @endforeach
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="row">
                <input type="hidden" {{$e=0}}>
                    @foreach($fotos_moto as $doc)
            <div class="column">
                <img class="demo cursor" src="{{asset('/documentos/entradas/docmotos/'.$doc->nombre)}}" style="width:100%" onclick="currentSlide({{$e = $e + 1}})" alt="{{$doc->nombre}}">
                </div>
                @endforeach
            </div>

`
            document.getElementById("MotoVistaFotosGaleria").innerHTML =html
        }else if(dominio = 'multiservicioscomercialestito.com'){
            html +=`
            <input type="hidden" {{$i=0}}>
            @foreach($fotos_moto as $doc)
            <div class="mySlides">
                <div class="numbertext">{{$i = $i + 1}} / {{$contador_doc}}</div>
                        <img src="{{asset('/public/documentos/entradas/docmotos/'.$doc->nombre)}}" class="rounded mx-auto d-block" style="width:350px; height: 450px">
                        <a href="{{asset('/public/documentos/entradas/docmotos/'.$doc->nombre)}}" download="Documentos de moto-{{$doc->id_moto}}-{{$doc->nombre}}" >Descargar Documento </a>
                        <a href="{{asset('/public/documentos/entradas/docmotos/'.$doc->nombre)}}" target="_blank">Ver completa</a>
                    </div>

                @endforeach
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="row">
                <input type="hidden" {{$e=0}}>
                    @foreach($fotos_moto as $doc)
            <div class="column">
                <img class="demo cursor" src="{{asset('/public/documentos/entradas/docmotos/'.$doc->nombre)}}" style="width:100%" onclick="currentSlide({{$e = $e + 1}})" alt="{{$doc->nombre}}">
                        </div>
                    @endforeach
            </div>
`
            document.getElementById("MotoVistaFotosGaleria").innerHTML = html;
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

</body>



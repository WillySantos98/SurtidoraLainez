<meta name="viewport" content="width=device-width, initial-scale=1">
@include('Clientes.componentes.CssGaleria')
<body>
<div class="container" >
    @foreach($datosDocumentos as $itemDocumentos)
        <div class="mySlides">
            <img class="rounded mx-auto d-block" src="public/documentos/clientes/{{$itemDocumentos->nombre}}" style="width:350px; height: 450px">
            <div class="d-flex justify-content-center">
                @foreach($cliente as $item)
                    <a href="public/documentos/clientes/{{$itemDocumentos->nombre}}" target="_blank">Ver completa</a>
                    <hr>
                    <a href="public/documentos/clientes/{{$itemDocumentos->nombre}}" download="Documento-{{$itemDocumentos->nombres}}-{{$itemDocumentos->apellidos}}-{{$itemDocumentos->nombre}}" >Descargar Documento </a>
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
                <img class="demo cursor" src="public/documentos/clientes/{{$itemDocumentos->nombre}}" style="width:150px;height: 150px"
                     onclick="currentSlide({{$i=$i+1}})" alt="The Woods">
            </div>
        @endforeach
    </div>
</div>

<script>
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

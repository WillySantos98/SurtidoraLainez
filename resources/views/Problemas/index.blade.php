<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'SL-Seccion de Problemas')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
</head>
<body>
@include('Problemas.Componentes.Nav')
    @yield('content')
    @section('content-p')
        @include('Problemas.Index.index')
    @show
</body>
</html>



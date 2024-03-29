<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <title>@yield('title', 'Ingreso Motocicleta Parte 2')</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body id="page-top">
<div style="background-color: #078BF6 ">
    <h3 class="text-center" style="color: white">Segunda Parte del Ingreso de Motocicletas</h3>
</div>
<div id="wrapper" class="container-fluid">
    <form action="{{route('save.2.form')}}" onchange="FormRegistro2()" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('Inventario.Motocicletas.Registro.Consignadas.tablas.TablaEncabezado')
        <hr>
        <h4 class="text-center">Motocicletas de la Entrada</h4>
        @include('Inventario.Motocicletas.Registro.Consignadas.tablas.TablaCuerpo')
        <hr>
        <button class="btn btn-outline-primary" type="submit" id="Boton-Submit-Form">Guardar Registros de Documentos y Motocicletas</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    feather.replace()
</script>
<script src="{{asset('js/ValidacionesFormularios/Validacion.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormRegistroEntrada2.js')}}"></script>
</body>

</html>

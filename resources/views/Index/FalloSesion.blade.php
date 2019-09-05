<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fallo inicio sesion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #contenedor{
            margin-top: 20px;
        }
        .fuente14{
            font-size: 14px;
        }
    </style>
</head>

<body >
<div class="container-fluid " id="contenedor">
    <div class="d-flex justify-content-start">
        <a href="{{route('login')}}" class="btn btn-outline-primary nav-link">Volver al Inicio de Sesión</a>
    </div>
    <hr>
    <div class="card">
        <br>
        <h4 class="text-center">Fallo de inicio de sesión a Surtidora Lainez</h4>
        <h6 class="text-center">Al parecer ha fallado el inicio de sesión, el fallo pude haberse dado por las siguientes razones:</h6>
        <h6 class="text-center fuente14">1.El correo electrónico que intrudujiste no esta asociada a ninguna cuenta.</h6>
        <h6 class="text-center fuente14">2.La constraseña que ingresaste no es la correcta a tu cuenta.</h6>
        <h6 class="text-center fuente14">3.Tu cuenta esta desactivada(consulta con el administrador para verificar si el estado de tu cuenta esta activa o inactiva)</h6>
        <br>
        <a class="text-center" href="{{route('login')}}">Volver a intentar a iniciar sesión</a>
        <br>
    </div>
    <hr>

</div>
</body>

</html>

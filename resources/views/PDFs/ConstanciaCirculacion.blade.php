<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia de Circulacion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #imagen{
            position:absolute;
            z-index:0;
            height: 60px;
            width: 100px;
        }
        .parrafo{
            text-align: justify;
            font-size: 15px;
        }
        .filas{
            margin: 0;
            font-size: 15px;
        }
    </style>
</head>
<body>
<img id="imagen" src="logo2.png" alt="">
@foreach($consulta as $info)

    <h1 class="text-center text-uppercase"><strong>Surtidora Lainez</strong></h1>
    <h6 class="filas text-center">{{$info->direccion}}</h6>
    <h6 class="filas text-center">Tel: 2434-4365, Celular:{{$info->telefono}}, E-mail:{{$info->email}}</h6>
    <hr>
    <h4 class="text-uppercase text-center"><strong>Constancia</strong></h4>
    <p class="parrafo">Por medio de la presente <strong>SURTIDORA LAINEZ</strong> hace constar que hemos
        vendido al señor(a): <strong class="text-uppercase">{{$info->nombres}}  {{$info->apellidos}}</strong>, con numero de
        identidad <strong>{{$info->identidad}}</strong>, una moto con las siguientes caracteristicas:</p>

    <p class="filas text-uppercase"><strong>TIPO DE VENTA:</strong>     {{$info->venta}}</p>
    <p class="filas text-uppercase"><strong>MARCA:</strong>     {{$info->marca}}</p>
    <p class="filas text-uppercase"><strong>COLOR:</strong>     {{$info->color}}</p>
    <p class="filas text-uppercase" style="margin: 0"><strong>MODELO:</strong>    {{$info->nombre_mod}}</p>
    <p class="filas text-uppercase"><strong>AÑO:</strong>       {{$info->ano}}</p>
    <p class="filas text-uppercase"><strong>CHASIS:</strong>    {{$info->chasis}}</p>
    <p class="filas text-uppercase"><strong>MOTOR:</strong>     {{$info->motor}}</p>
    <p class="text-uppercase"><strong>PLACA:</strong>     EN TRAMITES</p>
    <p class="parrafo">En virtud de estar en trámite, el permiso para circular sin placa que émite
        el <strong>INSTITUTO DE LA PROPIEDAD (IP)</strong> se le extiende esta constancia valida
        por 30 días, a vencerse a los {{$dia}} DIAS DEL MES DE {{$mesString}} DEL {{$ano}};
        se le extiende en la fecha <strong>{{$fecha_real}}</strong>, por lo que rogamos a las
        <strong>Autoridades de Transito</strong> dejen circular esta <strong>MOTOCICLETA</strong> hasta que se
        cuente con la documentacion requerida.</p>

    <p class="filas">Atentamente,</p>

    <div class="d-flex justify-content-center">
        <div class="col d-flex justify-content-center" >
            <div class="row" >
                <img src="sello.png" alt="" style="width: 85px; height: 58px;margin-left: 300px;">
            </div>
            <div class="row">
                <img src="firma.png" alt="" style="width: 140px; height: 80px; margin-left: 300px">
                <p class="text-center" style="margin-top: 60px"><strong>GERENTE SURTIDORA LAINEZ</strong></p>
            </div>
        </div>
    </div>
    <hr>
    <p>Este es un documento oficial de SURTIDORA LAINEZ</p>

@endforeach
</body>
</html>

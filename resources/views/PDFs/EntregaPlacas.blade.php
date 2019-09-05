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
        .tam12{
            font-size: 12px;
        }
        .tam15{
            font-size: 15px;
        }
        .tam10{
            font-size: 10px;
        }
        .columnas{
            display: flex;
            padding: 0;
            margin: 0;
        }

    </style>
</head>
<body>
<img id="imagen" src="logo2.png" alt="">
@foreach($info as $inf)
    <h2 class="text-center text-uppercase"><strong>SURTIDORA LAINEZ</strong></h2>
    <h6 class="text-center">{{$inf->direccion}}</h6>
    <div class="row">
        <div class="col tam12">
            <strong>Fecha de realización de documento:</strong> {{$fecha}}
        </div>
    </div>
    <div class="row">
        <div class="col tam12"><strong>Codigo del documento:</strong> </div>
    </div>
    <hr>
    <h6 class="text-center">Acta de Entrega de Placas</h6>
    <h6 class="tam15">-Datos del cliente:</h6>
    <div class="row">
        <div class="col tam10" ><strong>Nombre Completo: </strong> {{$inf->nombres}} {{$inf->apellidos}}</div>
        <div class="col tam10" style="margin-left: 400px"><strong>Identidad: </strong>{{$inf->identidad}}</div>
    </div>
    <h6 class="tam15">-Datos de la motocicleta:</h6>
    <div class="row">
        <div class="col tam10"><strong>Chasis: </strong> {{$inf->chasis}}</div>
        <div class="col tam10" style="margin-left: 250px"><strong>Motor: </strong> {{$inf->motor}}</div>
        <div class="col tam10" style="margin-left: 500px"><strong>Marca: </strong> {{$inf->nombre_m}}</div>
    </div>
    <div class="row">
        <div class="col tam10"><strong>Modelo: </strong> {{$inf->nombre_mod}}</div>
        <div class="col tam10" style="margin-left: 250px"><strong>Año: </strong> {{$inf->ano}}</div>
        <div class="col tam10" style="margin-left: 500px"><strong>Color: </strong> {{$inf->color}}</div>
    </div>
    <h6 class="tam15">-Datos de la venta:</h6>
    <div class="row">
        <div class="col tam10"><strong># venta: </strong>{{$inf->cod_venta}}</div>
        <div class="col tam10" style="margin-left: 250px"><strong># Factura: </strong>{{$inf->num_venta}}</div>
        <div class="col tam10" style="margin-left: 500px"><strong>Fecha de Venta: </strong>{{$inf->fecha_salida}}</div>
    </div>
    <h6 class="tam15">-Datos de la entrega de boleta:</h6>
    <div class="row">
        <div class="col tam10"><strong># Boleta: </strong>{{$inf->num_boleta}}</div>
        <div class="col tam10" style="margin-left: 250px"><strong># Placa: </strong>{{$inf->num_placa}}</div>
        <div class="col tam10" style="margin-left: 500px"><strong>Viene placa: </strong>@if($inf->estado_enlazo == 1) Si viene placa  @elseif($inf->estado_enlazo == 2) No viene placa @endif</div>
    </div>
    <hr>
    <p class="tam12">Yo {{$inf->nombres}} {{$inf->apellidos}} confirmo que recibí el numero de boleta {{$inf->num_boleta}} el cual @if($inf->estado_enlazo == 1) si trae placa, con numero {{$inf->num_placa}}.  @elseif($inf->estado_enlazo == 2) no trae placa. @endif</p>
    <div style="margin-top: 100px">
        <div class="row" >
            <div class="col tam10" style="margin-left: 80px">___________________________________________</div>
            <div class="col tam10" style="margin-left: 370px">__________________________________________</div>
        </div>
        <div class="row">
            <div class="col tam10" style="margin-left: 115px">{{$inf->nombres}} {{$inf->apellidos}}</div>
            <div class="col tam10" style="margin-left: 420px">firma y sello del gerente de tienda</div>
        </div>
    </div>
    <hr>
    <p style="font-size: 8px">Este es un documento oficial de Surtidora Lainez</p>
@endforeach
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cotizaciones</title>
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
        .contenedor-info{
            border: #e74a3b 2px solid;
            border-radius: 10px;
            padding: 3px;
        }
        .filas2{
            margin: 0;
            font-size: 15px;
            margin-left: 20px;
        }

    </style>
</head>
<body>
<img id="imagen" src="logo2.png" alt="">
@foreach($cotizaciones as $cotizacion)
    <div class="row">
        <div class="col">
            <h3 class="text-center"><strong>SURTIDORA LAINEZ</strong></h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5 class="text-center"><strong>Cotización</strong></h5>
        </div>
    </div>
    <div class="contenedor-info">
        <div class="row">
            <h6 class="filas" style="margin-left: 15px"><strong>Número de cotización:</strong>{{$cod}}</h6>
            <h6 class="filas" style="margin-left: 490px"><strong>Fecha de creación:</strong>{{$cotizacion->fecha_creacion}}</h6>
        </div>
        <div class="row">
            <h6 class="filas" style="margin-left: 15px"><strong>Sucursal:</strong>{{$cotizacion->nombre_suc}}</h6>
        </div>
        <div class="row">
            <h6 class="filas" style="margin-left: 15px"><strong>Vendedor:</strong>{{$cotizacion->nombre_col}}</h6>
        </div>
        <div class="row">
            <h6 style="margin-left: 15px" class="filas"><strong>Nombre del cliente:</strong>{{$cotizacion->nombre_interesado}} {{$cotizacion->apellido_interesado}}</h6>
        </div>
        <div class="row">
            <h6 style="margin-left: 15px" class="filas"><strong>Teléfono:</strong>{{$cotizacion->telefono}}</h6>
        </div>
        <div class="row">
            <h6 class="filas" style="margin-left: 15px"><strong>Identificación del cliente:</strong>{{$cotizacion->identificacion_interesado}}</h6>
        </div>
        <div class="row">
            <h6 class="filas" style="margin-left: 15px"><strong>Dirección:</strong>{{$cotizacion->direccion}}</h6>
        </div>
        <br>
    </div>
    <div style="margin-top: 15px">
        <div class="row"><h6 class="text-center"><strong>Información del crédito</strong></h6></div>
        <div class="row"><h6 class="filas2"><strong>Marca: </strong>{{$cotizacion->nombre}}</h6></div>
        <div class="row"><h6 class="filas2"><strong>Modelo: </strong>{{$cotizacion->nombre_mod}}</h6></div>
        <div class="row"><h6 class="filas2"><strong>Tipo de vehículo: </strong>{{$cotizacion->nombre_v}}</h6></div>
        <div class="row"><h6 class="filas2"><strong>Ruedas: </strong>{{$cotizacion->ruedas}}</h6></div>
        <div class="row"><h6 class="filas2"><strong>Motor: </strong>{{$cotizacion->cilindraje}}cc</h6></div>
        <br>
        <div class="row"><h6 class="filas2"><strong>Tipo de cotización: </strong>
                @if($cotizacion->intervalo_tiempo_pago == 0 && $cotizacion->prima == 0 && $cotizacion->meses == 0)
                    Contado
                @else
                    Crédito
                @endif</h6></div>
        <div class="row"><h6 class="filas2"><strong>Prima: </strong>L.{{$cotizacion->prima}}</h6></div>
        @if($cotizacion->intervalo_tiempo_pago == 0 && $cotizacion->prima == 0 && $cotizacion->meses == 0)
            <div class="row"><h6 class="filas2"><strong>Precio final: </strong>L.{{$cotizacion->total_pagar}}</h6></div>
            @else
            <div class="row"><h6 class="filas2"><strong>Saldo a financiar: </strong>L.{{$cotizacion->total_pagar - $cotizacion->prima}}</h6></div>
        @endif
        <div class="row"><h6 class="filas2"><strong>Tiempo del crédito: </strong>{{$cotizacion->meses}} meses</h6></div>
        <div class="row"><h6 class="filas2"><strong>Cuota: </strong>L.{{$cotizacion->cuota}}</h6></div>
        <div class="row"><h6 class="filas2"><strong>Intervalo de pago: </strong>
                @if($cotizacion->intervalo_tiempo_pago == 1)
                    Mensual
                @elseif($cotizacion->intervalo_tiempo_pago == 2)
                    Quincenal
                @else
                    No tiene, porque se cotizó en precio de contado.
                @endif</h6></div>
        <div class="row"><h6 class="filas2"><strong>Número de cuotas: </strong>{{$cotizacion->meses * $cotizacion->intervalo_tiempo_pago}}. En el número de  cuotas no va incluida la prima.</h6></div>
        <div class="row"><h6 class="filas2"><strong>Cuota final: </strong>
                @if($cotizacion->intervalo_tiempo_pago == 0 && $cotizacion->prima == 0 && $cotizacion->meses == 0)
                    Precio de contado
                @else
                    L.{{$cotizacion->cuota/$cotizacion->intervalo_tiempo_pago}}
                @endif
                </h6></div>
        <hr>
        <div style="margin-left: 15px; font-size: 10px" class="row"><h6><strong>Usuario creador:</strong>{{$cotizacion->usuario}}</h6></div>
    </div>
    <div class="row">
        <img src="sello.png" alt="" style="width: 85px; height: 58px;margin-left: 300px">
        <img src="firma.png" alt="" style="width: 140px; height: 80px; margin-left: 300px">
        <h6 style="margin-left: 260px;font-size: 12px;margin-top: 50px">MARLON OMAR SANTOS LAINEZ</h6>
    </div>
    <div class="row">
        <h6 style="font-size: 9px;margin-left: 15px">Este es un documentos oficial de Surtidora Lainez. Contactanos: willydasane@gmail.com Tel.9959-5625.</h6>
    </div>
@endforeach

</body>
</html>

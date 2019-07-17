<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">
    @foreach($consulta as $info)
        <div class="d-flex justify-content-between">
            <div>
                <img src="logo2.png" alt="" style="opacity: 0.5; width: 50px;height: 35px" >
            </div>
            <div class="col-sm-12">
                <h3 class="text-center text-uppercase font-weight-bold">Surtidora Lainez</h3>
                <h6 class="text-center text-uppercase" style="font-size: 14px">Col. 19 de Abril contiguo a "Transportes Cristina. Trujillo, Colon.</h6>
                <hr>
            </div>
        </div>
        <h6 class="font-weight-bold" style="font-size: 10px;">Documento Numero: {{$info->cod_notificacion}}</h6>
        <div class="col">
            <h5 class="text-left text-uppercase font-weight-bold" style="font-size: 13px">Fecha de documento: {{$fecha}}</h5>
        </div>
        <div class="col">
            <h5 class="text-left text-uppercase font-weight-bold" style="font-size: 13px">Documento Dirigido a: {{$info->nombre_proveedor}}</h5>
        </div>
        <p style="font-size: 14px">Por medio del presente documento, SURTIDORA LAINEZ ("{{$info->nombre_sucursal}}"), notifica la venta de una
            motocicleta con las siguientes caracteristicas:</p>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="font-size: 14px">Marca</th>
                <th style="font-size: 14px">Modelo</th>
                <th style="font-size: 14px">Colocr</th>
                <th style="font-size: 14px">Chasis</th>
                <th style="font-size: 14px">Motor</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 14px">{{$info->nombre_marca}}</td>
                    <td style="font-size: 14px">{{$info->nombre_mod}}</td>
                    <td style="font-size: 14px">{{$info->color}}</td>
                    <td style="font-size: 14px">{{$info->chasis}}</td>
                    <td style="font-size: 14px">{{$info->motor}}</td>
                </tr>
            </tbody>
        </table>
        <p style="font-size: 14px">La cual tiene origen de: </p>
        <table class="table table-sm">
            <thead>
            <tr>
                <th class="text-center" style="font-size: 14px">Numero de transferencia</th>
                <th class="text-center" style="font-size: 14px">Fecha de ingreso a la tienda</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center" style="font-size: 14px">{{$info->num_transferencia}}</td>
                    <td class="text-center" style="font-size: 14px">{{$info->fecha_entrada}}</td>
                </tr>
            </tbody>
        </table>
        <p style="font-size: 14px">Por lo que autorizamos a, para la facturacion de la motocicleta descrita anteriormente a
            nombre de: </p>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="font-size: 14px">Nombre Completo</th>
                <th style="font-size: 14px">Identidad</th>
                <th style="font-size: 14px">Rtn</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 14px">{{$info->nombres}} {{$info->apellidos}}</td>
                    <td style="font-size: 14px">{{$info->identidad}}</td>
                    <td style="font-size: 14px">{{$info->rtn}}</td>
                </tr>
            </tbody>
        </table>
        <p style="font-size: 14px">Asi como tambien solicitamos el envio de los documentos necesarios para circular, como ser Boleta
            de Revision, Permiso para circular sin placa.</p>
        <span style="font-size: 8px">VB Marlon Omar Santos Lainez</span>
        <div class="d-flex justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="row">
                    <img src="sello.png" alt="" style="width: 85px; height: 58px;margin-left: 300px">
                </div>
                <div class="row">
                    <img src="firma.png" alt="" style="width: 140px; height: 80px; margin-left: 300px">
                </div>
                <div>
                    <h6 class="text-center" style="font-size: 12px; margin-top: 70px">{{$info->nombre_colaborador}}</h6>
                    <hr>
                    <h6 style="font-size: 9px">Este es un documentos oficial de Surtidora Lainez. Contactanos: willydasane@gmail.com Tel.9959-5625.</h6>
                </div>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
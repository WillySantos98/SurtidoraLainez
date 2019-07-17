<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">
    @foreach($consultaO as $info)
        <div class="d-flex justify-content-between">
            <div>
                <img src="logo2.png" alt="" style="opacity: 0.5; width: 50px;height: 35px" >
            </div>
            <div class="col-sm-12">
                <h3 class="text-center text-uppercase font-weight-bold">Surtidora Lainez</h3>
                <h6 class="text-center text-uppercase" style="font-size: 14px">{{$info->direccion}}</h6>
                <hr>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div>
                <h6 class="font-weight-bold" style="font-size: 10px;">Transferencia # {{$info->cod_transferencia}}</h6>
            </div>
            <div>
                <h4 class="text-center">Transferencia Entre Tiendas</h4>
            </div>
        </div>
    <table class="table table-sm">
        <thead>
        <tr>
            <th style="font-size: 12px">Almacen de Origen</th>
            <th style="font-size: 12px">Encargado de Despachar</th>
            <th style="font-size: 12px">Usuario Solicitante</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="font-size: 12px">{{$info->nombre_suc}}</td>
            <td style="font-size: 12px">{{$info->nombre_col}}</td>
            <td style="font-size: 12px">{{$info->usuario}}</td>
        </tr>
        </tbody>
    </table>
    @endforeach
    @foreach($consulta2 as $info)
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="font-size: 12px">Almacen de Origen</th>
                <th style="font-size: 12px">Encargado de Recibir</th>
                <th style="font-size: 12px">Usuario que Autorizo</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 12px">{{$info->nombre_suc}}</td>
                    <td style="font-size: 12px">{{$info->nombre_col}}</td>
                    <td style="font-size: 12px">{{$info->usuario}}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
    <h5 class="text-center">Datos de las Motocicletas</h5>
    <table class="table table-sm">
        <thead>
        <tr>
            <th style="font-size: 12px">codigo</th>
            <th style="font-size: 12px">Chasis</th>
            <th style="font-size: 12px">Motor</th>
            <th style="font-size: 12px">Marca</th>
            <th style="font-size: 12px">Modelo</th>
            <th style="font-size: 12px">Color</th>
        </tr>
        </thead>
        <tbody>
        @foreach($motos as $info)
        <tr>
            <td style="font-size: 11px">{{$info->id_moto}}</td>
            <td style="font-size: 11px">{{$info->chasis}}</td>
            <td style="font-size: 11px">{{$info->motor}}</td>
            <td style="font-size: 11px">{{$info->nombre}}</td>
            <td style="font-size: 11px">{{$info->nombre_mod}}</td>
            <td style="font-size: 11px">{{$info->color}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
        <hr>
    <p>Fecha que se Envio la Transferencia:____________________________________</p>
    <p>Fecha que se Recibio la Transferencia:___________________________________</p>
    <p>Nombre del Motorista:________________________________________________</p>
    <p>Observaciones:___________________________________________________________________</p>
    <p>________________________________________________________________________________</p>
    <p>________________________________________________________________________________</p>
    <p>________________________________________________________________________________</p>
        <br>
    <p>Nombre del que Recibio:______________________________________________</p>
        <hr>
        <h6 style="font-size: 9px">Este es un documento oficial de SURTIDORA LAINEZ</h6>
</div>
</body>
</html>
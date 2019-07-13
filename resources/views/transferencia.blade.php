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
            <th>Almacen de Origen</th>
            <th>Encargado de Despachar</th>
            <th>Usuario Solicitante</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$info->nombre_suc}}</td>
            <td>{{$info->nombre_col}}</td>
            <td>{{$info->usuario}}</td>
        </tr>
        </tbody>
    </table>
    @endforeach
    @foreach($consulta2 as $info)
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Almacen de Origen</th>
                <th>Encargado de Recibir</th>
                <th>Usuario que Autorizo</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$info->nombre_suc}}</td>
                    <td>{{$info->nombre_col}}</td>
                    <td>{{$info->usuario}}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
    <h5 class="text-center">Datos de las Motocicletas</h5>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>codigo</th>
            <th>Chasis</th>
            <th>Motor</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
        </tr>
        </thead>
        <tbody>
        @foreach($motos as $info)
        <tr>
            <td>{{$info->id_moto}}</td>
            <td>{{$info->chasis}}</td>
            <td>{{$info->motor}}</td>
            <td>{{$info->nombre}}</td>
            <td>{{$info->nombre_mod}}</td>
            <td>{{$info->color}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
        <hr>
</div>
</body>
</html>
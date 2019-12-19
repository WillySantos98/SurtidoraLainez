<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .tamano1{
            font-size: 6px;
        }
        .espaciado1{
            padding-top: 0;
        }
        .tamano2{
            font-size: 8px;
        }
        .float1{
            float: right;
        }
        .estilo1{
            font-weight: bold;
        }
    </style>
</head>
<body>
<h6 class="text-center"><strong>SURTIDORA LAINEZ</strong></h6>
@foreach($consulta as $c)
    <h6 class="text-center tamano1 espaciado1">{{$c->direccion}}. Telefono: {{$c->telefono}}</h6>
    <div class="espaciado1 tamano2">
        Cuenta:{{$cuenta}}
        <div class="float1">
            Fecha: {{$c->fecha}}
        </div>
    </div>
    <div class="espaciado1 tamano2">
        Nombre: {{$c->nombres}} {{$c->apellidos}}
    </div>
    <div class="espaciado1 tamano2">
        Identidad: {{$c->identidad}}
    </div>
    <h6 class="text-center tamano2">Desgloce del Abono</h6>
    <table class="table table-sm tamano1">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th>Pago</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cuerpo as $filas)
            <tr>
                <td>{{$filas->descripcion}}</td>
                <td>L.{{$filas->paga}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6 class="text-center tamano2">Estado de la Cuenta</h6>
    <table class="table table-sm table-bordered tamano1">
        <thead>
        <tr>
            <th>Saldo Anterior</th>
            <th>Total a Pagar</th>
            <th>Saldo Actual</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>L.{{$c->saldo_anterior}}</td>
            <td>L.{{$c->total_pagar}}</td>
            <td>L.{{$c->saldo_actual}}</td>
        </tr>
        </tbody>
    </table>
    <h6 class="tamano1">Usuario creador: {{$c->name}}</h6>

@endforeach
</body>
</html>

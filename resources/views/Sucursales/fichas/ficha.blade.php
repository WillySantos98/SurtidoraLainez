@extends('Index.base')
@section('title', 'Surtidora Lainez - Ficha de Sucursal')
@section('content')

    @foreach($Sucursal as $sucursal)
        <div class="row">
            <div class="col">
                <h1 class="text-center">{{$sucursal->nombre}}</h1>
                <div class="row">
                    <div class="col"><a href="/sucursales">Volver atras</a></div>
                    <div class="col">Abreviatura: {{$sucursal->slug}}</div>
                    <div class="col">Telefono: {{$sucursal->telefono}}</div>
                    <div class="col">Correo: {{$sucursal->email}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Direccion: {{$sucursal->direccion}}
            </div>
        </div>
        <hr>
    @endforeach
    <h3 class="text-center">Calaboradores de la Sucursal</h3>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Puesto</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Historial</th>
        </tr>
        </thead>
        <tbody>
            @foreach($ConsultaSucursalCol as $colaborador)
                <tr>
                    <td class="text-center">{{$colaborador->nombre}}</td>
                    <td class="text-center">{{$colaborador->email}}</td>
                    <td class="text-center">{{$colaborador->telefono}}</td>
                    <td class="text-center">{{$colaborador->nombre_tc}}</td>
                    @if($colaborador->estado == 1)
                        <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
                    @else
                        <td class="text-center"><span class="badge badge-danger"><i data-feather="user-x"></i></span></td>
                    @endif
                    <td class="text-center"><a href="/../../colaborador/{{$colaborador->id}}">Ver Historial...</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@extends('Index.base')
@section('title', 'Motocicletas')
@section('content')
    <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">Total de Motocicletas en piso: {{$totalMotos}}</div>
        <div class="p-2 bd-highlight">
                <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
        </div>
    </div>
    <div class="container-fluid" style="overflow-y: scroll; height: 550px">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Codigo</th>
                    <th>Ubicacion</th>
                    <th>Ficha</th>
                </tr>
            </thead>
            <tbody id="bodyTable">
                @foreach($motos as $moto)
                    <tr>
                        <td>{{$moto->nombre_mar}}</td>
                        <td>{{$moto->nombre_mod}}</td>
                        <td>{{$moto->color}}</td>
                        <td>{{$moto->codigo}}</td>
                        <td>{{$moto->nombre_su}}</td>
                        <td><a href="/inventario/motocicletas/ficha/{{$moto->codigo}}">Ver ficha</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('Index.componentes.buscador')
@endsection
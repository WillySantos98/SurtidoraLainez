@extends('Index.base')
@section('title', 'Cotizaciones Ventas Declinadas')
@section('content')

    <div class="card border-left-primary">
        <div class="row" style="padding: 5px">
            <div class="col">@include('Index.componentes.ButtonBack')</div>
            <div class="col"><h4>Cotizaciones De Ventas Declinadas</h4></div>
            <div class="col"><div class="p-2 bd-highlight">
                    <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
                </div></div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-responsive-lg table-sm table-hover" style="font-size: 13px">
                    <thead>
                    <tr>
                        <th>Fecha Creacion</th>
                        <th>Codigo</th>
                        <th>Nombre del Cliente Potencial</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio Final</th>
                        <th>ver</th>
                    </tr>
                    </thead>
                    <tbody id="TableBody">
                    @foreach($cotizaciones as $cotizacion)
                        <tr>
                            <td>{{$cotizacion->fecha_creacion}}</td>
                            <td>{{$cotizacion->cod_cotizacion}}</td>
                            <td>{{$cotizacion->nombre_interesado}} {{$cotizacion->apellido_interesado}}</td>
                            <td>{{$cotizacion->nombre}}</td>
                            <td>{{$cotizacion->nombre_mod}}</td>
                            <td>L.{{$cotizacion->total_pagar}}</td>
                            <td><a href="/documentos/cotizaciones/cotizaciones_ventas_aceptadas/{{$cotizacion->cod_cotizacion}}">Ver Cotizacion</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#TableBody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

@endsection

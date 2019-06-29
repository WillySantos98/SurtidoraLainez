@extends('Index.base')
@section('title', 'Inventario por Sucursal')
@section('content')

<div class="container-fluid">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight">
            <form action="">
                <div class="form-group" style="width: 40%">
                    <select class="form-control" name="SelectSucursal" id="SelectSucursal" onchange="cargarInventarioSucursal(this.value)">
                        <option value="#">Seleccionar Sucursal</option>
                        @foreach($sucursales as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="p-2 bd-highlight">
            <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
        </div>
    </div>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Ano</th>
            <th>Codigo de la Motocicleta</th>
            <th>Chasis</th>
            <th>Motor</th>
            <th>Hubicacion Actual</th>
            <th>Ficha</th>
        </tr>
        </thead>
        <tbody id="BodyInventarioSucursal">

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#BodyInventarioSucursal tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@endsection

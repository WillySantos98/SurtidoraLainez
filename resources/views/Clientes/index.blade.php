@extends('Index.base')
@section('title', 'Clientes')
@section('content')
    @include('Index.componentes.status')
<h3 class="text-center">Existencia de Clientes</h3>

<div class="container-fluid w-75" style="overflow-y: scroll; height: 450px">
    <button class="btn btn-info p-2 bd-highlight" style="background-color: white; border: grey;">
        <input class="form-control" id="myInput" type="text" placeholder="Buscar cliente..."></button>
    <a href="/cliente_nuevo" class="btn btn-primary">Registrar Nuevo Cliente</a>
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>Identidad</th>
            <th>Rtn</th>
            <th>Mas Informacion</th>
        </tr>
        </thead>
        <tbody id="MyTable" class="TableBodyClientes">
        @foreach($clientes as $item)
            <tr>
                <td>{{$item->nombres}} {{$item->apellidos}}</td>
                <td>{{$item->identidad}}</td>
                <td>{{$item->rtn}}</td>
                <td><a href="clientes/perfil/{{$item->id}}">Mas...</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--        {!! $clientes->render() !!}--}}
</div>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log("funciona");
            $("#MyTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

    });



</script>
@endsection
{{--@section('js')--}}
{{--    {!! Html::script('js/Tablaclientes.js') !!}--}}
{{--@endsection--}}

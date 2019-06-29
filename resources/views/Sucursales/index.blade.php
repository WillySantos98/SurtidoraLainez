@extends('Index.base')
@section('title', 'Sucursales')
@section('content')

    @include('Index.componentes.any')
    @include('Index.componentes.status')


<div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2 bd-highlight">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewSucursal">
            Agregar Sucursal
        </button>
    </div>
</div>

    <div style="overflow-y: scroll; height: 350px">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" class="text-center">Nombre de la Sucursal</th>
                <th scope="col" class="text-center">Abreviatura</th>
                <th scope="col" class="text-center">Correo Electronico</th>
                <th scope="col" class="text-center">Telefono</th>
                <th scope="col" class="text-center">Estado</th>
                <th scope="col" class="text-center">Mas infomacion</th>
            </tr>
            </thead>
            <tbody id="myTable">
            @foreach($Sucursal as $sucursal)
                <tr>
                    <td class="text-center">{{$sucursal->nombre}}</td>
                    <td class="text-center">{{$sucursal->slug}}</td>
                    <td class="text-center">{{$sucursal->email}}</td>
                    <td class="text-center">{{$sucursal->telefono}}</td>
                    @if($sucursal->estado == 1)
                        <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
                    @else
                        <td class="text-center"><span class="badge badge-danger"><i data-feather="user-x"></i></span></td>
                    @endif
                    <td class="text-center"><a href="sucursales/{{$sucursal->slug}}">Mas...</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
<div class="modal fade" id="ModalNewSucursal" tabindex="-1" role="dialog" aria-labelledby="ModalNewSucursal" aria-hidden="true">
    @include('Sucursales.modals.ModalNewSucursal')
</div>
<script>
    feather.replace()
</script>

@endsection
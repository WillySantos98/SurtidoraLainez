@extends('Index.base')
@section('title', 'Contactos de Proveedores')
@section('content')

<div class="container-fluid w-75">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <p>
                    {{$error}}
                </p>
            @endforeach
        </div>
    @endif

        <h2>Contacto de Proveedores</h2>
        <hr>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewContacto">
                Agregar un un Contacto Nuevo
            </button>
            <button class="btn btn-info p-2 bd-highlight" style="background-color: white; border: grey;">
                <input class="form-control" id="myInputC" type="text" placeholder="Buscar..."></button>
        </div>
        <hr>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Nombre del Proveedor</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo Electronico</th>
        <th scope="col">Telefono</th>
        <th scope="col">Estado</th>
        <th scope="col">Funcion</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody id="myTable">
    @foreach($contactos as $contacto)
        <tr>
            <td>{{$contacto->nombre_p}}</td>
            <td>{{$contacto->nombre}}</td>
            <td>{{$contacto->email}}</td>
            <td>{{$contacto->telefono}}</td>
            @if($contacto->estado == 1)
                <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
            @else
                <td class="text-center"><span class="badge badge-danger"><i data-feather="user-x"></i></span></td>
            @endif
            <td>{{$contacto->tipo}}</td>
            <td class="text-center">
                <a type="button" class="btn btn" style="background-color: orangered; padding: 0px"  data-toggle="modal" data-target="#ModalEditContacto"
                   data-id="{{$contacto->id}}"
                   data-nombrep="{{$contacto->nombre_p}}"
                    data-email="{{$contacto->email}}"
                    data-tel="{{$contacto->telefono}}"
                    data-nombre="{{$contacto->nombre}}"
                    data-funcion="{{$contacto->tipo}}">
                    <span class="badge badge-danger"><i data-feather="edit"></i></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



<div class="modal fade " id="ModalNewContacto" tabindex="-1" role="dialog" aria-labelledby="ModalNewContacto" aria-hidden="true">
    @include('Proveedores.modals.ModalNewContacto')
</div>
<div class="modal fade " id="ModalEditContacto" tabindex="-1" role="dialog" aria-labelledby="ModalEditContacto" aria-hidden="true">
    @include('Proveedores.modals.ModalEditContacto')
</div>

<script>
    $(document).ready(function(){
        $("#myInputC").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log("funciona");
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
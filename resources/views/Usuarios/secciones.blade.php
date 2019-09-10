@extends('Index.base')
@section('title', 'Usuarios-Secciones')
@section('content')
<div class="container-fluid">
    <hr>
    <div class="d-flex justify-content-center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#ModalCrearSeccionesMenu">Crear Secciones del Menu</button>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#ModalCrearSub-seccionesMenu">Crear Sub-secciones del Menu</button>
            <button type="button" class="btn btn-outline-secondary">Crear Tipo de Usuarios</button>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#ModalTipoUsuarios">Asignar Permisos a los Tipo de Usuarios</button>
            <button type="button" class="btn btn-outline-secondary">Asignar Permisos a Usuario</button>
        </div>
    </div>
    <hr>
    <div id="CuerpoCreacionSeccionesUsuarios">
        <p>1. Cuando se crea una seccion esta creando una carpeta.</p>
        <p>2. Cuando se crea una sub-seccion esta creando una sub-carpeta. Tiene que relacionar la sub-seccion a una seccion ya existente.</p>
{{--        <p>3. Cuando se crea una sub-seccion esta creando una sub-carpeta. Tiene que relacionar la sub-seccion a una seccion ya existent.</p>--}}
{{--        <p>3. Cuando se crea una sub-seccion esta creando una sub-carpeta. Tiene que relacionar la sub-seccion a una seccion ya existent.</p>--}}
{{--        <p>3. Cuando se crea una sub-seccion esta creando una sub-carpeta. Tiene que relacionar la sub-seccion a una seccion ya existent.</p>--}}
    </div>

</div>


@include('Usuarios.Modals.ModalCrearSeccionesMenu')
@include('Usuarios.Modals.ModalCrearSub-seccionesMenu')
@include('Usuarios.Modals.ModalTipoUsuarios')


@endsection

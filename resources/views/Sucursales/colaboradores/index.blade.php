@extends('Index.base')
@section('title', 'Surtidora Lainez - Colaboradores')
@section('content')

    @include('Sucursales.formularios.TipoColaborador')

    <div class="card shadow mb-4">
        <a href="#collapse-tipocolaboradores" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
            <h6 class="m-0 font-weight-bold text-primary">Tipos de Colaboradores</h6>
        </a>
        @include('Sucursales.tablas.TablaTipoColaboradores')
    </div>
    <hr>
    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewColaborador">
                Agregar Nuevo Colaborador
            </button>
        </div>
    </div>
    <h4 class="text-center">Colaboradores de Surtidora Lainez</h4>
    <hr>

    @include('Sucursales.tablas.TablaColaboradores')

    <div class="modal fade" id="ModalNewColaborador" tabindex="-1" role="dialog" aria-labelledby="ModalNewColaborador" aria-hidden="true">
        @include('Sucursales.modals.ModalNewColaborador')
    </div>
@endsection

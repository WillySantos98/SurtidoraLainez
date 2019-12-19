@extends('Index.base')
@section('title', 'Proveedores')
@section('content')
    @include('Proveedores.formProveedor')
    <hr>
    <div class="container-fluid w-75">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewMarca">
                    Agregar una Nueva Marca
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewModelo">
                    Agregar un Nuevo Modelo
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewTipoVehiculo">
                    Agregar un Nuevo Tipo de Vehiculo
                </button>
            </div>
        </div>
        <hr>

        <div class="card shadow mb-4">
        <a href="#collapse-tipovehiculo" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
            <h6 class="m-0 font-weight-bold text-primary">Tipos de Vehiculos</h6>
        </a>
            <div class="collapse" id="collapse-tipovehiculo">
                <div class="card-body">
                    <div style="overflow-y: scroll; height: 200px">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad de Ruedas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipovehiculo as $tv)
                                <tr>
                                    <th>{{$tv->nombre_v}}</th>
                                    <th>{{$tv->ruedas}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 style="margin-top: 10px">Proveedores</h3>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col">
               <div style="overflow-y: scroll; height: 300px">
                   @foreach($proveedores as $proveedor)
                       <div class="card shadow mb-4">
                           <a href="#collapse-{{$proveedor->id}}" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                               <h6 class="m-0 font-weight-bold text-primary">{{$proveedor->nombre}}</h6>
                           </a>
                           <div class="collapse" id="collapse-{{$proveedor->id}}">
                               <div class="card-body">
                                   <div style="overflow-y: scroll; height: 250px">
                                       <table class="table table-hover table-striped">
                                           <thead>
                                           <tr>
                                               <th>Nombre de Marca</th>
                                               <th>Nombre de Modelo</th>
                                               <th>Tipo de Vehivulo</th>
                                               <th>cilindraje</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           @foreach($modelos as $models)
                                               @if($models->proveedor_id == $proveedor->id)
                                                   <tr>
                                                       <th>{{$models->nombre}}</th>
                                                       <th>{{$models->nombre_mod}}</th>
                                                       <th>{{$models->nombre_v}}</th>
                                                       <th>{{$models->cilindraje}}-cc</th>
                                                   </tr>
                                               @endif
                                           @endforeach
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach
               </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="ModalNewMarca" tabindex="-1" role="dialog" aria-labelledby="ModalNewMarca" aria-hidden="true">
        @include('Proveedores.modals.ModalNewMarca')
    </div>








    <div class="modal fade" id="ModalNewModelo" tabindex="-1" role="dialog" aria-labelledby="ModalNewModelo" aria-hidden="true">
        @include('Proveedores.modals.ModalNewModelo')
    </div>
    <div class="modal fade" id="ModalNewTipoVehiculo" tabindex="-1" role="dialog" aria-labelledby="ModalNewTipoVehiculo" aria-hidden="true">
        @include('Proveedores.modals.ModalNewTipoVehiculo')
    </div>

    <script>
        feather.replace()
    </script>

@endsection

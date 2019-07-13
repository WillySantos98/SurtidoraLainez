@extends('Index.base')
@section('title', 'Transferencias')
@section('content')
<div class="container-fluid">
    <h4 class="text-center">Transferencia Entre Tiendas</h4>

    <form action="{{route('save.transferencia')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Almacen de Origen</label>
                    <select name="SelectAlmacenOrigen" id="SelectAlmacenOrigen" class="form-control" onchange="cargarEmpleados2(this.value)">
                        <option value="">-----</option>
                        @foreach($almacenes as $info)
                            <option value="{{$info->id}}">{{$info->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="text" value="{{Auth::user()->id}}" hidden name="IdUsuario">
            <div class="col">
                <div class="form-group">
                    <label for="">Encargado de Despachar</label>
                    <select name="SelectEncargadoOrigen" id="SelectEmpleadoSucursal2" class="form-control">
                        <option value="">-----</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Almacen de Destino</label>
                    <select name="SelectAlmacenDestino" id="SelectAlmacenDestino" class="form-control" onchange="cargarEmpleados(this.value)">
                        <option value="">-----</option>
                        @foreach($almacenes as $info)
                            <option value="{{$info->id}}">{{$info->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Encargado de Recibir</label>
                    <select name="SelectEncargadoDestino" id="SelectEmpleadoSucursal" class="form-control">
                        <option value="">-----</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Fecha Peticion</label>
                    <input type="date" name="FechaPeticion" class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#ModalBuscarMotoTransferencia"
        > <i class="fa fa-motorcycle" aria-hidden="true"> Buscar Motocicleta</i></button>
        <div style="overflow-y: scroll; height: 300px; margin-top: 10px">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Chasis</th>
                    <th>Motor</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Hubicacion Actual</th>
                    <th>Quitar</th>
                </tr>
                </thead>
                <tbody id="tBodyFormTransferenciaInterna">

                </tbody>
            </table>
        </div>
        <input type="submit" class="btn btn-outline-success" value="Solicitar Transferencia" style="margin-top: 10px">
    </form>
</div>

<div class="modal fade bd-example-modal-xl" id="ModalBuscarMotoTransferencia" tabindex="-1" role="dialog" aria-labelledby="ModalBuscarMotoTransferencia" aria-hidden="true">
@include('Inventario.Motocicletas.Transferencias.Modals.ModalMotocicletas')
</div>


@endsection

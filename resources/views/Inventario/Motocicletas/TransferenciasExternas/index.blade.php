@extends('Index.base')
@section('title', 'Transferencia Externa')
@section('content')
    <div class="container-fluid">
        <h4 class="text-center">Transferencia Externa</h4>
        <form action="{{route('transferenciasExternas.form.save')}}" method="post">
            @csrf
            <div class="row">
                <div class="col form-group">
                    <select name="SelectSucursal" id="" required class="form-control" onchange="cargarEmpleados2(this.value)">
                        <option value="#">Seleccione una Sucursal</option>
                        @foreach($sucursales as $sucursal)
                            <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" value="{{Auth::User()->id}}" hidden name="InputIdUsuario">
                <input type="text" value="{{Auth::User()->usuario}}" hidden name="InputUsuario">
                <div class="col form-group">
                    <select required class="form-control" name="SelectEmpleadoSucursal" id="SelectEmpleadoSucursal2">

                    </select>
                    <span>Seleccione el encargado de la Salida</span>
                </div>
                <div class="col form-group">
                    <input type="text" placeholder="Numero de Documento de Transferencia" required class="form-control" name="InputNumTransferencia">
                    <span>Numero de Transferencia</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="InputDestino" required placeholder="Destino de la Transferencia" class="form-control">
                    <span>Ejemplo: nombre comercial, ciudad, departamento</span>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" name="InputObservacion" class="form-control" required value="Sin Observaciones">
                </div>
                <div class="col form-group">
                    <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#ModalBuscarMotoTransferencia"
                    > <i class="fa fa-motorcycle" aria-hidden="true"> Buscar Motocicleta</i></button>
                </div>
            </div>

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
            <hr>
            <input type="submit" class="btn btn-outline-primary" value="Realizar Transferencia">
        </form>

        <div class="modal fade bd-example-modal-xl" id="ModalBuscarMotoTransferencia" tabindex="-1" role="dialog" aria-labelledby="ModalBuscarMotoTransferencia" aria-hidden="true">
            @include('Inventario.Motocicletas.Transferencias.Modals.ModalMotocicletas')
        </div>



@endsection

@extends('Index.base')
@section('title', 'Registro-consignacion')
@section('content')
<div class="container-fluid w-100">
    <h5 class="text-center">Entrada de Motocicletas Consignadas</h5>
    <hr>
    <form action="{{route('consignada.registro.save')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col form-group">
                <label for="">Tipo de Entrada</label>
                <select class="form-control" required name="SelectEntrada" id="SelectEntrada" >
                    <option value="-">-----</option>
                    @foreach($tipo_entradas as $Entradas)
                        <option value="{{$Entradas->id}}">{{$Entradas->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="">Sucursal</label>
                <select class="form-control" required name="SelectSucursal" id="SelectSucursal" onchange="cargarEmpleados(this.value);">
                    <option value="-">-----</option>
                    @foreach($sucursales as $itemSucursales)
                        <option value="{{$itemSucursales->id}}">{{$itemSucursales->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="">Empleados</label>
                <select required class="form-control" name="SelectEmpleadoSucursal" id="SelectEmpleadoSucursal">

                </select>
            </div>
            <div class="col form-group">
                <label for="">Proveedor</label>
                <select class="form-control" required name="SelectProveedor" id="SelectProveedor" onchange="cargarmarcas(this.value)">
                    <option value="-">---------------</option>
                    @foreach($proveedor as $itemProveedor)
                        <option value="{{$itemProveedor->id}}">{{$itemProveedor->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for=""># Documento de Entrada</label>
                <input type="text" name="Usuario" hidden value="{{Auth::user()->id}}">
                <input type="text" class="form-control" required name="Remision" placeholder="# de documento">
                <span >(Numero de factura o guia de remision)</span>
            </div>
            <div class="col form-group">
                <label for=""># Transferencia</label>
                <input type="text" class="form-control" name="Trasferencia" placeholder="# de Transferencia">
                <span >(*Si no trae # de transferencia dejar vacio)</span>
            </div>
            <div class="col-2 form-group">
                <label for="">Fecha de Entrada</label>
                <input type="date"  class="form-control" name="FechaEntrada" required>
            </div>
            <div class="col-1 form-group" style="margin-top:32px">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalSeleccionModelo">
                <i class="fa fa-plus" aria-hidden="true"> Moto</i>
              </button>
            </div>
          <!--  <div class="col-1 form-group" style="margin-top:32px">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalSubirDocumentos">
                    <i class="fa fa-file" aria-hidden="true"> Doc</i>
                </button>
            </div>
            -->

        </div>

        <div style="overflow-y: scroll; height: 350px;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Modelo</th>
                <th># de Chasis</th>
                <th># de Motor</th>
                <th>Año</th>
                <th>Color</th>
                <th>Observacion</th>
              </tr>
            </thead>
            <tbody  id="CuerpoFormularioConsignado">

            </tbody>
          </table>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar Entrada de Motocicletas</button>
        </div>
    </form>

</div>

<div class="modal fade" id="ModalSeleccionModelo" tabindex="-1" role="dialog" aria-labelledby="ModalSeleccionModelo" aria-hidden="true">
    @include('Inventario.Motocicletas.Registro.Consignadas.modals.ModalModelo')
</div>
<div class="modal fade" id="ModalSubirDocumentos" tabindex="-1" role="dialog" aria-labelledby="ModalSubirDocumentos" aria-hidden="true">
    @include('Inventario.Motocicletas.Registro.Consignadas.modals.ModalSubirDocumentos')
</div>

<script>

$(document).ready(function () {
    $('#AgregarRegistrosConsignacion').click(function () {
        var modelo = document.getElementById("ModeloFormConsignacion").value;
        var chasis = document.getElementById("NumChasisFormConsignacion").value;
        var motor = document.getElementById("NumMotorFormConsignacion").value;
        let color = document.getElementById("ColorFormConsignacion").value;
        let ano = document.getElementById("AnoFormConsignacion").value;
        let observacion = document.getElementById("ObservacionFormConsignacion").value;
        let idMarca = document.getElementById("IdMarcaFormConsignacion").value;
        let idModelo = document.getElementById("IdModeloFormConsignacion").value;
        $('#CuerpoFormularioConsignado').append('<tr>' +
            '<td>' +
            '<input type="text" class="form-control" value="'+idModelo+'" HIDDEN  required name="Modelo[]">' +
            '<input type="text" class="form-control" value="'+idMarca+'" hidden required name="Marca[]">' +
            '<input type="text" class="form-control" value="'+modelo+'" readonly required >' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" value="'+chasis+'" required name="Chasis[]">' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" value="'+motor+'" required name="Motor[]">' +
            '</td>' +
            '<td>' +
            '<input type="number" class="form-control" value="'+ano+'" required name="Ano[]">' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" value="'+color+'" required name="Color[]">' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" value="'+observacion+'" required name="Observacion[]">' +
            '</td>' +
            '</tr>');
    });
    $(document).on('click', '.btn_remove', function () {
        $(this).parent().parent().remove();
    });
});
</script>

@endsection

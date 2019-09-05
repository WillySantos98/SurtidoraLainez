@extends('Index.base')
@section('title', 'Registro-consignacion')
@section('content')
<div class="container-fluid w-100">
    <h5 class="text-center">Entrada de Motocicletas Consignadas</h5>
    <hr>
    <form action="{{route('consignada.registro.save')}}" method="post" onchange="FormRegistroMoto()" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col form-group">
                <label for="">Tipo de Entrada</label>
                <select class="form-control" required  name="SelectEntrada" id="SelectEntrada" >
                    <option value="-">-----</option>
                    @foreach($tipo_entradas as $Entradas)
                        <option value="{{$Entradas->id}}">{{$Entradas->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="">Sucursal de Entrada</label>
                <select class="form-control" required name="SelectSucursal" id="SelectSucursal" onchange="cargarEmpleados(this.value);">
                    <option value="-">-----</option>
                    @foreach($sucursales as $itemSucursales)
                        <option value="{{$itemSucursales->id}}">{{$itemSucursales->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="">Empleado Responsable de Entrada</label>
                <select required class="form-control" name="SelectEmpleadoSucursal" id="SelectEmpleadoSucursal">

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <input type="text" name="Usuario" hidden value="{{Auth::user()->id}}">
                <label for="">Proveedor</label>
                <select class="form-control" required name="SelectProveedor" id="SelectProveedor" onchange="cargarmarcas(this.value)">
                    <option value="-">---------------</option>
                    @foreach($proveedor as $itemProveedor)
                        <option value="{{$itemProveedor->id}}">{{$itemProveedor->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="">Numero de Transferencia</label>
                <input type="text" class="form-control" id="FormRegistroMoto-Transferencia" name="Trasferencia" placeholder="# de Transferencia">
            </div>
            <div class="col-2 form-group">
                <label for="">Fecha de Entrada</label>
                <input type="date"  class="form-control" id="FormRegistroMoto-Fecha" name="FechaEntrada" required>
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
          <table class="table table-hover table-responsive-lg">
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
            <button type="submit"  id="Boton-Submit-Form" class="btn btn-primary">Guardar Entrada de Motocicletas</button>

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
    let val = 0
    $('#AgregarRegistrosConsignacion').click(function () {
        val += 1
        console.log(val)
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
            '<input type="text" class="form-control" id="FormRegistroMoto-Chasis-'+val+'" value="'+chasis+'" required name="Chasis[]">' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" id="FormRegistroMoto-Moto-'+val+'" value="'+motor+'" required name="Motor[]">' +
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

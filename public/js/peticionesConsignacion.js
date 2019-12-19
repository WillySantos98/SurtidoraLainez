function cargarEmpleados(val) {
    var id = val;
    let html = "<option value=''>-----</option>";
    axios.get('/cargar_empleados/'+id).
    then(function (empleados) {
        for(var i=0; i< empleados.data.length; i++){
            html +=`
                    <option value="${empleados.data[i].id}">${empleados.data[i].nombre}</option>
                `
        }
        var elemento = document.getElementById('SelectEmpleadoSucursal');
        elemento.innerHTML=html;
    });
}

function cargarEmpleadosMo(val) {
    var id = val;
    let html = "<option value='-'>-----</option>";
    axios.get('/cargar_empleados/'+id).
    then(function (empleados) {
        for(var i=0; i< empleados.data.length; i++){
            html +=`
                    <option value="${empleados.data[i].id}">${empleados.data[i].nombre}</option>
                `
        }
        var elemento = document.getElementById('SelectEmpleadoSucursal');
        elemento.innerHTML=html;
    });
    let html2 = '';
    axios.get('/cargar_motos_x_sucursal/'+id).
        then(function (motos) {
            console.log(motos.data);
        for (var e = 0; e<motos.data.length; e++){
            html2 += `
                <tr>
                    <td>${motos.data[e].id_moto}</td>
                    <td>${motos.data[e].nombre_mar}</td>
                    <td>${motos.data[e].nombre_mod}</td>
                    <td>${motos.data[e].chasis}</td>
                    <td>${motos.data[e].motor}</td>
                    <td>${motos.data[e].color}</td>
                    <td><button class="btn btn-success" data-dismiss="modal" value="${motos.data[e].id}.${motos.data[e].nombre_mar}.
                    ${motos.data[e].nombre_mod}.${motos.data[e].chasis}.${motos.data[e].motor}.${motos.data[e].color}" onclick="addMoto(this.value)">
                            <i class="fa fa-arrow-right" aria-hidden="true"> Seleccionar</i>
                        </button>
                    </td>
                </tr>
            `
        }
        var elemento2 = document.getElementById('bodyTableMotoE');
        elemento2.innerHTML = html2;
    });
}


function cargarmodelos(val) {
    var id = val;
    let html ='<option value="'+0+'">-----</option>';
    axios.get('/cargar_modelos/'+id).
        then(function (modelos) {
        for(var i=0; i< modelos.data.length; i++){
            html +=`
                    <option value="${modelos.data[i].id}">${modelos.data[i].nombre_mod}</option>
                `
        }
        var elemento = document.getElementById('SelectModelo');
        elemento.innerHTML=html;
    })
}

function cargardatosmodelos(val) {
    var id = val;
    let html= '';
    let estado = 'PERFECTO ESTADO';
    axios.get('/cargar_datos_modelos/'+id).
        then(function (datosmodelos) {
        console.log(datosmodelos.data);
        for(var i=0; i< datosmodelos.data.length; i++){
            html +=`

            <div class="row form-group">
              <div class="col">
                <label>Marca</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].idm}" id="IdMarcaFormConsignacion"  class="form-control" hidden >
                <input type="text" value="${datosmodelos.data[i].nombre}"  class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Modelo</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].nombre_mod}" id="ModeloFormConsignacion" class="form-control" readonly>
                <input type="text" value="${datosmodelos.data[i].idmod}" hidden id="IdModeloFormConsignacion" class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Cilindraje</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].cilindraje} cc"  class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Tipo de Motocicleta</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].nombre_v}" class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Cantidad de Ruedas</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].ruedas}" class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label># de Chasis</label>
              </div>
              <div class="col">
                <input type="text" id="NumChasisFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label># de Motor</label>
              </div>
              <div class="col">
                <input type="text" id="NumMotorFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Color</label>
              </div>
              <div class="col">
                 <input type="text" id="ColorFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Ano</label>
              </div>
              <div class="col">
                 <input type="number" id="AnoFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Observacion</label>
              </div>
              <div class="col">
                <textarea class="form-control" id="ObservacionFormConsignacion" id="Observacion" value="PERFECTO ESTADO" rows="3"></textarea>
              </div>
            </div>
            
            
                `
        }
        var elemento = document.getElementById('CuerpoModalFormularioConsignado');
        elemento.innerHTML=html;
    })

}
$('#ModalEditEntrada').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('nombre');
    var modal = $(this);
    modal.find('.modal-header #tituloModalEditEntrada').html("Edicion de la entrada "+id);

    axios.get('/inventario/edit_entrada/'+id).then(
        function (entrada) {
            html = '';
            console.log(entrada.data);
            for (var i = 0; i<entrada.data.length; i++){
                html =`
                        <form action="{{route('edit.entrada')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Codigo de Entrada: </label>
                                    </div>
                                    <div class="col">
                                        <input name="InputCodEntrada" id="inputModalCodEntrada" class="form-control" type="text" readonly value="${entrada.data[i].cod_entrada}">
                                        <input name="InputIdentrada" class="form-control" type="text" hidden value="${entrada.data[i].id}">
                                        <input name="InputIdUser" class="form-control" type="text" hidden value="{{Auth::user()->id}}">
                                        <input name="InputUser" class="form-control" type="text" hidden value="{{Auth::user()->usuario}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for=""># de Transferencia: </label>
                                    </div>
                                    <div class="col">
                                        <input  class="form-control" name="InputNumTransferencia" type="text" value="${entrada.data[i].num_transferencia}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Fecha de Ingreso: </label>
                                    </div>
                                    <div class="col">
                                        <input  class="form-control" name="InputFecha" type="date" value="${entrada.data[i].fecha_entrada}">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                        </form>
                    `
            }

            document.getElementById("bodyModalEditEntrada").innerHTML = html;
            //document.getElementById('inputModalCodEntrada').readOnly = true;
        }
    )
});



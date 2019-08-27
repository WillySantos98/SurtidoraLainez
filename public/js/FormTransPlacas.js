var id_sucurdalOrigen = '';
var id_sucursalDestino = '';
function cargarSucursales(val) {
    id_sucurdalOrigen = val;
    axios.get('/cargar_almacenes').
    then(function (almacenes) {
        var html = '<option value="#">Seleccione un almacen</option>';
        for (let i = 0; i < almacenes.data.length; i++){
            if (almacenes.data[i].id != id_sucurdalOrigen){
                html +=`
                            <option value="${almacenes.data[i].id}">${almacenes.data[i].nombre}</option>
                        `
            }
        }

        document.getElementById("SelectAlmacenDestinoFormTransPlacas").innerHTML = html;
    });
}

function cargarPlacasSucursal(val) {
    id_sucursalDestino = val;
    axios.get('/cargar_placas/'+id_sucurdalOrigen+'/'+id_sucursalDestino).
    then(function (boletas){
        var html = ''
        let plus = 'plus';
        for (let i = 0; i < boletas.data.length; i++){
            let valorPlaca = '';
            if (boletas.data[i].estado_enlazo == 1){
                valorPlaca = 'Si';
            }else if (boletas.data[i].estado_enlazo == 2){
                valorPlaca = 'No';
            }
            html +=`
                            <tr>
                                <td style="font-size: 12px">${boletas.data[i].num_boleta}</td>
                                <td style="font-size: 12px">${boletas.data[i].num_placa}</td>
                                <td style="font-size: 12px">${boletas.data[i].chasis}</td>
                                <td style="font-size: 12px">${valorPlaca}</td>
                                <td style="font-size: 12px">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalVerInfoFromTrans"
                                    style="width: 33px; height: 23px; font-size: 8px" value="${boletas.data[i].id}" onclick="cargarInfoBoletaTrans(this.value)">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td style="font-size: 12px">
                                    <button class="btn btn-success" style="width: 33px; height: 23px; font-size: 8px" id="BtnAddCuerpoFormPlacaCard1-${boletas.data[i].id}"
                                    value="${boletas.data[i].id}.${boletas.data[i].num_boleta}.${boletas.data[i].num_placa}.${boletas.data[i].chasis}.${valorPlaca}"
                                    onclick="AddFilaCard2FormPlacas(this.value)">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                    `
        }
        document.getElementById("CuerpoFormularioPlacasCard1").innerHTML = html;
    })
}

var e = 1;
function AddFilaCard2FormPlacas(valor) {
    cadena = valor;
    let datos= cadena.split('.');
    let id=datos[0], boleta = datos[1], placa=datos[2], chasis = datos[3], valorPlaca = datos[4];
    document.getElementById("BtnAddCuerpoFormPlacaCard1-"+id).disabled = true;
    e++;
    $('#CuerpoFormularioPlacasCard2').append(`
                <tr>
                    <td style="font-size: 12px">${boleta}</td>
                    <td style="font-size: 12px">${placa}</td>
                    <td style="font-size: 12px">${chasis}</td>
                    <td style="font-size: 12px">${valorPlaca}</td>
                    <td style="font-size: 12px">
                        <button class="RemoveRowCuerpoFormCard2 btn btn-danger" onclick="RemoveBtnCuerpoFormPlacaCard2(this.value)" value="${id}" style="width: 33px; height: 23px; font-size: 8px">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </td>
                    <td><input type="text" value="${id}" hidden name="IdBoletas[]"></td>
                </tr>
            `);
}
$(document).on('click', '.RemoveRowCuerpoFormCard2', function () {
    $(this).parent().parent().remove();
    console.log(e.data);
});

function RemoveBtnCuerpoFormPlacaCard2(val) {
    document.getElementById("BtnAddCuerpoFormPlacaCard1-"+val).disabled = false;
}

function cargarInfoBoletaTrans(valor) {
    axios.get('/cargar_info_boletas/'+valor).
    then(function (info) {
        var html = '';
        for (let i = 0; i < info.data.length; i++){
            html +=`
                        <div class="row">
                            <div class="col">
                                <strong>*NOMBRE DEL CLIENTE:</strong> ${info.data[i].nombres} ${info.data[i].apellidos}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>*RTN:</strong>${info.data[i].rtn}</div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>*CHASIS:</strong>${info.data[i].chasis}</div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>*MOTOR:</strong>${info.data[i].motor}</div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>*MODELO:</strong>${info.data[i].nombre_mod}</div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>*MARCA:</strong>${info.data[i].nombre}</div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>*COLOR:</strong>${info.data[i].color}</div>
                        </div>

                    `
        }
        document.getElementById("VerInfoBoletaTransBoletas").innerHTML = html;
    })
}

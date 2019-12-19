if (document.getElementById("CuerpoReporte")){
    document.getElementById("CuerpoReporte").disabled = true;
}
if (document.getElementById("SpinnerCobros1")){
    $("#TableCobros1").DataTable();
    $("#CuerpoCobros1").show();
    $("#SpinnerCobros1").hide();
}

$(document).ready(function () {
    if (document.getElementById("Input-CodReporte")){
        let reporte_id = document.getElementById("Input-CodReporte").value;
        mostrarCuerpoReporte(reporte_id)
        Promesas(reporte_id)
    }
})

function Promesas(reporte_id) {
    axios.get('/cobros/cuerpo_promesas/'+reporte_id).then(
        function (promesas) {
            let html = '';
            for (let i = 0; i < promesas.data.length; i++){
                html +=`
                    <tr> 
                        <td>${promesas.data[i].fecha_promesa}</td>
                        <td>${promesas.data[i].descripcion}</td>
                        <td>${promesas.data[i].referencia}</td>
                        <td>L.${promesas.data[i].pago_acordado}</td>
                    </tr>
                `
            }
            $("#TbodyCuerpoPromesas").html(html);
        }
    )
}


function mostrarCuerpoReporte(reporte_id){
    axios.get('/cobros/cuerpo_reporte/'+reporte_id).then(
        function (cuerpo) {
            let html = '';
            let contactado = '';
            let resultado = '';
            let nivel = '';
            for (let i = 0; i < cuerpo.data.length; i++){
                if (cuerpo.data[i].forma_contactado === 1){
                    contactado = 'Mensaje';
                }else if (cuerpo.data[i].forma_contactado === 2){
                    contactado = 'Correo Electronico'
                }else if (cuerpo.data[i].forma_contactado === 3){
                    contactado = 'Llamada';
                }else if (cuerpo.data[i].forma_contactado === 4){
                    contactado = 'Visita';
                }else if (cuerpo.data[i].forma_contactado === 5 ){
                    contactado = 'WhatsApp';
                }else if (cuerpo.data[i].forma_contactado === 6){
                    contactado = 'Otro';
                }
                if (cuerpo.data[i].resultado === 1){
                    resultado = 'Exito';
                }else if (cuerpo.data[i].resultado === 2){
                    resultado= 'Sin Exito';
                }
                if (cuerpo.data[i].nivel === 1){
                    nivel = "Nivel 1";
                }else if (cuerpo.data[i].nivel === 2){
                    nivel = "Nivel 2";
                }else  if (cuerpo.data[i].nivel === 3){
                    nivel = "Nivel 3"
                }else if (cuerpo.data[i].nivel === 4){
                    nivel = "Nivel 4"
                }
                html+=`
                    <tr>
                        <td>${cuerpo.data[i].codigo}</td>
                        <td>${cuerpo.data[i].fecha}</td>
                        <td>${contactado}</td>
                        <td>${resultado}</td>
                        <td>${nivel}</td>
                        <td>${cuerpo.data[i].usuario}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-codigo="${cuerpo.data[i].codigo}" data-observacion="${cuerpo.data[i].observacion}"
                             data-toggle="modal" data-target="#ModalObservacionReporte">
                                Observacion
                            </button>
                        </td>
                    </tr>
                `
            }
            $("#TbodyTableCuerpoReporte").html(html);
            document.getElementById("CuerpoReporte").disabled = false;
        }
    )
}

$("#ModalObservacionReporte").on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var codigo = button.data('codigo')
    var observacion = button.data('observacion');

    var modal = $(this)
    modal.find('#TituloModalObservacionReporte').text("Observacion del reporte "+codigo)
    modal.find('#BodyModalObservacionReporte').text(observacion)
})

function MostrarReporte(cod) {
    window.location = '/cobros/reporte/'+cod;
}

if (document.getElementById("SpinnerCobros")){
    $("#CuerpoCobros").show();
    $("#SpinnerCobros").hide();
}

$("#Btn-AddAccionReporte").on('click', function () {
    let resultado = document.getElementById("SelectResultadoAccion");
    let observacion = document.getElementById("ObservacionAccionReporte");
    let contacto = document.getElementById("SelectContactado");
    let reporte =  document.getElementById("Input-CodReporte").value;
    let cod_reporte =  document.getElementById("Input-CodigoReporte").value;
    if (resultado.value > 0 && contacto.value > 0 && observacion.value.length){
        axios.post('/cobros/save_reporte',{
            resultado : resultado.value,
            observacion : observacion.value,
            contactado : contacto.value,
            reporte_id : reporte,
            reporte_cod : cod_reporte,
        }).then(function (data) {
            if (typeof data.data['errors'] != "undefined"){
                Command: toastr["error"]("No se pudo crear la accion");
                console.log(data);
            }
            if (typeof data.data['success'] != "undefined") {
                let referencia = data.data['success'][0];
                Command: toastr["success"]("Se agrego la accion correctamente");
                if (resultado.value == 1){
                    document.getElementById("Btn-AddPromesadePago").disabled = false;
                }else if (resultado.value == 2){
                    document.getElementById("Btn-AddPromesadePago").disabled = true;
                }
                document.getElementById("Btn-AddAccionReporte").disabled = true;
                resultado.disabled =  true;
                observacion.disabled =  true;
                contacto.disabled = true;
                document.getElementById("SelectObservacionesRapidas").disabled = true;
                $("#Btn-AddPromesadePago").on('click', function () {
                    document.getElementById("Btn-AddPromesadePago").disabled = true;
                    let html = '';
                    html+=`
                <div class="col">
                    <div class="form-group">
                        <label for="">Referencia</label>
                        <input type="text" class="form-control form-control-sm" value="${referencia}" id="InputReferenciaPromesaPago" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Fecha Acordada</label>
                        <input type="date" class="form-control form-control-sm" id="InputFechaPromesaPago">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Total Acordado</label>
                        <input type="text" class="form-control form-control-sm" id="InputTotalAcordadoPromesaPago">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Accion</label>
                        <button type="button" class="btn btn-outline-success form-control btn-sm" id="Btn-GuardarPromesaPago" onclick="GuardarPromesa()">
                        Guardar Promesa</button>
                    </div>
                </div>
            `
                    $("#CuerpoAddPromesaPago").show();
                    document.getElementById("CuerpoAddPromesaPago").innerHTML =  html;
                })
                mostrarCuerpoReporte(reporte)
            }
        })
    }else{
        alert("Llene todos los campos por favor")
    }

})

$("#SelectObservacionesRapidas").on('change', function () {
    let select = document.getElementById("SelectObservacionesRapidas").options
    let select_id = document.getElementById("SelectObservacionesRapidas").selectedIndex
    document.getElementById("ObservacionAccionReporte").innerText = select[select_id].text
})


function GuardarPromesa() {
    let fecha_promesa = document.getElementById("InputFechaPromesaPago")
    let total_acordado = document.getElementById("InputTotalAcordadoPromesaPago")
    let referencia = document.getElementById("InputReferenciaPromesaPago").value
    fecha_promesa.disabled = true;
    total_acordado.disabled = true;
    document.getElementById("Btn-GuardarPromesaPago").disabled = true;
    let reporte =  document.getElementById("Input-CodReporte").value;
    axios.post('/cobros/guardar_promesas', {
        reporte_id: reporte,
        fecha_promesa: fecha_promesa.value,
        pago_acordado: total_acordado.value,
        referencia: referencia,
    }).then(function (data) {
        if (data.data.length > 0){
            console.log(data.data)
            Command: toastr["error"]("Error al crear la promesa");
        }else{
            Command: toastr["success"]("La promesa se agrego correctamente");
            Promesas(reporte)
        }
    }).catch(e =>{
        console.log(e)
    })
}

function LimpiarModa() {
    let resultado = document.getElementById("SelectResultadoAccion");
    let observacion = document.getElementById("ObservacionAccionReporte");
    let formacontactado = document.getElementById("SelectContactado");
    let selectObservacion = document.getElementById("SelectObservacionesRapidas");
    let fecha_promesa = document.getElementById("InputFechaPromesaPago")
    let total_acordado = document.getElementById("InputTotalAcordadoPromesaPago")
    document.getElementById("Btn-AddAccionReporte").disabled = false;
    if (document.getElementById("Btn-GuardarPromesaPago")){
        document.getElementById("Btn-GuardarPromesaPago").disabled = false;
    }
    resultado.value = 0;
    resultado.disabled = false;
    observacion.value = '';
    observacion.disabled =false;
    formacontactado.value = 0;
    formacontactado.disabled=false
    selectObservacion.disabled = false;
    fecha_promesa.value = '';
    fecha_promesa.disabled =  false;
    total_acordado.value = 0;
    total_acordado.disabled = false;
    $("#CuerpoAddPromesaPago").hide();
}




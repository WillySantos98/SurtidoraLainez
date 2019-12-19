var valor_anterior = 1;
function SeccionHabilitar(val) {
    if (val == 2){
        document.getElementById("BotonesAsignacion2").disabled = false;
        $("#CuerpoVerificacionInicial").hide();
        $("#CuerpoPrecioAsignacion").show();
        valor_anterior = 2;
    }
    if (val == 3){
        document.getElementById("BotonesAsignacion3").disabled = false;
        $("#CuerpoPrecioAsignacion").hide();
        $("#CuerpoPagosAsignacion").show();
        valor_anterior = 3;
        cuenta = document.getElementById("InputCodigoCuentaAsignacion").value;
        TraerPagos(cuenta);
    }
}
function MostrarSeccionAsignacion(val) {
    let nueva_seccion = val;
    if (nueva_seccion == 1){
        EsconderSeccion(valor_anterior);
        $("#CuerpoVerificacionInicial").show();
        valor_anterior = val;
    }
    if (nueva_seccion == 2){
        EsconderSeccion(valor_anterior);
        $("#CuerpoPrecioAsignacion").show();
        valor_anterior = val;
    }
    if (nueva_seccion == 3){
        EsconderSeccion(valor_anterior);
        $("#CuerpoPagosAsignacion").show();
        valor_anterior= val;

    }

}

function EsconderSeccion(val) {
    if (val == 1){
        $("#CuerpoVerificacionInicial").hide();
    }
    if (val == 2){
        $("#CuerpoPrecioAsignacion").hide();
    }
    if (val == 3){
        $("#CuerpoPagosAsignacion").hide();
    }
}

$("#RegistrarCuenta").click(function () {
    let salida_id = document.getElementById("CodigoSalidaAsignacion");
    let intevalo = document.getElementById("SelectIntervaloPagoAsignacion");
    let plazo = document.getElementById("CampoPlazoAsignacion");
    let saldo_inicial = document.getElementById("CampoSaldoInicialAsignacion");
    let prima = document.getElementById("CampoPrimaAsignacion");
    let Fecha_inicio = document.getElementById("CampoFechaAsignacion");
    let DiasPago = document.getElementById("CampoDiasPagoAsignacion");

    axios.post('/cuentas/asignacion/crear_cuenta', {
        intervalo: intevalo.value,
        plazo: plazo.value,
        saldo_inicial: saldo_inicial.value,
        prima: prima.value,
        fecha:Fecha_inicio.value,
        dias_pago: DiasPago.value,
        salida_id: salida_id.value
    }).then(function (response) {
        if (response.data.length > 1){
            Command: toastr["error"]("No se pudo crear la cuenta");
            console.log(response)
        }else{
            Command: toastr["success"]("Se creo cuenta correctamente");
            document.getElementById("BotonAsignarSeccion3").disabled = false;
            intevalo.disabled = true;
            plazo.disabled = true;
            saldo_inicial.disabled = true;
            prima.disabled= true;
            Fecha_inicio.disabled = true;
            DiasPago.disabled = true;
            codigo = response.data
            document.getElementById("CodigoCuentaAsignacion").innerHTML = `
                <input type="text" value="${codigo}" id="InputCodigoCuentaAsignacion" hidden>
            `
        }
    })
})

function TraerPagos(val) {
    axios.get('/cuentas/asignacion/pagos/'+val).then(
        function (pagos) {
            let html = '';
            for (let i =0; i < pagos.data.length; i++){
                html +=`
                    <tr>
                        <td>${pagos.data[i].dia_pago}</td>
                        <td>${pagos.data[i].descripcion}</td>
                        <td>L.${pagos.data[i].cuota_inicial}</td>
                        <td><input style="width: 80px" type="text" class="form-control" id="InputRegistrarPago-${pagos.data[i].id}"></td>
                        <td id="TdCuotaDebeAsignacion-${pagos.data[i].id}">L.${pagos.data[i].cuota}</td>
                        <td>
                            <button class="btn btn-outline-success btn-sm " onclick="RegistroPagoAsignacion(${pagos.data[i].id})" id="RegistrarPagoAsignacion" value="${pagos.data[i].id}">Registrar Pago</button>
                        </td>
                    </tr>
                `
            }
            document.getElementById("TbodyTableRegistrarPagosAsignacion").innerHTML =  html;
        }
    )
}

function RegistroPagoAsignacion(id) {
    let pago = document.getElementById("InputRegistrarPago-"+id).value;
    if (pago <= 0){
        alert("Por favor ingresa una cantidad mayor a 0")
    }else{
        axios.get('/cuentas/asignacion/pagos/'+id+'/'+pago).then(
            function (response) {
                if (response.data.length > 1){
                    Command: toastr["error"]("No se pudo postear el pago");
                }else{
                    Command: toastr["success"]("Se posteo el pago correctamente");
                    document.getElementById("TdCuotaDebeAsignacion-"+id).innerHTML = "L."+response.data;
                }
            }
        )

    }
}


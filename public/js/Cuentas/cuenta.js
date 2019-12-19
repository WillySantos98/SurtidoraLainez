var CodCuenta = document.getElementById("InputCodigoCuenta").value;
ProximosPagos(CodCuenta);
EstadoCuenta(CodCuenta);
Moras(CodCuenta);
PagosCuotas(CodCuenta);
var SeccionAnterior = 1;
function MostrarSeccionCuenta(val) {
    let nueva_seccion = val;
    if (nueva_seccion == 1){
        EsconderSeccion(SeccionAnterior);
        $("#CuerpoDefaultCuentas").css("display", "block");
        SeccionAnterior = val;
    }
    if (nueva_seccion == 2){
        EsconderSeccion(SeccionAnterior);
        $("#CuerpoHistorialPagos").css("display","block")
        SeccionAnterior = val;
    }
    if (nueva_seccion == 3){
        EsconderSeccion(SeccionAnterior);
        $("#CuerpoHistorialMora").css("display","block")
        SeccionAnterior = val;
    }
    if (nueva_seccion == 4){
        EsconderSeccion(SeccionAnterior);
        $("#CuerpoProximoPagos").css("display","block");
        SeccionAnterior = val;
    }
    if (nueva_seccion == 5){
        EsconderSeccion(SeccionAnterior);
        $("#CuerpoEstadoCuenta").css("display","block");
        SeccionAnterior = val;
    }

    if (nueva_seccion == 9){
        EsconderSeccion(SeccionAnterior);
        $("#CuentaModificar").css("display","block");
        SeccionAnterior = val;
    }

}
function EsconderSeccion(val) {
    if (val == 1){
        $("#CuerpoDefaultCuentas").css("display","none");
    }
    if (val == 2){
        $("#CuerpoHistorialPagos").css("display","none")
    }
    if (val == 3){
        $("#CuerpoHistorialMora").css("display","none")
    }
    if (val == 4){
        $("#CuerpoProximoPagos").css("display","none");
    }
    if (val == 5){
        $("#CuerpoEstadoCuenta").css("display","none");
    }
    if (val==9){
        $("#CuentaModificar").css("display","none");
    }
}

function ProximosPagos(cod) {
    axios.get('/cuenta/proximos_pagos/'+cod).then(
        function (pagos) {
            let html ='';
            for (let i= 0; i<pagos.data.length; i++){
                html +=`
                    <tr>
                        <td>${i}</td>
                        <td>${pagos.data[i].cod_cuenta}</td>
                        <td>${pagos.data[i].dia_pago}</td>
                        <td>${pagos.data[i].dia_limite_pago}</td>
                        <td>L.${pagos.data[i].cuota}</td>
                    </tr>
                `
                document.getElementById("TbodyProximoPagos").innerHTML =html;
                Paginacion('TableProximoPagos');
                document.getElementById("BotonesCuentas4").disabled = false;
            }
        }
    )
}

function EstadoCuenta(cod) {
    axios.get('/cuenta/estado_cuenta/'+cod).then(
        function (historial) {
            let html = '';
            for (let i = 0; i < historial.data.length; i++){
                html +=`
                    <tr>
                        <td>${i + 1}</td>
                        <td>${historial.data[i].cod_posteo}</td>
                        <td>${historial.data[i].fecha_posteo}</td>
                        <td>${historial.data[i].descripcion}</td>
                        <td>L.${historial.data[i].debito}</td>
                        <td>L.${historial.data[i].credito}</td>
                        <td>L.${historial.data[i].saldo}</td>
                    </tr>
                `
            }
            document.getElementById("TbodyEstadoCuenta").innerHTML = html;
            Paginacion('TableEstadoCuenta');
            document.getElementById("BotonesCuentas5").disabled = false;
        }
    )
}

function Paginacion(id) {
    $(document).ready( function () {
        $("#"+id).DataTable()
    } );

}

function Moras($cod) {
    axios.get('/cuenta/moras/'+$cod).then(
        function (moras) {
            let html = '';
            let estado;
            let total = 0;
            for (let i =0; i< moras.data.length; i++){
                if (moras.data[i].estado == 1){
                    estado = 'Debe'
                }else if (moras.data[i].estado == 2){
                    estado = 'Cancelado'
                }else if (moras.data[i].estado == 3){
                    estado = 'Condonada';
                }
                total = parseFloat(total) + parseFloat(moras.data[i].interes);
                html +=`
                    <tr>
                        <td>${i+1}</td>
                        <td>${moras.data[i].cod_cuenta}</td>
                        <td>${moras.data[i].fecha_inicio}</td>
                        <td>${moras.data[i].descripcion}</td>
                        <td>L.${moras.data[i].cuota}</td>
                        <td>${moras.data[i].dias_mora} dias</td>
                        <td><span class="badge badge-danger">L.${moras.data[i].interes}</span></td>
                        <td>${moras.data[i].revision}</td>
                        <td>${estado}</td>
                    </tr>
                `
            }
            html +=`
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>de mora</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-danger">L.${total.toFixed(2)}</span></td>
                    <td></td>
                    <td></td>
                </tr>
            `
            document.getElementById('TbodyHistorialMora').innerHTML = html;
            Paginacion('TableHistorialMora');
            document.getElementById("BotonesCuentas3").disabled = false;
        }
    )

}

function PagosCuotas(val) {
    axios.get('/cuenta/pagos/cuota/'+val).then(
        function (historial) {
            let html = '';
            for (let i = 0; i < historial.data.length; i++){
                html +=`
                    <tr>
                        <td>${i + 1}</td>
                        <td>${historial.data[i].descripcion}</td>
                        <td>${historial.data[i].fecha_posteo}</td>
                        <td>L.${historial.data[i].total_pagar}</td>
                        <td>L.${historial.data[i].total_abonado}</td>
                        <td>L.${historial.data[i].total_pagar - historial.data[i].total_abonado}</td>
                        <td>${historial.data[i].referencia}</td>
                    </tr>
                `
            }
            document.getElementById("TbodyHistorialPagosCuotas").innerHTML = html;
            Paginacion('TablePagos');
            document.getElementById("BotonesCuentas2").disabled = false;
        }
    )
}

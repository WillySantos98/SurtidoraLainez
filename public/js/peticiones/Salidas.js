function addCliente(val) {
    var cadena = val;
    var datos = cadena.split('.');
    var id = datos[0];
    var nombres = datos[1];
    var apellidos = datos[2];
    var identidad = datos[3];
    var rtn = datos[4];
    document.getElementById("InputNombres").innerHTML = nombres;
    document.getElementById("InputApellidos").innerHTML = apellidos;
    document.getElementById("InputIdentidad").innerHTML = identidad;
    document.getElementById("InputRtn").innerHTML = rtn;
    document.getElementById("InputId").innerHTML = '<input type="text" name="IdCliente" value="'+id+'" class="form-control" hidden>';
}
function addMoto(valor) {
    var cadena = valor;
    var datos = cadena.split('.');
    var id = datos[0];
    var marca = datos[1];
    var modelo = datos[2];
    var chasis = datos[3];
    var motor = datos[4];
    var color = datos[5];

    document.getElementById("InputMarca").innerHTML = marca;
    document.getElementById("InputModelo").innerHTML = modelo;
    document.getElementById("InputChasis").innerHTML = chasis;
    document.getElementById("InputMotor").innerHTML = motor;
    document.getElementById("InputColor").innerHTML = color;
    document.getElementById("InputIdMoto").innerHTML = '<input type="text" value="'+id+'" name="IdMoto" class="form-control" hidden>';
}
function AddCotizacion(valor) {
    var conocimiento_venta;
    var cadena = valor;
    var datos = cadena.split('.');
    var precio_total= datos[0], prima = datos[1], meses = datos[2], intervalo = datos[3], cuota = datos[4], precio_contado = datos[5];
    var int ='';
    var p_f;
    if (intervalo == 1){
        int = 'Mensual'
    }else  if(intervalo == 2){
        int = 'Quincenal';
    }else{
        int = 'Es Precio de Contado'
    }
    if (prima ==0 && meses == 0 && intervalo == 0){
        p_f = 'Es de Contado';
        conocimiento_venta = true;
    }else{
        conocimiento_venta = false;
        p_f = 'L.'+(precio_contado - prima);
    }
    document.getElementById("FormCliente-Precio").innerHTML = '*Precio: L.'+precio_total;
    document.getElementById("FormCliente-Prima").innerHTML = '*Prima: L.'+prima;
    document.getElementById("FormCliente-Cuota").innerHTML = '*Cuota: L.'+cuota;
    document.getElementById("FormCliente-IP").innerHTML = '*Intervalo Pago: '+int;
    document.getElementById("FormCliente-Duracion").innerHTML = '*Duracion: '+meses+' meses';
    document.getElementById("Formcliente-Oculto-Financiado").value = precio_total - prima;
    document.getElementById("FormCliente-PrecioFinanciado").innerHTML = '*Precio Financi.:'+p_f;
    document.getElementById("Formcliente-Oculto-Total").value = precio_total;
    document.getElementById("Formcliente-Oculto-Prima").value = prima;
    document.getElementById("Formcliente-Oculto-Cuota").value = cuota;
    document.getElementById("Formcliente-Oculto-Intervalo").value = intervalo;
    document.getElementById("Formcliente-Oculto-Meses").value = meses;
    document.getElementById("BtnCalcularPagos").disabled = false

    if (conocimiento_venta == true){
        document.getElementById("DiasGracia").disabled = false;
        document.getElementById("FechaPrimerPago").disabled = true;
        document.getElementById("DiasPago").disabled = true;
        document.getElementById("DiasGracia").value = 3;
        document.getElementById("DiasPago").value = 0;
        document.getElementById("FechaPrimerPago").value = 0;
    }else if(conocimiento_venta == false){
        let fecha = new Date();
        document.getElementById("FechaPrimerPago").disabled = false;
        document.getElementById("DiasPago").disabled = false;
        document.getElementById("DiasGracia").disabled = false;
        document.getElementById("DiasGracia").value = 5;
        document.getElementById("DiasPago").value = fecha.getDate();

    }
}

function calcularPagos() {
    let precio_total = document.getElementById("Formcliente-Oculto-Total");
    let prima = document.getElementById("Formcliente-Oculto-Prima");
    let cuota = document.getElementById("Formcliente-Oculto-Cuota");
    let intervalo = document.getElementById("Formcliente-Oculto-Intervalo");
    let meses = document.getElementById("Formcliente-Oculto-Meses");
    let dias_gracia = document.getElementById("DiasGracia");
    let fecha_prima = new Date();
    let primer_pago =document.getElementById("FechaPrimerPago");
    let nueva_fecha_prima = fecha_prima.getDate()+'/'+(fecha_prima.getMonth() + 1)+'/'+fecha_prima.getFullYear();
    let dias_pago = document.getElementById("DiasPago").value;
    let nueva_fecha_primerpago = primer_pago.value.split('-')[2]+'/'+primer_pago.value.split('-')[1]+'/'+primer_pago.value.split('-')[0]
    let mes = primer_pago.value.split('-')[1];
    let fecha =new Date();
    let ano = primer_pago.value.split('-')[0];
    let html ='';
    let nueva_fecha = nueva_fecha_primerpago
    let dia;
    let pagos = meses.value * intervalo.value;
    let total_nuevo;
    let saldo_inicial;
    if (dias_pago < 10){
        dias_pago = '0'+dias_pago;
    }
    dia = parseInt(fecha.getDate()) + parseInt(dias_gracia.value);
    if (prima.value ==0 && meses.value == 0 && intervalo.value == 0){

        fecha.setDate(dia)
        html +=`
            <tr>
                <td>0</td>
                <td>${fecha.getDate()+'/'+fecha.getMonth()+'/'+fecha.getFullYear()}</td>
                <td>${precio_total.value}</td>
                <td>L.${cuota.value}</td>
                <td>L.${precio_total.value - cuota.value}</td>
            </tr>
        `;
        document.getElementById("DesglocePagos").innerHTML = html
    }else{
        if (intervalo.value == 1){
            saldo_inicial = precio_total.value;
            total_nuevo = saldo_inicial - prima.value;
            html +=`
            <tr>
                <td>0</td>
                <td>${nueva_fecha_prima}</td>
                <td>L.${saldo_inicial}</td>
                <td>L.${prima.value}</td>
                <td>L.${total_nuevo}</td>
            </tr>
        `;
            saldo_inicial=total_nuevo;
            for (let i =0; i < pagos; i++){
                total_nuevo = saldo_inicial - cuota.value;
                html +=`
                    <tr>
                        <td>${parseInt(i) +parseInt(1)}</td>
                        <td>${nueva_fecha}</td>
                        <td>L.${saldo_inicial}</td>
                        <td>L.${cuota.value}</td>
                        <td>L.${total_nuevo}</td>
                    </tr>
                `;
                saldo_inicial = total_nuevo;
                // fecha.setDate(dias_pago, );
                mes = parseInt(mes) + parseInt(1)

                if (mes < 10){
                    mes = '0'+mes
                }else if (mes > 12){
                    mes = '0'+1;
                    ano = parseInt(ano) + parseInt(1)
                }
                nueva_fecha = dias_pago+'/'+mes+'/'+ano;
            }
            document.getElementById("DesglocePagos").innerHTML = html
        }else if(intervalo.value == 2){
            let pagos_al_mes = 0;
            let dia_anterior  = dias_pago
            let mes_anterior = mes
            saldo_inicial = precio_total.value;
            total_nuevo = saldo_inicial - prima.value;
            html +=`
                <tr>
                    <td>0</td>
                    <td>${nueva_fecha_prima}</td>
                    <td>L.${saldo_inicial}</td>
                    <td>L.${prima.value}</td>
                    <td>L.${total_nuevo}</td>
                </tr>
            `;
            saldo_inicial = total_nuevo;
            pagos_al_mes = 1
            nueva_fecha = primer_pago.value.split('-')[2]+'/'+primer_pago.value.split('-')[1]+'/'+primer_pago.value.split('-')[0]
            for (let i =0; i < pagos; i++){
                total_nuevo = saldo_inicial - cuota.value/2;
                pagos_al_mes += 1
                html +=`
                    <tr>
                        <td>${parseInt(i) +parseInt(1)}</td>
                        <td>${nueva_fecha}</td>
                        <td>L.${saldo_inicial}</td>
                        <td>L.${cuota.value/2}</td>
                        <td>L.${total_nuevo}</td>
                    </tr>
                `;
                saldo_inicial = total_nuevo;
                if (pagos_al_mes == 1){
                    dias_pago = parseInt(dia_anterior) + parseInt(15);
                }else  if(pagos_al_mes == 2){
                    pagos_al_mes = 0;
                    dias_pago = dia_anterior
                    mes = parseInt(mes) + parseInt(1)
                }
                // fecha.setDate(dias_pago, );

                if (mes > 12){
                    mes = '0'+1;
                    ano = parseInt(ano) + parseInt(1)
                }
                nueva_fecha = dias_pago+'/'+mes+'/'+ano;
            }

            document.getElementById("DesglocePagos").innerHTML = html
        }
    }
}
// function FechasPagos() {
//     let fecha_prima = document.getElementById("FechaPrima").value;
//     let fecha_inicial = document.getElementById("FechaPrimerPago").value;
//     let dias_pago =document.getElementById("DiasPago").value;
//     let dias_gracia =document.getElementById("DiasGracia").value;
//     let fecha = new Date();
//     let bandera = 0;
//     if (fecha_prima.length > 1){
//         bandera +=1;
//     }
//     if (fecha_inicial.length > 1){
//         bandera +=1;
//     }
//     if (dias_pago.length > 0 && dias_pago !=0){
//         bandera +=1;
//     }
//     if (dias_gracia>length > 0){
//         bandera +=1;
//     }
//     alert(conocimiento_venta)
//     if (conocimiento_venta == true){
//         alert("entro")
//         html +=`
//             <tr>
//                 <td>0</td>
//                 <td>0</td>
//                 <td>0</td>
//                 <td>0</td>
//             </tr>
//         `
//         document.getElementById("DesglocePagos").innerHTML = html
//     }
//     if (bandera==4){
//         let pagos = document.getElementById("Formcliente-Oculto-Meses").value * document.getElementById("Formcliente-Oculto-Meses").value;
//         if (document.getElementById("Formcliente-Oculto-Intervalo").value == 1){
//             for (let i =0; i < pagos; i++){
//                 html +=`
//             <tr>
//                 <td>${parseInt(i) + parseInt(1)}</td>
//             </tr>
//             `
//             }
//
//         }else if (document.getElementById("Formcliente-Oculto-Intervalo").value == 2){
//
//         }
//         document.getElementById("DesglocePagos").innerHTML = html
//     }
// }

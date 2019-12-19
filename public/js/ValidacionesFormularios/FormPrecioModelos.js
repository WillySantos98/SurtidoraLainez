function ValidarFormPrecioModelo() {
    var bandera = 0;
    var bandera2 = 0;
    var correcto ="thick solid #00FF00";
    var incorrecto = "thick solid #FF0000";
    var precio_s_i = document.getElementById("InputPrecioSI");
    var margen_utilidad = document.getElementById("InputMargenUtilidad");
    var select_impuesto = document.getElementById("SelectImpuesto");
    var datos_impuesto = select_impuesto.options[select_impuesto.selectedIndex].text;
    var arreglo_impuesto = datos_impuesto.split('-');
    var impuesto = arreglo_impuesto[1];
    var precio_costo = document.getElementById("InputPrecioCosto");
    var select_ga = document.getElementById("SelectGA");
    var datos_gastosAdm = select_ga.options[select_ga.selectedIndex].text;
    var arreglo_gastoAdm = datos_gastosAdm.split('-');
    var gasto_Administrativo = arreglo_gastoAdm[1];
    var precio_contado = document.getElementById("InputPrecioContado");
    var UtilidadAnual = document.getElementById("InputUtilidadAnual");
    var utilidadMensual = document.getElementById("InputUtilidadMensual");
    var porcentaje_prima = document.getElementById("InputPrima");
    var prima = document.getElementById("InputPrimaMinima");
    var meses = document.getElementById("InputMeses");
    var Cuota = document.getElementById("Inputcuota");
    var SaldoInicial = document.getElementById("InputSaldoInicial");
    var html = ''
    var elemento = document.getElementById("TbodyPruebaCotizacion");

    if (precio_s_i.value.length > 3 && (/^[0-9]+$/).test(precio_s_i.value) ){
        precio_s_i.style.border = correcto;
        bandera +=1
    }else{
        precio_s_i.style.border = incorrecto;
    }
    //
    if (margen_utilidad.value.length > 2 && (/^[0-1]+([.][0-9]+)?$/).test(margen_utilidad.value) ){
        margen_utilidad.style.border = correcto;
        bandera +=1
        let v =  margen_utilidad.value * 100
        document.getElementById("DivMargenUtilidad").innerHTML = v.toFixed(1)+'%' ;
    }else{
        margen_utilidad.style.border = incorrecto;
    }
    //
    if (select_impuesto.value != 0 ){
        select_impuesto.style.border = correcto
        bandera += 1
    }else{
        select_impuesto.style.border = incorrecto
    }
    //
    if (select_ga.value != 0){
        select_ga.style.border = correcto;
        bandera +=1
    }else{
        select_ga.style.border = incorrecto;
    }
    if (bandera > 2){
        var total1 = parseInt(precio_s_i.value * margen_utilidad.value) + parseInt(precio_s_i.value);
        var total2 = parseInt(total1 * impuesto) + parseInt(total1);
        precio_costo.value = total2
    }

    if (bandera > 3){
        var p_contado = parseInt(total2) + parseInt(gasto_Administrativo);
        precio_contado.value = p_contado
    }

    if (UtilidadAnual.value.length > 2 && (/^[0-1]+([.][0-9]+)?$/).test(UtilidadAnual.value)){
        var anualidad_m = UtilidadAnual.value/12;
        utilidadMensual.value= anualidad_m.toFixed(5);
        UtilidadAnual.style.border = correcto;
        let v = UtilidadAnual.value * 100;
        document.getElementById("DivUtilidadAnual").innerHTML = v.toFixed(1)+'%';
        v = anualidad_m * 100
        document.getElementById("InputUtilidadMensual100").value = v.toFixed(2)+'%';
        bandera2 +=1
    }else{
        UtilidadAnual.style.border = incorrecto
    }

    if (porcentaje_prima.value.length > 2 && (/^[0-1]+([.][0-9]+)?$/).test(porcentaje_prima.value) && porcentaje_prima.value <=1){
        porcentaje_prima.style.border = correcto
        var prima_min = p_contado * porcentaje_prima.value;
        prima.value = prima_min.toFixed(2);
        var saldo = parseInt(p_contado) - parseInt(prima_min)
        SaldoInicial.value = saldo
        let v = porcentaje_prima.value * 100;
        document.getElementById("DivInputPrima").innerText = v.toFixed(2)+'%';
        bandera2 += 1;
    }else{
        porcentaje_prima.style.border = incorrecto
    }

    if(meses.value.length> 0 && meses.value>=1 && (/^[0-9]+$/).test(meses.value)){
        let suma1 = (1 + anualidad_m);
        let suma2 = Math.pow(suma1, -meses.value);
        let suma3 = suma2 - 1;
        let suma4 = suma3/(anualidad_m)
        var cuot = -saldo/suma4
        Cuota.value = cuot.toFixed(3);
        meses.style.border = correcto;
        bandera2 +=1
    }else{
        meses.style.border = incorrecto
    }

    var fecha2 = new Date();
    var saldo_antes = saldo;
    if ((parseInt(bandera) + parseInt(bandera2)) == 7){
        html +=`
                <tr style="background-color: #2c9faf; color: white">
                   <td>${0}</td>
                   <td>${fecha2.getDate()+'/'+(parseInt(fecha2.getMonth() + 1))+'/'+fecha2.getFullYear()}</td>
                   <td>${prima_min.toFixed(2)}</td>
                   <td>${p_contado.toFixed(2)}</td>
                    <td>${0}</td>
                    <td>${0}</td>
                    <td>${saldo_antes.toFixed(2)}</td>
                </tr>
            `

        var fecha_pago;
        var cuota_mensual = cuot;
        var intereses = saldo_antes * (anualidad_m);
        var capital = cuota_mensual - intereses;
        var saldo_despues = saldo_antes - capital;

        var contadorIntereses = 0;
        var contadorCapital = 0;
        for (let i = 1; i <= meses.value; i++){
            fecha2.setDate(fecha2.getDate() + 30)
            fecha_pago = fecha2.getDate()+'/'+(parseInt(fecha2.getMonth()) + parseInt(1))+'/'+fecha2.getFullYear();
            contadorIntereses = contadorIntereses + intereses;
            contadorCapital = contadorCapital + capital;
            html +=`
                <tr>
                    <td>${i}</td>
                    <td>${fecha_pago}</td>
                    <td>${cuota_mensual.toFixed(2)}</td>
                    <td>${saldo_antes.toFixed(2)}</td>
                    <td>${capital.toFixed(2)}</td>
                    <td>${intereses.toFixed(2)}</td>
                    <td>${saldo_despues.toFixed(2)}</td>
                </tr>

            `
            saldo_antes = saldo_despues;
            intereses = saldo_antes * (anualidad_m);
            capital = cuota_mensual - intereses;
            saldo_despues = saldo_antes - capital;
        }
        html +=`
               <tr style="background-color: #1cc88a; color: white">
                    <td>-</td>
                    <td>Totales</td>
                    <td>${(cuota_mensual * meses.value).toFixed(2)}</td>
                    <td>-</td>
                    <td>${contadorCapital.toFixed(2)}</td>
                    <td>${contadorIntereses.toFixed(2)}</td>
                    <td>-</td>
                </tr>
        `

        elemento.innerHTML = html
        document.getElementById("Boton-Submit-Form").disabled = false;
    }else if ((parseInt(bandera) + parseInt(bandera2)) < 7){
        document.getElementById("Boton-Submit-Form").disabled = true;
    }


}


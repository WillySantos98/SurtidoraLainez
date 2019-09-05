function FormSalidaVenta() {
    let tipo_venta = document.getElementById("FormSalidaVenta-SelectTipoVenta");
    let sucursal = document.getElementById("FormSalidaVenta-SelectSucursal");
    let empleado = document.getElementById("SelectEmpleadoSucursal");
    let cod = document.getElementById("FormSalidaVenta-Cod");
    let fecha = document.getElementById("FormSalidaVenta-Fecha");
    let marca = document.getElementById("InputMarca");
    let nombres = document.getElementById("InputNombres");
    let bandera = 0;
    if ((/^[1-9]+$/).test(tipo_venta.value)){
        tipo_venta.style.border = "thick solid #00FF00";
        bandera += 1
    }else{
        tipo_venta.style.border = "thick solid #FF0000";
    }
    if ((/^[1-9]+$/).test(sucursal.value)){
        sucursal.style.border = "thick solid #00FF00";
        bandera += 1
        if ((/^[1-9]+$/).test(empleado.value)){
            empleado.style.border = "thick solid #00FF00";
            bandera += 1
        }else {
            empleado.style.border = "thick solid #FF0000";
        }
    }else {
        sucursal.style.border = "thick solid #FF0000";
        empleado.style.border = "thick solid #FF0000";
    }
    if (cod.value.length > 10){
        cod.style.border = "thick solid #00FF00";
        bandera += 1
    }else{
        cod.style.border = "thick solid #FF0000";
    }
    if (fecha.value.length < 1){
        fecha.style.border = "thick solid #FF0000";
    }else{
        fecha.style.border = "thick solid #00FF00";
        bandera += 1
    }

    if (bandera == 5) {
        document.getElementById("Boton-Submit-Form").disabled = false;
    }else if (bandera < 5){
        document.getElementById("Boton-Submit-Form").disabled = true;
    }

}

function InfoPlaca(val) {
    let id = val;
    var html = '';
    axios.get('/info_placas/'+id).
    then(function (informacion) {
        console.log(informacion.data);
        for (let i = 0; i < informacion.data.length; i++){
            let val_EstadoPlaca = 0;
            let val_EstadoPlacaBoleta = 0;
            if (informacion.data[i].estado_placa == 1){
                val_EstadoPlaca = 'No';
            }else if (informacion.data[i].estado_placa == 2){
                val_EstadoPlaca = 'Si';
            }
            if (informacion.data[i].estado_enlazo == 1){
                val_EstadoPlacaBoleta = 'Si';
            }else if (informacion.data[i].estado_enlazo == 2){
                val_EstadoPlacaBoleta = 'No';
            }
            html +=`
                        <div class="row">
                            <div class="col">
                                <h4 class="text-center">Informacion de la Motocicleta</h4>
                                <div class="row">
                                    <strong>*CODIGO: </strong>${informacion.data[i].id_moto}
                                </div><div class="row">
                                    <strong>*CHASIS: </strong> ${informacion.data[i].chasis}
                                </div><div class="row">
                                    <strong>*MOTOR: </strong> ${informacion.data[i].motor}
                                </div><div class="row">
                                    <strong>*COLOR: </strong> ${informacion.data[i].color}
                                </div><div class="row">
                                    <strong>*MODELO: </strong> ${informacion.data[i].nombre_mod}
                                </div><div class="row">
                                    <strong>*MARCA: </strong> ${informacion.data[i].nombre_mar}
                                </div><div class="row">
                                    <strong>*PROVEEDOR:</strong> ${informacion.data[i].nombre_pro}
                                </div><div class="row">
                                    <strong>*TIPO DE VEHICULO:</strong> ${informacion.data[i].nombre_v}
                                </div><div class="row">
                                    <strong>*RUEDAS:</strong> ${informacion.data[i].ruedas}
                                </div><div class="row">
                                    <strong>*PLACA:</strong> ${val_EstadoPlaca}
                                </div><div class="row">
                                    <strong>*FICHA DE MOTOCICLETA:</strong> <a href="/inventario/motocicletas/ficha/${informacion.data[i].id_moto}" target="_blank">${informacion.data[i].id_moto}</a>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="text-center">Informacion de la Venta
                                <div class="row">
                                    <strong>*TIPO DE VENTA:</strong> ${informacion.data[i].nombre_ven}
                                </div><div class="row">
                                    <strong>*FECHA DEL VENTA:</strong> ${informacion.data[i].fecha_salida}
                                </div><div class="row">
                                    <strong>*NOMBRES DEL CLIENTE:</strong> ${informacion.data[i].nombres}
                                </div><div class="row">
                                    <strong>*APELLIDOS DEL CLIENTE:</strong> ${informacion.data[i].apellidos}
                                </div><div class="row">
                                    <strong>*NOMBRE DEL VENDEDOR:</strong> ${informacion.data[i].nombre_col}
                                </div><div class="row">
                                    <strong>*FICHA DE LA VENTA:</strong> <a href="/inventario/motocicletas/documentos/salidas/${informacion.data[i].cod_venta}" target="_blank">${informacion.data[i].cod_venta}</a>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="text-center">Informacion de la Boleta/Placa</h4>
                                <div class="row">
                                    <strong>*NUMERO DE BOLETA: </strong>${informacion.data[i].num_boleta}
                                </div><div class="row">
                                    <strong>*NUMERO DE PLACA: </strong> ${informacion.data[i].num_placa}
                                </div><div class="row">
                                    <strong>*FECHA DE VENCIMIENTO: </strong> ${informacion.data[i].fecha_vencimiento}
                                </div><div class="row">
                                    <strong>*IDENTIFICACION: </strong> ${informacion.data[i].identificacion}
                                </div><div class="row">
                                    <strong>*PROPIETARIO: </strong> ${informacion.data[i].propietario}
                                </div><div class="row" >
                                    <strong>*BOLETA CON PLACA: </strong> ${val_EstadoPlacaBoleta}
                                </div><div class="row">
                                    <strong>*ALMACEN DE ENTREGA:</strong> ${informacion.data[i].nombre_alm}
                                </div><div class="row">
                                    <strong>*FICHA DE LA BOLETA:</strong> <a href="/inventario/motocicletas/ficha/${informacion.data[i].id_moto}" target="_blank">${informacion.data[i].id_moto}</a>
                                </div>
                            </div>
                        </div>
                        <hr>

                    `
        }
        var ele = document.getElementById("CuerpoModalInfoPlaca");
        ele.innerHTML = html;
    });
}

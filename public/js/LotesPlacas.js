function LotesPlacas(id) {
    axios.get('/lotes_placas/'+id).
    then(function (lotes) {
        console.log(lotes.data)
        let html = '';
        let bandera = 1;
        for (let i = 0; i < lotes.data.length; i++){
            if (bandera == 1){
                html +=`
                        <div class="row">
                            <div class="col"><strong>Cod. Transferencia:</strong> ${lotes.data[i].cod_transferencia}</div>
                            <div class="col"><strong>Sucursal de Destino: </strong>${lotes.data[i].nombre}</div>
                            <input type="text" value="${lotes.data[i].id}" name="Id" hidden>
                            <input type="text" value="${lotes.data[i].id_suc}" name="IdSuc" hidden>
                        </div>
                    `
                bandera = 2;
                document.getElementById("ModalLotetitulo").innerHTML = html;
                html= '';
            }
            let estado = '';
            if (lotes.data[i].estado_enlazo == 1){
                estado = 'Si Vino'
            }if(lotes.data[i].estado_enlazo == 2){
                estado = 'No vino'
            }
            html +=`
                    <tr>
                        <td>${lotes.data[i].num_boleta}</td>
                        <td>${lotes.data[i].num_placa}</td>
                        <td>${lotes.data[i].nombres} ${lotes.data[i].apellidos}</td>
                        <td>${lotes.data[i].chasis}</td>
                        <td>${estado}</td>
                    </tr>
                `
        }

        document.getElementById("BodyModalLotePlacas").innerHTML = html;
        html = '';
        html += '<input type="submit" class="btn btn-outline-success" value="Aceptar Transferencia">'
        document.getElementById("PieModalLote").innerHTML = html;

    })
}

function LotesPlacas2(id) {
    axios.get('/lotes_placas/'+id).
    then(function (lotes) {
        console.log(lotes.data)
        let html = '';
        let bandera = 1;
        for (let i = 0; i < lotes.data.length; i++){
            if (bandera == 1){
                html +=`
                        <div class="row">
                            <div class="col"><strong>Cod. Transferencia:</strong> ${lotes.data[i].cod_transferencia}</div>
                            <div class="col"><strong>Sucursal de Destino: </strong>${lotes.data[i].nombre}</div>
                            <input type="text" value="${lotes.data[i].id}" name="Id" hidden>
                            <input type="text" value="${lotes.data[i].id_suc}" name="IdSuc" hidden>
                        </div>
                    `
                bandera = 2;
                document.getElementById("ModalLotetitulo").innerHTML = html;
                html= '';
            }
            let estado = '';
            if (lotes.data[i].estado_enlazo == 1){
                estado = 'Si Vino'
            }if(lotes.data[i].estado_enlazo == 2){
                estado = 'No vino'
            }
            html +=`
                    <tr>
                        <td>${lotes.data[i].num_boleta}</td>
                        <td>${lotes.data[i].num_placa}</td>
                        <td>${lotes.data[i].nombres} ${lotes.data[i].apellidos}</td>
                        <td>${lotes.data[i].chasis}</td>
                        <td>${estado}</td>
                    </tr>
                `
        }

        document.getElementById("BodyModalLotePlacas").innerHTML = html;

    })
}

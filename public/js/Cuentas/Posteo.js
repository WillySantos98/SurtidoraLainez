var pago;
function CalcularPosteo() {
    pago = document.getElementById("Posteo-Pago").value;
    var cod = document.getElementById("Posteo-CodigoCuenta").value;
    if (pago == 0){
        alert("Ingrese una cantidad mayor a L.0")
    }else{
        axios.get('/cuentas/posteo/info/'+cod+'/'+pago).then(
            function (pagos) {
                let html = '';
                let bandera = true;
                let i =0;
                let mor = 'Mora - '
                while (bandera == true){
                    if (typeof pagos.data['moras'] != "undefined"){
                        if (i < pagos.data['moras'].length){
                            html +=`
                            <tr>
                                <td>Mora</td>
                                <td>${pagos.data['moras'][i].descripcion}</td>
                                <input type="text" name="idMoras[]" hidden value="${pagos.data['moras'][i].id}">
                                <td>L.${pagos.data['moras'][i].debe}</td>
                                <td>L.${pagos.data['moras'][i].pagara}</td>
                                <input type="text" name="idMorasPagara[]" hidden value="${pagos.data['moras'][i].pagara}">
                                <input type="text" name="idMorasDescripcion[]" hidden value="${mor+pagos.data['moras'][i].descripcion}">
                                <td>L.${pagos.data['moras'][i].actual}</td>
                                <td>L.${pagos.data['moras'][i].hay}</td>
                            </tr>
                        `
                            bandera = true;
                        }else{
                            bandera = false;
                        }
                    }
                    if (typeof  pagos.data['cuota'] != "undefined"){
                        if (i < pagos.data['cuota'].length){
                            html +=`
                                <tr>
                                    <td>Cuota Normal</td>
                                    <input type="text" name="idCuotas[]" hidden value="${pagos.data['cuota'][i].id}">
                                    <input type="text" name="idCuotasPagara[]" hidden value="${pagos.data['cuota'][i].pagara}">
                                    <input type="text" name="idCuotasDescrion[]" hidden value="${pagos.data['cuota'][i].descripcion}">
                                    <td>${pagos.data['cuota'][i].descripcion}</td>
                                    <td>L.${pagos.data['cuota'][i].debe}</td>
                                    <td>L.${pagos.data['cuota'][i].pagara}</td>
                                    <td>L.${pagos.data['cuota'][i].actual}</td>
                                    <td>L.${pagos.data['cuota'][i].hay}</td>
                                </tr>
                            `
                            bandera = true;
                        }else{
                            bandera = false;
                        }
                    }
                    i +=1;
                }
                document.getElementById("TbodyTableCalularPagoPosteo").innerHTML = html;

            }
        )
        document.getElementById("Postear-Token").disabled =  false;
        document.getElementById("Submit-Posteo").disabled =  false;
    }
}
$('#ModalPosteoVerificar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)
    modal.find('#ValorPosteo').text('L.'+pago)
})



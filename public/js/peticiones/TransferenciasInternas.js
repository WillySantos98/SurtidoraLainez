const fecha = new Date();
function AceptarTransInterna() {
    var idtr = document.getElementById("IdTransferenciaInterna").value;
    var valor = 1;
    var codigo = document.getElementById("codTransferencia").value;
    var usuario = document.getElementById("InputUsuario").value;
    var idusuario = document.getElementById("InputIdUsuario").value;
    axios.get('/decisiontransferencia/'+codigo+'/'+valor+'/'+idusuario+'/'+idtr).then(
        function (accion) {
            console.log(accion.data);
            if (accion.data == 1){
                mensaje = 'La Transferencia ha sido Aceptada sin ningun problema';
                alertify.alert(mensaje, function(){ alertify.success('Has Aceptado la transferencia') });
                document.getElementById("EstadoTransferencia").innerHTML = '<span class="badge badge-success">Aceptada</span>';
                document.getElementById("UsuarioDecision").innerHTML = usuario;
                document.getElementById("FechaSolucionTransferencia").innerHTML = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();
                document.getElementById("SeccionBotonesTransferencia").style.display = 'none';
            }else{
                mensaje = 'Hubo un error con el servidor, intentelo de nuevo. Si el error transcurre contacte a servicio tecnico.';
                alertify.alert(mensaje, function(){ alertify.error('Se cancelo la aceptacion de la transferencia')});
            }
        }
    );

}
function DenegarTransInterna() {
    var idtr = document.getElementById("IdTransferenciaInterna").value;
    var valor = 3;
    var codigo = document.getElementById("codTransferencia").value;
    var usuario = document.getElementById("InputUsuario").value;
    var idusuario = document.getElementById("InputIdUsuario").value;
    axios.get('/decisiontransferencia/'+codigo+'/'+valor+'/'+idusuario+'/'+idtr).then(
        function (accion) {
            if (accion.data == 1){
                mensaje = 'La Transferencia ha sido denegada sin ningun problema';
                alertify.alert(mensaje, function(){ alertify.success('Has Denegado la transferencia con exito') });
                document.getElementById("EstadoTransferencia").innerHTML = '<span class="badge badge-danger">Denegada</span>';
                document.getElementById("UsuarioDecision").innerHTML = usuario;
                document.getElementById("FechaSolucionTransferencia").innerHTML = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();
                document.getElementById("SeccionBotonesTransferencia").style.display = 'none';
            }else{
                mensaje = 'Hubo un error con el servidor, intentelo de nuevo. Si el error transcurre contacte a servicio tecnico.';
                alertify.alert(mensaje, function(){ alertify.error('Se cancelo el rechazo de la transferencia')});
            }
        }
    );
}

$('#ModalTransferenciaExitosa').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var cod = button.data('cod');
    var modal = $(this);
    modal.find('.modal-header #titulo').html("Transferencia Exitosa # "+cod);

    axios.get('/inventario/motocicletas/documentos/transferencias/exitosas/motos/'+cod).
    then(function (motos) {
        console.log(motos.data);
        let html = '';
        for (var i = 0; i<motos.data.length; i++){
            html +=`
                    <tr>
                        <td>${motos.data[i].id_moto}</td>
                        <td>${motos.data[i].nombre_mod}</td>
                        <td>${motos.data[i].color}</td>
                        <td>${motos.data[i].motor}</td>
                        <td>${motos.data[i].chasis}</td>
                        <td><select class="form-control" name="SelectCasco" required id="">
                            <option value="1">------</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select></td>
                        <td><select class="form-control" name="SelectBateria" required id="">
                            <option value="1">------</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select></td>
                        <td><select name="SelectAcido" required  class="form-control" id="">
                            <option value="1">------</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select></td>
                        <td><select name="SelectHoja" id="" required class="form-control">
                            <option value="1">------</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select></td>
                        <td>
                            <select name="SelectLlaves" required class="form-control" id="">
                                <option value="1">-----</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </td>
                        <input type="text" hidden name="InputIdTrans" value="${motos.data[i].id}">
                        <input type="text" hidden name="InputIdMoto[]" value="${motos.data[i].idm}">
                    </tr>
                    `
        }
        elemento = document.getElementById("CuerpoFormTransferenciaExitosa");
        elemento.innerHTML = html;

    })
});

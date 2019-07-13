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
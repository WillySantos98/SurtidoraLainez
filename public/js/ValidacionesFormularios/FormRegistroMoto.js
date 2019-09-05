function FormRegistroMoto() {
    let SelectEntrada = document.getElementById("SelectEntrada");
    let SelectSucursal = document.getElementById("SelectSucursal");
    let SelectEmpleado = document.getElementById("SelectEmpleadoSucursal");
    let SelectProveedor = document.getElementById("SelectProveedor");
    let NumTransferencia = document.getElementById("FormRegistroMoto-Transferencia");
    let Fecha = document.getElementById("FormRegistroMoto-Fecha");
    let bandera = 0;

    if((/^[1-9]+$/).test(SelectEntrada.value)){
        SelectEntrada.style.border = "thick solid #00FF00";
        bandera += 1
    }else{
        SelectEntrada.style.border = "thick solid #FF0000";
    }
    if((/^[1-9]+$/).test(SelectSucursal.value)){
        SelectSucursal.style.border = "thick solid #00FF00";
        bandera += 1
        if((/^[1-9]+$/).test(SelectEmpleado.value)){
            SelectEmpleado.style.border = "thick solid #00FF00";
            bandera += 1
        }else{
            SelectEmpleado.style.border = "thick solid #FF0000";
        }
    }else{
        SelectSucursal.style.border = "thick solid #FF0000";
        SelectEmpleado.style.border = "thick solid #FF0000";
    }
    if((/^[1-9]+$/).test(SelectProveedor.value)){
        SelectProveedor.style.border = "thick solid #00FF00";
        bandera += 1
    }else{
        SelectProveedor.style.border = "thick solid #FF0000";
    }
    if (NumTransferencia.value.length < 1 || NumTransferencia.value.length <3){
        NumTransferencia.style.border = "thick solid #FF0000";
    }else{
        NumTransferencia.style.border = "thick solid #00FF00";
        bandera += 1
    }
    if (Fecha.value.length < 1){
        Fecha.style.border = "thick solid #FF0000";
    }else {
        Fecha.style.border = "thick solid #00FF00";
        bandera += 1;
    }



    if (bandera == 6) {
        document.getElementById("Boton-Submit-Form").disabled = false;
    }else if (bandera < 6){
        document.getElementById("Boton-Submit-Form").disabled = true;
    }
}

// document.getElementById("Boton-Submit-Form").addEventListener("click", function (e) {
//     let contador = 1;
//     console.log(contador)
//     if (document.getElementById("FormRegistroMoto-Chasis-"+contador)){
//         alert("si esxiste el la fila "+contador)
//         e.preventDefault();
//         let chasis = '';
//         while (document.getElementById("FormRegistroMoto-Chasis-"+contador)){
//             alert("Entro al while la fila "+contador)
//             chasis = document.getElementById("FormRegistroMoto-Chasis-"+contador);
//             if (chasis.value.length < 1){
//                 chasis.style.border = "thick solid #FF0000";
//                 new Noty({
//                     type: 'error',
//                     layout: 'topRight',
//                     text: 'El campo numero '+contador+' del chasis esta vacio.',
//                     animation:{
//                         speed: 500,
//                     }
//                 }).show();
//             }else{
//                 alert("entra al else del while la fila "+contador)
//                 axios.get('/verificar_chasis/'+chasis.value).
//                     then(function (valor) {
//                         alert("esta dentro del axios la fila "+contador)
//                     for (let i=0;i<valor.data.length; i++){
//                         if (valor.data[i].res == 2){
//                             new Noty({
//                                 type: 'error',
//                                 layout: 'topRight',
//                                 text: 'El numero de chasis '+chasis.value+' ya existe.',
//                                 animation:{
//                                     speed: 500,
//                                 }
//                             }).show();
//                         }
//                     }
//                 });
//             }
//             contador +=1;
//         }
//
//     }else{
//         e.preventDefault();
//         new Noty({
//             type: 'warning',
//             layout: 'topRight',
//             text: 'Tienes que registrar minimo una motocicleta.',
//             animation:{
//                 speed: 500,
//             }
//         }).show();
//     }
// })



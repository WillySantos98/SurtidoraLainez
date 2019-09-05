function FormEntregaPlacas() {
    let valor = document.getElementById("FormEntregaPlaca-SelectEntrega");
    let file = document.getElementById("FormEntregaPlaca-File");
    let bandera = 0;
    if((/^[1-9]+$/).test(valor.value)){
        valor.style.border = "thick solid #00FF00";
        bandera += 1
    }else{
        valor.style.border = "thick solid #FF0000";
    }
    if (file.files.length == 0){
    }else {
        bandera += 1
    }

    if (bandera == 2) {
        document.getElementById("Boton-Submit-Form").disabled = false;
    }else if (bandera < 2){
        document.getElementById("Boton-Submit-Form").disabled = true;
    }
}

function EnviarForm() {
    document.getElementById("FormEntregaPlaca").submit();
}

if (document.getElementById("Boton-Submit-Form")){
    document.getElementById("Boton-Submit-Form").disabled = true;
}


function DesabilitarInput() {
    document.getElementById("Boton-Submit-Form").disabled = true;
    document.getElementById("FormCliente").submit();
}


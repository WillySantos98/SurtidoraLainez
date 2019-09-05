function FormRegistro2() {
    let doc_entrada = document.getElementById("FormRegistro2-documentos")
    let bandera = 0;
    let contador = document.getElementById("InputValores").value
    let c = 0;

    if (doc_entrada.files.length == 0){
        doc_entrada.style.border = "thick solid #FF0000";
    }else{
        bandera += 1;
        doc_entrada.style.border = "thick solid #00FF00";
    }
    var controlador = false;
    while (contador > c ){
        c +=1;
        let casco = document.getElementById("FormRegistro2-SelectCasco-"+c);
        let bateria = document.getElementById("FormRegistro2-SelectBateria-"+c);
        let acido = document.getElementById("FormRegistro2-SelectAcido-"+c);
        let llaves = document.getElementById("FormRegistro2-SelectLlaves-"+c);
        let garantia = document.getElementById("FormRegistro2-SelectGarantia-"+c);
        let f_moto = document.getElementById("FormRegistro2-FileMotos-"+c);

        if((/^[0-9]+$/).test(casco.value)){
            controlador = true;
            casco.style.border = "thick solid #00FF00";
        }else{
            bandera = 0
            casco.style.border = "thick solid #FF0000"
        }

        if((/^[0-9]+$/).test(bateria.value)){
            controlador = true;
            bateria.style.border = "thick solid #00FF00";
        }else{
            bandera = 0;
            bateria.style.border = "thick solid #FF0000"
        }

        if((/^[0-9]+$/).test(acido.value)){
            controlador = true;
            acido.style.border = "thick solid #00FF00";
        }else{
            bandera = 0
            acido.style.border = "thick solid #FF0000"
        }

        if((/^[0-9]+$/).test(llaves.value)){
            controlador = true;
            llaves.style.border = "thick solid #00FF00";
        }else{
            bandera = 0;
            llaves.style.border = "thick solid #FF0000"
        }
        //
        if((/^[0-9]+$/).test(garantia.value)){
            controlador = true;
            garantia.style.border = "thick solid #00FF00";
        }else{
            bandera = 0
            garantia.style.border = "thick solid #FF0000"
        }
        //
        if (f_moto.files.length == 0){
            f_moto.style.border = "thick solid #FF0000";
            bandera = 0
        }else{
            controlador =  true
            f_moto.style.border = "thick solid #00FF00";
        }

    }

    if (bandera == 1 && controlador == true) {
        document.getElementById("Boton-Submit-Form").disabled = false;
    }else if (bandera < 1){
        document.getElementById("Boton-Submit-Form").disabled = true;
    }
}

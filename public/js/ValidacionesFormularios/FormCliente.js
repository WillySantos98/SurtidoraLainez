$('#FormCliente').on('change', function () {
    let nombres = document.getElementById("FormCliente-NombresCliente");
    let apellidos = document.getElementById("FormCliente-ApellidosCliente");
    let identidad = document.getElementById("FormCliente-IdentidadCliente");
    let telefono = document.getElementById("FormCliente-Telefono");
    let direccion = document.getElementById("FormCliente-Direcciones");
    let file = document.getElementById("FormCliente-File");
    let bandera = 0;

    if(nombres.value.length > 4){
        bandera += 1;
        nombres.style.border = "thick solid #00FF00";
    }else{
        nombres.style.border = "thick solid #FF0000";
    }
    if(apellidos.value.length > 4){
        bandera += 1;
        apellidos.style.border = "thick solid #00FF00";
    }else{
        apellidos.style.border = "thick solid #FF0000";
    }
    if(identidad.value.length == 13 && (/^[0-9]+$/).test(identidad.value)){
        bandera += 1;
        identidad.style.border = "thick solid #00FF00";
    }else{
        identidad.style.border = "thick solid #FF0000";
    }
    if(telefono.value.length == 8  && (/^[0-9]+$/).test(telefono.value)){
        bandera += 1;
        telefono.style.border = "thick solid #00FF00";
    }else{
        telefono.style.border = "thick solid #FF0000";
    }
    if (direccion.value.length > 5){
        bandera += 1;
        direccion.style.border = "thick solid #00FF00";
    }else{
        direccion.style.border = "thick solid #FF0000";
    }
    if (file.files.length == 0){
        file.style.border = "thick solid #FF0000";
    }else {
        let extensiones = /(.jpg|.png|.jpeg|.pdf)$/i;
        var nombreFile = '';
        let file_malos = [];
        let fotosPesadas = [];
        let pdfPesados = [];
        let extFile = '';
        let b =0;
        for (let i = 0; i<file.files.length; i++){
            nombreFile = file.files[i].name;
            if (!extensiones.exec(nombreFile)){
                file_malos.push(nombreFile)
            }
            extFile = file.files[i].name.split('.').pop();
            if (extFile == "png" | extFile == "jpeg" | extFile == "jpg"){
                if (file.files[i].size > 2097152){
                    fotosPesadas.push(nombreFile)
                }
            }
            if (extFile == 'pdf'){
                if (file.files[i].size > 10485760){
                    pdfPesados.push(nombreFile)
                }
            }

        }
        if (file_malos.length > 0){
            alert("Estos archivos no tienen extension valida"+file_malos);
            file.style.border = "thick solid #FF0000";
            b += 1;
        }if (fotosPesadas.length > 0){
            alert("Estas fotos pesan mas de 2 megas"+fotosPesadas);
            file.style.border = "thick solid #FF0000";
            b +=1;
        }if (pdfPesados.length > 0){
            alert("Estos pdf pesan mas de 10 megas"+pdfPesados);
            file.style.border = "thick solid #FF0000";
            b +=1;
        }if (b == 0){
            file.style.border ="thick solid #00FF00";
            bandera += 1;
        }
    }

    if (bandera == 6) {
        document.getElementById("Boton-Submit-Form").disabled = false;
    }else if (bandera < 6){
        document.getElementById("Boton-Submit-Form").disabled = true;
    }
})



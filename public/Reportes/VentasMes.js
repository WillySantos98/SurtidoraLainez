var pathname = window.location.pathname;
function btnSeccionMarcas(val) {
    if(val == 1){
        if ($("#ReporteMarcas-1").is(':visible')){
            $("#ReporteMarcas-1").css("display", "none");
        }else if ($("#ReporteMarcas-2-completo").is(':visible')){
            $("#ReporteMarcas-2-completo").css("display", "none");
            $("#ReporteMarcas-1").css("display", "block");
        }else if($("#ReporteMarcas-3").is(':visible')){
            $("#ReporteMarcas-3").css("display", "none");
            $("#ReporteMarcas-1").css("display", "block");
        }else{
            $("#ReporteMarcas-1").css("display", "block");
        }
    }
    if(val == 2){
        if ($("#ReporteMarcas-2-completo").is(':visible')){
            $("#ReporteMarcas-2-completo").css("display", "none");
        }else if($("#ReporteMarcas-1").is(':visible')){
            $("#ReporteMarcas-1").css("display", "none");
            $("#ReporteMarcas-2-completo").css("display", "block");
        }else if($("#ReporteMarcas-3").is(':visible')){
            $("#ReporteMarcas-3").css("display", "none");
            $("#ReporteMarcas-2-completo").css("display", "block");
        }else{
            $("#ReporteMarcas-2-completo").css("display", "block");
        }
    }

    if (val == 3){
        if ($("#ReporteMarcas-3").is(':visible')){
            $("#ReporteMarcas-3").css("display", "none");
        }else if($("#ReporteMarcas-2-completo").is(':visible')){
            $("#ReporteMarcas-2-completo").css("display", "none");
            $("#ReporteMarcas-3").css("display", "block");
        }else if($("#ReporteMarcas-1")){
            $("#ReporteMarcas-1").css("display", "none");
            $("#ReporteMarcas-3").css("display", "block");
        }else{
            $("#ReporteMarcas-3").css("display", "block");
        }
    }
}

if (pathname == '/sl/reportes'){
    $("#ReporteMarcas-1").css("display", "display");
    $("#ReporteMarcas-2-completo").css("display", "none");
    $("#ReporteMarcas-3").css("display", "none");
    let RMotocicletas = $("#ReporteMarcas-1");
    let arrayMarcas = [];
    let contador = [];
    let cont = 0;
    let bandera = 1;
    axios.get('/sl/ventasmarcas/'+bandera).then(
        function (marcas) {
            for (let i = 0; i<marcas.data.length; i++){
                if (!arrayMarcas.includes(marcas.data[i].nombre)){
                    arrayMarcas.push(marcas.data[i].nombre)
                    for (let e =0; e<marcas.data.length; e++){
                        if (marcas.data[e].nombre == marcas.data[i].nombre){
                            cont +=1;
                        }
                    }
                    contador.push(cont);
                    cont= 0;
                }
            }
            var chartVentasMarcas = new Chart(RMotocicletas, {
                type: 'bar',
                data: {
                    labels: arrayMarcas,
                    datasets: [{
                        label: 'Ventas Total Por Marcas',
                        data: contador,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
            });


        }
    )
    let fecha = new Date();
    let anio = fecha.getFullYear();
    ventasReportesMarcas(22)
    ventasRportesMarcasAnos(anio)

}

function ventasReportesMarcas(val) {
    let fecha = new Date();
    let ano = fecha.getFullYear();
    let AmesString = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
    let mesS = '';
    for (let i =1 ; i<=AmesString.length; i++){
        if (val == i){
            mesS = AmesString[i-1];
        }
    }
    if (val == 22){
        let mes = fecha.getMonth();
        mes = mes + 1;
        if (mes < 10){
            mes = '0'+mes;
        }

        axios.get('/sl/ventasmarcas/fecha/'+mes+'/'+ano).then(
            function (marcas) {
                mesS = 'mes actual'
                ventasReportesMarcasFechas(marcas.data, mesS)
            }
        )
    }else {
        axios.get('/sl/ventasmarcas/fecha/'+val+'/'+ano).then(
            function (marcas) {
                ventasReportesMarcasFechas(marcas.data, mesS)
            }
        )
    }
}

function ventasReportesMarcasFechas(marcas, m) {
    let arrayMarcas = [];
    let contador = [];
    let cont = 0;
    let html = ''
    let RMotocicletas2 = $("#ReporteMarcas-2");
    for (let i = 0; i < marcas.length; i++) {
        if (!arrayMarcas.includes(marcas[i].nombre)) {
            arrayMarcas.push(marcas[i].nombre)
            for (let e = 0; e < marcas.length; e++) {
                if (marcas[e].nombre == marcas[i].nombre) {
                    cont += 1;
                }
            }
            contador.push(cont);
            cont = 0;
        }
    }

    var chartVentasMarcasMes = new Chart(RMotocicletas2, {
        type: 'bar',
        data: {
            labels: arrayMarcas,
            datasets: [{
                label: 'Ventas Total Por Marcas Mensual de '+m,
                data: contador,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

    // chartVentasMarcasMes.clear();

}

function ventasRportesMarcasAnos(anio) {
    axios.get('/sl/ventasmarcas/fecha/'+anio).then(
        function (marcas) {
            let arrayMarcas = [];
            let contador = [];
            let cont = 0;
            let RMotocicletas3 = $("#ReporteMarcas-3");
            for (let i = 0; i < marcas.data.length; i++) {
                if (!arrayMarcas.includes(marcas.data[i].nombre)){
                    arrayMarcas.push(marcas.data[i].nombre)
                    for (let e =0; e<marcas.data.length; e++){
                        if (marcas.data[e].nombre == marcas.data[i].nombre){
                            cont +=1;
                        }
                    }
                    contador.push(cont);
                    cont= 0;
                }
            }
            var chartVentasMarcasAno = new Chart(RMotocicletas3, {
                type: 'bar',
                data: {
                    labels: arrayMarcas,
                    datasets: [{
                        label: 'Ventas Total Por Marcas anual de '+anio,
                        data: contador,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
            });
        }
    )
}


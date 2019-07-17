function cargarEmpleados2(val) {
    var id = val;
    let html = "<option value=''>-----</option>";
    axios.get('/cargar_empleados/'+id).
    then(function (empleados) {
        console.log(empleados.data);
        for(var i=0; i< empleados.data.length; i++){
            html +=`
                    <option value="${empleados.data[i].id}">${empleados.data[i].nombre}</option>
                `
        }
        var elemento = document.getElementById('SelectEmpleadoSucursal2');
        elemento.innerHTML=html;

        axios.get('/cargar_motos_x_sucursal/'+id).
            then(function (motos) {
            let html2 = "";
            for (var i = 0; i < motos.data.length; i++){
                html2 +=`
                <tr >
                    <td>${motos.data[i].id_moto}</td>
                    <td>${motos.data[i].chasis}</td>
                    <td>${motos.data[i].motor}</td>
                    <td>${motos.data[i].nombre_mar}</td>
                    <td>${motos.data[i].nombre_mod}</td>
                    <td>${motos.data[i].color}</td>
                    <td><button class="btn btn-outline-success"  data-dismiss="modal" value="${motos.data[i].id}.${motos.data[i].id_moto}.${motos.data[i].motor}.${motos.data[i].chasis}.${motos.data[i].nombre_mod}.${motos.data[i].nombre_alm}.${motos.data[i].nombre_mar}.${motos.data[i].color}" 
                    onclick="AddFilaFormTransferenciaInterna(this.value)"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></td>
                </tr>
                `
            }

            var elemento2 = document.getElementById('TablaMotoTransferencia');
            elemento2.innerHTML = html2;
        })
    });
}



function AddFilaFormTransferenciaInterna(valor) {
    var arreglo = valor;
    var datos = arreglo.split('.');
    var id = datos[0], codigo = datos[1], motor = datos[2], chasis = datos[3], marca = datos[6], modelo = datos[4], almacen = datos[5], color = datos[7];
    $('#tBodyFormTransferenciaInterna').append(
        '<tr id="fila-'+id+'">'+
            '<td>'+codigo+'</td>'+
            '<td>'+chasis+'</td>'+
            '<td>'+motor+'</td>'+
            '<td>'+marca+'</td>'+
            '<td>'+modelo+'</td>'+
            '<td>'+color+'</td>'+
            '<td>'+almacen+'</td>'+
            '<td><button class="btn btn-outline-danger QuitarFilaFormTransferencia" type="button"><i class="fa fa-minus-square" aria-hidden="true"></i></button></td>'+
            '<td><input type="text" value="'+id+'" name="IdMotocicleta[]" hidden></td>'+
        '</tr>'
    )
}

$(document).on('click', '.QuitarFilaFormTransferencia', function () {
    $(this).parent().parent().remove();

});

function addCliente(val) {
    var cadena = val;
    var datos = cadena.split('.');
    var id = datos[0];
    var nombres = datos[1];
    var apellidos = datos[2];
    var identidad = datos[3];
    var rtn = datos[4];
    document.getElementById("InputNombres").innerHTML = '<input type="text" value="'+nombres+'" class="form-control" readonly>';
    document.getElementById("InputApellidos").innerHTML = '<input type="text" value="'+apellidos+'" class="form-control" readonly>';
    document.getElementById("InputIdentidad").innerHTML = '<input type="text" value="'+identidad+'" class="form-control" readonly>';
    document.getElementById("InputRtn").innerHTML = '<input type="text" value="'+rtn+'" class="form-control" readonly>';
    document.getElementById("InputId").innerHTML = '<input type="text" name="IdCliente" value="'+id+'" class="form-control" hidden>';
}
function addMoto(valor) {
    var cadena = valor;
    var datos = cadena.split('.');
    var id = datos[0];
    var marca = datos[1];
    var modelo = datos[2];
    var chasis = datos[3];
    var motor = datos[4];
    var color = datos[5];
    document.getElementById("InputMarca").innerHTML = '<input type="text" value="'+marca+'     '+modelo+'" class="form-control" readonly>';
    document.getElementById("InputChasis").innerHTML = '<input type="text" value="'+chasis+'" class="form-control" readonly>';
    document.getElementById("InputMotor").innerHTML = '<input type="text" value="'+motor+'" class="form-control" readonly>';
    document.getElementById("InputColor").innerHTML = '<input type="text" value="'+color+'" class="form-control" readonly>';
    document.getElementById("InputIdMoto").innerHTML = '<input type="text" value="'+id+'" name="IdMoto" class="form-control" hidden>';
}
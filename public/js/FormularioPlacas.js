function VinculacionMoto(val) {
    var cadena = val;
    var datos = cadena.split('.');
    let id = datos[0];
    let marca=datos[1], modelo=datos[2], chasis=datos[3], motor=datos[4], color=datos[5], ano=datos[6], cilindraje=datos[7], nombres=datos[8], apellidos=datos[9], identidad=datos[10], rtn=datos[11];
    let idSalida = datos[12], sucursal = datos[13], idSucursal = datos[14];

    document.getElementById("BoletaMarca").innerHTML = marca;
    document.getElementById("BoletaModelo").innerHTML = modelo;
    document.getElementById("BoletaColor").innerHTML =  color;
    document.getElementById("BoletaMotor").innerHTML = motor;
    document.getElementById("BoletaChasis").innerHTML = chasis;
    document.getElementById("BoletaAno").innerHTML = ano;
    document.getElementById("BoletaCil").innerHTML = cilindraje;
    document.getElementById("BoletaNombres").innerHTML = nombres;
    document.getElementById("BoletaApellidos").innerHTML = apellidos;
    document.getElementById("BoletaIdentidad").innerHTML = identidad;
    document.getElementById("BoletaRtn").innerHTML = rtn;
    document.getElementById("BoletaSucursal").innerHTML = sucursal;
    document.getElementById("BoletaInputIdMoto").innerHTML = '<input name="IdMoto" value="'+id+'" type="text" hidden>';
    document.getElementById("BoletaInputIdVenta").innerHTML = '<input name="IdVenta" value="'+idSalida+'" type="text" hidden>';
    document.getElementById("BoletaInputIdSucursal").innerHTML = '<input name="IdSucursal" value="'+idSucursal+'" type="text" hidden>';

}

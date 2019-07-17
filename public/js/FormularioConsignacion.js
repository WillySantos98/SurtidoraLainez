
function AgregarRegistrosConsignacion(){
  var chasis = document.getElementById("NumChasisFormConsignacion").value;
  var motor = document.getElementById("NumMotorFormConsignacion").value;
  var color = document.getElementById("ColorFormConsignacion").value;
  var ano = document.getElementById("AnoFormConsignacion").value;
  var observacion = document.getElementById("ObservacionFormConsignacion").value;
  var idMarca = document.getElementById("IdMarcaFormConsignacion").value;
  var idModelo = document.getElementById("IdModeloFormConsignacion").value;

  $(document).ready(function () {
      var i = 1;

      $('#BtnAddRegistroConsignacion').click(function () {
          i++;
          $('#CuerpoFormularioConsignado').append('<tr>' +
              '<td>' +
              '<input type="text" class="form-control" value="'+chasis+'" required name="Chasis[]"' +
              '</td>' +
              '<td>' +
              '<input type="text" class="form-control" value="'+motor+'" required name="Motor[]"' +
              '</td>' +
              '</tr>');
      });
      $(document).on('click', '.btn_remove', function () {
          $(this).parent().parent().remove();

      });
  });
  // let contenedor = document.createElement('tr');
  // let td = document.createElement('td');
  // let InputChasis = document.createElement('input');
  // InputChasis.name = "chasis[]";
  // InputChasis.value = chasis;
  // InputChasis.class = "form-control"
  // let InputMotor = document.createElement('input');
  // InputMotor.name = "motor[]";
  // InputMotor.value = motor;
  // InputMotor.class = "form-control"
  //
  // contenedor.appendChild(td);
  // contenedor.appendChild(InputChasis);
  // contenedor.appendChild(InputMotor)
  //
  // let element = document.getElementById('CuerpoFormularioConsignado')
  // element.appendChild(contenedor)


}

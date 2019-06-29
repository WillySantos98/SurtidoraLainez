function cargarEmpleados(val) {
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
        var elemento = document.getElementById('SelectEmpleadoSucursal');
        elemento.innerHTML=html;
    });
}

function cargarmodelos(val) {
    var id = val;
    let html ="<option value=''>-----</option>";
    axios.get('/cargar_modelos/'+id).
        then(function (modelos) {
        console.log(modelos.data);
        for(var i=0; i< modelos.data.length; i++){
            html +=`
                    <option value="${modelos.data[i].id}">${modelos.data[i].nombre_mod}</option>
                `
        }
        var elemento = document.getElementById('SelectModelo');
        elemento.innerHTML=html;
    })
}

function cargardatosmodelos(val) {
    var id = val;
    let html= '';
    console.log(id);
    axios.get('/cargar_datos_modelos/'+id).
        then(function (datosmodelos) {
        console.log(datosmodelos.data);
        for(var i=0; i< datosmodelos.data.length; i++){
            html +=`

            <div class="row form-group">
              <div class="col">
                <label>Marca</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].idm}" id="IdMarcaFormConsignacion"  class="form-control" hidden >
                <input type="text" value="${datosmodelos.data[i].nombre}"  class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Modelo</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].nombre_mod}" id="ModeloFormConsignacion" class="form-control" readonly>
                <input type="text" value="${datosmodelos.data[i].idmod}" hidden id="IdModeloFormConsignacion" class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Cilindraje</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].cilindraje} cc"  class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Tipo de Motocicleta</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].nombre_v}" class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Cantidad de Ruedas</label>
              </div>
              <div class="col">
                <input type="text" value="${datosmodelos.data[i].ruedas}" class="form-control" readonly>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label># de Chasis</label>
              </div>
              <div class="col">
                <input type="text" id="NumChasisFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label># de Motor</label>
              </div>
              <div class="col">
                <input type="text" id="NumMotorFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Color</label>
              </div>
              <div class="col">
                 <input type="text" id="ColorFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Ano</label>
              </div>
              <div class="col">
                 <input type="number" id="AnoFormConsignacion" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <label>Observacion</label>
              </div>
              <div class="col">
                <textarea class="form-control" id="ObservacionFormConsignacion" id="Observacion" value="En Perfecto Estado" rows="3"></textarea>
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="CheckCasco" id="CheckCasco" >
                    <label for="CheckCasco">Casco</label>
                    <input type="checkbox" name="CheckLlaves" id="CheckLlaves" >
                    <label for="CheckLlaves">Llaves</label>
                    <input type="checkbox" name="CheckAcido" id="CheckAcido" >
                    <label for="CheckAcido">Acido</label>
                    <input type="checkbox" id="CheckBateria" name="CheckBateria">
                    <label for="CheckBateria">Bateria</label>
                    <input type="checkbox" id="CheckGarantia"  name="CheckGarantia">
                    <label for="CheckGarantia">Hoja de Garantia</label>
                </div>
              </div>
            </div>
                `
        }
        var elemento = document.getElementById('CuerpoModalFormularioConsignado');
        elemento.innerHTML=html;
    })
}



function MotosPorCliente(value) {
    let id = value;
    axios.get('/compras_x_cliente/'+id).
    then(function (compras) {
        let html = '';
        if (compras.data.length == 0){
            html +=`
                    <p>Este cliente no tiene motocicletas asignadas a su nombre</p>
                `
        }else{
            for (var i = 0; i < compras.data.length; i++){
                html +=`
                <div class="card shadow mb-4">
                   <a href="#collapseCompras-${compras.data[i].id}" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
                    <h6 class="m-0 font-weight-bold text-primary">${compras.data[i].nombre} - ${compras.data[i].nombre_mod}</h6>
                   </a>
               </div>
    
                <div class="collapse" id="collapseCompras-${compras.data[i].id}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="col">
                                <div class="row">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Chasis</th>
                                                <th>Motor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>${compras.data[i].chasis}</td>
                                                <td>${compras.data[i].motor}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Color</th>
                                                <th>Generar Permiso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>${compras.data[i].color}</td>
                                                <td><a href="/permiso/circulacion_sin_placa/${compras.data[i].salida}" target="_blank" class="btn btn-outline-success">Generar Permiso</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
            }
        }

        let elemento = document.getElementById("bodyComprasCliente");
        elemento.innerHTML = html;
    })
}

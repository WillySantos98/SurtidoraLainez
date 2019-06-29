function cargarInventarioSucursal(val) {
    var id = val;
    let html = "";
    axios.get('/inventario/motocicletas/cargarmotos/'+id).
    then(function (datos_sucursal) {
        console.log(datos_sucursal.data);
        for(var i=0; i< datos_sucursal.data.length; i++){
            html +=`
                    <tr>
                        <td>${datos_sucursal.data[i].nombre_mar}</td>
                        <td>${datos_sucursal.data[i].nombre_mod}</td>
                        <td>${datos_sucursal.data[i].color}</td>
                        <td>${datos_sucursal.data[i].ano}</td>
                        <td>${datos_sucursal.data[i].id_moto}</td>
                        <td>${datos_sucursal.data[i].chasis}</td>
                        <td>${datos_sucursal.data[i].motor}</td>
                        <td>${datos_sucursal.data[i].nombre}</td>
                        <td><a href="/inventario/motocicletas/ficha/${datos_sucursal.data[i].id_moto}">ver ficha</a></td>
                    </tr>
               `
        }
        var elemento = document.getElementById('BodyInventarioSucursal');
        elemento.innerHTML=html;
    });
}

function cargarmarcas(val) {
    var id = val;
    let html = "<option value=''>-----</option>";
    axios.get('/mostrar_marcas/'+id).
    then(function (marcas) {
        console.log(marcas.data);
        for(var i=0; i< marcas.data.length; i++){
            html +=`
                    <option value="${marcas.data[i].id}">${marcas.data[i].nombre}</option>
                `
        }
        var elemento = document.getElementById('SelectMarca');
        elemento.innerHTML=html;
    });
}

feather.replace();

$('#ModalEditContacto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var nombre = button.data('nombrep');
    var tel = button.data('tel');
    var correo = button.data('email');
    var nom = button.data('nombre');
    var funcion = button.data('funcion');
    var modal = $(this);
    modal.find('.modal-body #NombreProveedor').val(nombre);
    modal.find('.modal-body #Id').val(id);
    modal.find('.modal-body #Correo').val(correo);
    modal.find('.modal-body #Telefono').val(tel);
    modal.find('.modal-body #NombreContacto').val(nom);
    modal.find('.modal-body #Funcion').val(funcion);
    modal.find('.modal-header #titulo').html("Editando el contacto "+nom);
});




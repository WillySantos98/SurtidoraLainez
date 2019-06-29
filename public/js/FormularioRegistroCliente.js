$(document).ready(function () {
    var i = 1;
    $('#BtnRegistroTelefono').click(function () {
        i++;
        $('#TableTelefono').append('<tr>' +
            '<td>' +
            '<input type="tel" class="form-control" id="TelefonosCliente'+i+'" required name="TelefonosClientes[]" placeholder="99999999">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-danger btn_remove"><i data-feather="plus"></i></button>' +
            '</td>' +
            '</tr>');
    });
    $(document).on('click', '.btn_remove', function () {
        $(this).parent().parent().remove();

    });
});

$(document).ready(function () {
    var i = 0;
    $('#BtnFile').click(function () {
        i++;
        $('#TableDocumentos').append('<tr><td><input type="file" class="form-control" required name="Documentos[]"></td><td>' +
            '<button type="button" class="btn btn-danger btn_remove_dc">\n' +
            '                    <i data-feather="plus"></i>\n' +
            '                </button></td></tr>')
    });
    $(document).on('click', '.btn_remove_dc', function () {
        $(this).parent().parent().remove();

    });
});
$(document).ready(function () {
    var i = 1;
    $('#BtnRegistroDireccion').click(function () {
        i++;
        $('#TableDirecciones').append('<tr><td><textarea class="form-control" id="DireccionesCliente" name="DireccionesClientes[]" rows="3"></textarea><td>' +
            '<button type="button" class="btn btn-danger btn_remove_dir">\n' +
            '                    <i data-feather="plus"></i>\n' +
            '                </button>' +
            '</td></td></tr>')
    });
    $(document).on('click', '.btn_remove_dir', function () {
        $(this).parent().parent().remove();
    })
})
$('#ModalEntradaDocumentos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var nombre = button.data('nombre');
    var modal = $(this);
    modal.find('.modal-header #titulo').html("Documentos del numero de entrada "+nombre);
});

$(document).ready(function () {
    $("#btnVistaFoto").click(function () {
        $("#VistaFoto").each(function () {
            displaying = $(this).css("display");
            if(displaying == "block"){
                $(this).fadeOut('slow', function () {
                    $(this).css("display","none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display","block")
                });
            }
        });
    });

    $("#btnVistaPDF").click(function () {
        $("#VistaPDF").each(function () {
            displayin = $(this).css("display");
            if (displayin == "block"){
                $(this).fadeOut('slow', function () {
                    $(this).css("display","none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display","block");
                });
            }
        });
    });

    $("#VistaPDF").each(function () {
        displayin = $(this).css("display");
        if (displayin == "block"){
            $(this).fadeOut('slow', function () {
                $(this).css("display","none");
            });
        } else {
            $(this).fadeIn('slow', function () {
                $(this).css("display","block");
            });
        }
    });

    $("#VistaFoto").each(function () {
        displaying = $(this).css("display");
        if(displaying == "block"){
            $(this).fadeOut('slow', function () {
                $(this).css("display","none");
            });
        } else {
            $(this).fadeIn('slow', function () {
                $(this).css("display","block")
            });
        }
    });
});

$(document).ready(function () {
    $("#btnVistaFotoMoto").click(function () {
        $("#VistaFotoMoto").each(function () {
            displaying = $(this).css("display");
            if(displaying == "block"){
                $(this).fadeOut('slow', function () {
                    $(this).css("display","none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display","block")
                });
            }
        });
    });

    $("#btnVistaPDFMoto").click(function () {
        $("#VistaPDFMoto").each(function () {
            displayin = $(this).css("display");
            if (displayin == "block"){
                $(this).fadeOut('slow', function () {
                    $(this).css("display","none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display","block");
                });
            }
        });
    });

    $("#VistaPDFMoto").each(function () {
        displayin = $(this).css("display");
        if (displayin == "block"){
            $(this).fadeOut('slow', function () {
                $(this).css("display","none");
            });
        } else {
            $(this).fadeIn('slow', function () {
                $(this).css("display","block");
            });
        }
    });

    $("#VistaFotoMoto").each(function () {
        displaying = $(this).css("display");
        if(displaying == "block"){
            $(this).fadeOut('slow', function () {
                $(this).css("display","none");
            });
        } else {
            $(this).fadeIn('slow', function () {
                $(this).css("display","block")
            });
        }
    });
});

$('#ModalDocumentos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var nombre = button.data('nombre');
    var modal = $(this);
    modal.find('.modal-header #titulo').html("Documentos de "+nombre);
});

$(document).ready(function () {
    $("#btnVistaFotoCliente").click(function () {
        $("#VistaFotoCliente").each(function () {
            displaying = $(this).css("display");
            if(displaying == "block"){
                $(this).fadeOut('slow', function () {
                    $(this).css("display","none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display","block")
                });
            }
        });
    });

    $("#btnVistaPDFCliente").click(function () {
        $("#VistaPDFCliente").each(function () {
            displayin = $(this).css("display");
            if (displayin == "block"){
                $(this).fadeOut('slow', function () {
                    $(this).css("display","none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display","block");
                });
            }
        });
    });

    $("#VistaPDFCliente").each(function () {
        displayin = $(this).css("display");
        if (displayin == "block"){
            $(this).fadeOut('slow', function () {
                $(this).css("display","none");
            });
        } else {
            $(this).fadeIn('slow', function () {
                $(this).css("display","block");
            });
        }
    });

    $("#VistaFotoCliente").each(function () {
        displaying = $(this).css("display");
        if(displaying == "block"){
            $(this).fadeOut('slow', function () {
                $(this).css("display","none");
            });
        } else {
            $(this).fadeIn('slow', function () {
                $(this).css("display","block")
            });
        }
    });
});
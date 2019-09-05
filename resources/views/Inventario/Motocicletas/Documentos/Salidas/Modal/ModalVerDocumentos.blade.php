<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalAddDocumentosVentas">
                Agregar Documentos
            </button>
            <input type="text" id="InputCod" hidden>
            <input type="text" id="InputId" hidden>
            <hr>
            <div style="overflow-y: scroll; height: 400px">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyDocumentosVentas">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $('#ModalDocumentosVentas').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var cod = button.data('cod');
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-header #titulo').html("Documentos de la venta "+cod);
        modal.find('.modal-body #InputCod').val(cod);
        modal.find('.modal-body #InputId').val(id);

    });

    if(document.getElementById("tbodyDocumentosVentas")){
        let dominio = document.domain
        let html = '';
        if(dominio == 'surtidoralainez.com'){
            html +=`
            @foreach($doc as $info)
                <tr>
                    <td><a href="{{asset('documentos/ventas/'.$info->nombre)}}" target="_blank" class="card-link"><i data-feather="file"></i> {{$info->nombre}}</a></td>
                    </tr>
            @endforeach
            `
            document.getElementById("tbodyDocumentosVentas").innerHTML = html;
        }else if(dominio == 'multiservicioscomercialestito.com'){
            html +=`
            @foreach($doc as $info)
            <tr>
                <td><a href="{{asset('/public/documentos/ventas/'.$info->nombre)}}" target="_blank" class="card-link"><i data-feather="file"></i> {{$info->nombre}}</a></td>
                </tr>
            @endforeach
            `
            document.getElementById("tbodyDocumentosVentas").innerHTML = html;
        }
    }

</script>

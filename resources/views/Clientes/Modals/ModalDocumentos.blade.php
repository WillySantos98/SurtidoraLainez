<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <button id="btnVistaPDFCliente" class="btn btn-outline-danger">Vista Documento</button>
            <button id="btnVistaFotoCliente" class="btn btn-outline-success">Vista Imagen</button>
            <div id="VistaPDFCliente">
                @include('Clientes.componentes.VistaPDF')
            </div>
            <div id="VistaFotoCliente">
                @include('Clientes.componentes.GaleriaDocumentos')
            </div>
        </div>
    </div>
</div>

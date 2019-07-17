<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <button id="btnVistaPDF" class="btn btn-outline-danger"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i> Vista PDF</button>
            <button id="btnVistaFoto" class="btn btn-outline-success"><i class="fa fa-file-image-o fa-fw" aria-hidden="true"></i> Vista Imagen</button>
            <div id="VistaFoto">
                @include('Inventario.Motocicletas.Componentes.GaleriaEntradaDocumentos')
            </div>
            <div id="VistaPDF">
                @include('Inventario.Motocicletas.Componentes.VistaDocumentosPDF')
            </div>
        </div>
    </div>
</div>

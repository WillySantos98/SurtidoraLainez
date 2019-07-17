<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Vista de Documentos de la Motocicleta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <button id="btnVistaPDFMoto" class="btn btn-outline-danger">Vista Documento</button>
            <button id="btnVistaFotoMoto" class="btn btn-outline-success">Vista Imagen</button>
            <div id="VistaPDFMoto">
                @include('Inventario.Motocicletas.Componentes.PDFMotos')
            </div>
            <div id="VistaFotoMoto">
                @include('Inventario.Motocicletas.Componentes.GaleriaMotos')
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>

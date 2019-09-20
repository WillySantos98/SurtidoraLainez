<div class="row">
    <div class="col"><h6 class="text-gray-400 text-center">Datos de la Venta</h6></div>
</div>
<div class="row">
    <div class="col"><strong>Codigo de la Venta:</strong>{{$info->cod_venta}}</div>
</div>
<div class="row">
    <div class="col"><strong>Numero de Factura:</strong>{{$info->num_venta}}</div>
</div>
<div class="row">
    <div class="col"><strong>Tipo de Venta:</strong>{{$info->nombre_ven}}</div>
</div>
<div class="row">
    <div class="col"><strong>Fecha de Venta:</strong>{{$info->fecha_salida}}</div>
</div>
<div class="row">
    <div class="col-auto"></div>
    <div class="col-auto"></div>
</div>
<div class="row">
    <div class="col-auto">
        <button class="btn btn-outline-warning" data-toggle="modal" data-id="{{$info->id}}" data-num="{{$info->num_venta}}" data-cod="{{$info->cod_venta}}" data-target="#ModalEditNumFactura">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-primary" data-toggle="modal" data-id="{{$info->id}}" data-cod="{{$info->cod_venta}}" data-target="#ModalDocumentosVentas">
            <i class="fa fa-file" aria-hidden="true"></i>
        </button>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="ModalDocumentosVentas" tabindex="-1" role="dialog" aria-labelledby="ModalDocumentosVentas" aria-hidden="true">
@include('Inventario.Motocicletas.Documentos.Salidas.Modal.ModalVerDocumentos')
</div>

<div class="modal fade" id="ModalAddDocumentosVentas" tabindex="-1" role="dialog" aria-labelledby="ModalAddDocumentosVentas" aria-hidden="true">
@include('Inventario.Motocicletas.Documentos.Salidas.Modal.ModalAddDocumentos')
</div>

<div class="modal fade" id="ModalEditNumFactura" tabindex="-1" role="dialog" aria-labelledby="ModalEditNumFactura" aria-hidden="true">
    @include('Inventario.Motocicletas.Documentos.Salidas.Modal.ModalEditNumFactura')
</div>

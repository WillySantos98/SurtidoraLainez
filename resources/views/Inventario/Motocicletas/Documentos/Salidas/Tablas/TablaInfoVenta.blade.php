<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 13px">Cod. de Venta</th>
        <th class="text-center" style="font-size: 13px">Num. de Venta</th>
        <th class="text-center" style="font-size: 13px">Tipo de Venta</th>
        <th class="text-center" style="font-size: 13px">Fecha de Venta</th>
        <th class="text-center" style="font-size: 13px">Documentos</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-center" style="font-size: 13px">{{$info->cod_venta}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->num_venta}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_ven}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->fecha_salida}}</td>
        <td class="text-center" style="font-size: 13px">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-id="{{$info->id}}" data-cod="{{$info->cod_venta}}" data-target="#ModalDocumentosVentas">
                <i data-feather="file"></i>
            </button>

        </td>
    </tr>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="ModalDocumentosVentas" tabindex="-1" role="dialog" aria-labelledby="ModalDocumentosVentas" aria-hidden="true">
@include('Inventario.Motocicletas.Documentos.Salidas.Modal.ModalVerDocumentos')
</div>

<div class="modal fade" id="ModalAddDocumentosVentas" tabindex="-1" role="dialog" aria-labelledby="ModalAddDocumentosVentas" aria-hidden="true">
@include('Inventario.Motocicletas.Documentos.Salidas.Modal.ModalAddDocumentos')
</div>
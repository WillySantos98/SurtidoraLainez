<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 13px"># de Entrada</th>
        <th class="text-center" style="font-size: 13px"># de Documento de Entrada</th>
        <th class="text-center" style="font-size: 13px"># de Transferencia</th>
        <th class="text-center" style="font-size: 13px">Fecha de Entrada</th>
        <th class="text-center" style="font-size: 13px">Tipo de Entrada</th>
        <th class="text-center" style="font-size: 13px">Encargado</th>
        <th class="text-center" style="font-size: 13px">Sucursal de Entrada</th>
        <th class="text-center" style="font-size: 13px">Doc</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-center" style="font-size: 13px"><a href="/inventario/motocicletas/documentos/entrada/{{$info->cod_entrada}}">{{$info->cod_entrada}}</a></td>
        <td class="text-center" style="font-size: 13px">{{$info->guia_remision}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->num_transferencia}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->fecha_entrada}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_ent}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_col}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_suc}}</td>
        <td CLASS="text-center">
            <button class="btn btn-warning" data-toggle="modal" data-target="#ModalEntradaDocumentos"
                    data-nombre="{{$info->cod_entrada}}"> <i class="fa fa-file" aria-hidden="true"></i></button>
        </td>
    </tr>
    </tbody>
</table>

<div class="modal fade bd-example-modal-xl" id="ModalEntradaDocumentos" tabindex="-1" role="dialog" aria-labelledby="ModalEntradaDocumentosDocumentos" aria-hidden="true">
    @include('Inventario.Motocicletas.Modals.ModalEntradaDocumentos')
</div>
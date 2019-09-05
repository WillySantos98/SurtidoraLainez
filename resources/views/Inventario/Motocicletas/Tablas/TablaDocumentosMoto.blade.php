<h6>Informacion Tecnica de la Entrada de la Motocicleta</h6>
<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 14px">Casco</th>
        <th class="text-center" style="font-size: 14px">Hoja de Garantia</th>
        <th class="text-center" style="font-size: 14px">Bateria</th>
        <th class="text-center" style="font-size: 14px">Acido de Bateria</th>
        <th class="text-center" style="font-size: 14px">Llaves</th>
        <th class="text-center" style="font-size: 14px">Documentos</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @if($info_m->casco == 1)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-success"><i data-feather="check"></i></span></td>
        @else
            <td class="text-center" style="font-size: 14px"><span class="badge badge-danger"><i data-feather="x"></i></span></td>
        @endif
        @if($info_m->hoja_garantia == 1)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-success"><i data-feather="check"></i></span></td>
        @else
            <td class="text-center" style="font-size: 14px"><span class="badge badge-danger"><i data-feather="x"></i></span></td>
        @endif
        @if($info_m->bateria == 1)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-success"><i data-feather="check"></i></span></td>
        @else
            <td class="text-center" style="font-size: 14px"><span class="badge badge-danger"><i data-feather="x"></i></span></td>
        @endif
        @if($info_m->acido_bateria == 1)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-success"><i data-feather="check"></i></span></td>
        @else
            <td class="text-center" style="font-size: 14px"><span class="badge badge-danger"><i data-feather="x"></i></span></td>
        @endif
        <td class="text-center" style="font-size: 14px">{{$info_m->llaves}}</td>
        <td class="text-center" style="font-size: 14px">
            <button class="btn btn-success" data-toggle="modal" data-id="{{$info_m->id}}" data-target="#ModalDocumentosMotos">
                <i class="fa fa-file" aria-hidden="true"></i></button>
        </td>
    </tr>
    </tbody>
</table>

<div class="modal fade bd-example-modal-xl" id="ModalDocumentosMotos" tabindex="-1" role="dialog" aria-labelledby="ModalDocumentosMotos" aria-hidden="true">
    @include('Inventario.Motocicletas.Modals.ModalVistaDocMotos')
</div>

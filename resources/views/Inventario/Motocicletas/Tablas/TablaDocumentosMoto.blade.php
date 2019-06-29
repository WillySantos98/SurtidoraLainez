<h6>Informacion Tecnica de la Entrada de la Motocicleta</h6>
<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 14px">Casco</th>
        <th class="text-center" style="font-size: 14px">Hoja de Garantia</th>
        <th class="text-center" style="font-size: 14px">Bateria</th>
        <th class="text-center" style="font-size: 14px">Acido de Bateria</th>
        <th class="text-center" style="font-size: 14px">Llaves</th>
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

    </tr>
    </tbody>
</table>
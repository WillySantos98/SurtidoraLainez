<h6>Datos Fisicos de la Motocicleta</h6>
<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 14px"># de Motor</th>
        <th class="text-center" style="font-size: 14px"># de Chasis</th>
        <th class="text-center" style="font-size: 14px">Color</th>
        <th class="text-center" style="font-size: 14px">Ano</th>
        <th class="text-center" style="font-size: 14px">Estado en Piso</th>
        <th class="text-center" style="font-size: 14px">Observacion de Entrada</th>
        <th class="text-center" style="font-size: 14px">Hubicacion Actual</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-center" style="font-size: 14px">{{$info_f->motor}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_f->chasis}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_f->color}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_f->ano}}</td>
        @if($info_f->estado == 1)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-success">Disponible</span></td>
        @elseif($info_f->estado == 2)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-warning">Vendida</span></td>
        @elseif($info_f->estado == 3)
            <td class="text-center" style="font-size: 14px"><span class="badge badge-danger">Transferencia Externa</span></td>
        @elseif($info_f->estado == 5)
            <td class="text-center" style="font-size: 14px; color: white"><span class="badge" style="background-color: orangered;">En Transferencia Interna</span></td>
        @endif
        <td class="text-center" style="font-size: 14px">
            <button class="btn btn-success" data-toggle="modal" data-target="#ModalEntradaObservacion" data-nombre="{{$info_f->observacion}}"
            data-id="{{$info_f->id}}">
                <i class="fa fa-comment" aria-hidden="true"></i></button>
        </td>
        <td class="text-center" style="font-size: 14px">{{$info_f->nombre_suc}}</td>
    </tr>
    </tbody>
</table>
<div class="modal fade" id="ModalEntradaObservacion" tabindex="-1" role="dialog" aria-labelledby="ModalEntradaObservacion" aria-hidden="true">
    @include('Inventario.Motocicletas.Modals.ModalEntradaObservacion')
</div>
<div style="overflow-y: scroll; height: 180px">
    <table class="table">
        <thead>
        <tr>
            <th class="text-center" style="font-size: 14px">Codigo</th>
            <th class="text-center" style="font-size: 14px">Marca</th>
            <th class="text-center" style="font-size: 14px">Modelo</th>
            <th class="text-center" style="font-size: 14px">Chasis</th>
            <th class="text-center" style="font-size: 14px">Motor</th>
            <th class="text-center" style="font-size: 14px">Ano</th>
            <th class="text-center" style="font-size: 14px">Observacion</th>
            <th class="text-center" style="font-size: 14px">Fotos</th>
        </tr>
        </thead>
        <tbody>
        @foreach($DatosMotos as $info_f)
            <tr>
                <td class="text-center" style="font-size: 14px"><a href="/inventario/motocicletas/ficha/{{$info_f->id_moto}}">{{$info_f->id_moto}}</a></td>
                <td class="text-center" style="font-size: 14px">{{$info_f->nombre_mar}}</td>
                <td class="text-center" style="font-size: 14px">{{$info_f->nombre_mod}}</td>
                <td class="text-center" style="font-size: 14px">{{$info_f->chasis}}</td>
                <td class="text-center" style="font-size: 14px">{{$info_f->motor}}</td>
                <td class="text-center" style="font-size: 14px">{{$info_f->nombre_mar}}</td>
                <td class="text-center" style="font-size: 14px">
                    <button class="btn btn-success" data-toggle="modal" data-target="#ModalEntradaObservacion" data-nombre="{{$info_f->observacion}}"
                            data-id="{{$info_f->id}}">
                        <i class="fa fa-comment" aria-hidden="true"></i></button>
                </td>
                <td class="text-center" style="font-size: 14px">
                    <button class="btn btn-success disabled" data-toggle="modal" data-target="#ModalEntradaFotos">
                        <i class="fa fa-file-image" aria-hidden="true"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="ModalEntradaObservacion" tabindex="-1" role="dialog" aria-labelledby="ModalEntradaObservacion" aria-hidden="true">
    @include('Inventario.Motocicletas.Modals.ModalEntradaObservacion')
</div>
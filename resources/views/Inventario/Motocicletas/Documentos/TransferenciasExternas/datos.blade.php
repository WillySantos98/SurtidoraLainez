<h6 class="text-center">Datos</h6>
<table class="table table-hover table-sm">
    <thead>
    <tr>
        <th>Sucursal de Salida</th>
        <th>Responsable de la Salida</th>
        <th>Usuario Registrador</th>
        <th>Fecha de Salida</th>
        <th>Observacion</th>
        <th>Lugar de Destino</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$trans->nombre_suc}}</td>
        <td>{{$trans->nombre_col}}</td>
        <td>{{$trans->usuario}}</td>
        <td>{{$trans->fecha_decision}}</td>
        <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#ModalObservaciontransferenciaExterna">
                Observacion
            </button></td>
        <td>{{$trans->destino}}</td>
    </tr>
    </tbody>
</table>

<div class="modal fade" id="ModalObservaciontransferenciaExterna" tabindex="-1" role="dialog" aria-labelledby="ModalObservaciontransferenciaExterna" aria-hidden="true">
    @include('Inventario.Motocicletas.Documentos.TransferenciasExternas.ModalObservacion')
</div>
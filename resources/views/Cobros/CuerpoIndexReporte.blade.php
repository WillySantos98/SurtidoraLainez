<div class="d-flex flex-row-reverse bd-highlight">
    <div class="p-2 bd-highlight"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAddAccionReporte">+ Añadir Acción</button></div>
</div>

<table class="table table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Forma Contactado</th>
            <th>Resultado</th>
            <th>Nivel</th>
            <th>Usuario</th>
            <th>Observacion</th>
        </tr>
    </thead>
    <tbody id="TbodyTableCuerpoReporte">

    </tbody>
</table>

<div class="modal fade" id="ModalAddAccionReporte" tabindex="-1" role="dialog" aria-labelledby="ModalAddAccionReporte" aria-hidden="true">
    @include('Cobros.ModalAddAccion')
</div>
<div class="modal fade" id="ModalObservacionReporte" tabindex="-1" role="dialog" aria-labelledby="ModalObservacionReporte" aria-hidden="true">
    @include('Cobros.ModalObservacion')
</div>

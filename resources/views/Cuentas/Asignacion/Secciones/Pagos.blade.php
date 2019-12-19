<h4 class="text-center">Asignacion de Pagos</h4>
<div>
    <table class="table table-bordered table-sm table-hover" style="font-size: 12px">
        <thead>
            <tr>
                <th>Pago</th>
                <th>Pago</th>
                <th>Debe</th>
                <th>Cantidad Pagada</th>
                <th>Nuevo Debe</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="TbodyTableRegistrarPagosAsignacion">

        </tbody>
    </table>
    <span>Las cuotas que no postees y que estan atrasados, el dia de mañana ya tendran la mora correspondiente a los dias atrasados.</span>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end">
{{--                <button type="button" class="btn btn-outline-warning btn-sm" style="margin-right: 5px" >Registrar Precio Inicial</button>--}}
                <a class="btn btn-outline-success btn-sm" href="{{route('cuentas.index')}}">Terminar Registro de la Cuenta</a>
            </div>
        </div>
    </div>
</div>

<h4 class="text-center">Sección de modificación</h4>
<div class="row">
    <div class="col-auto card">
        <h5 class="text-center"><strong>Mora</strong></h5>
        @foreach($cuentas as $cuenta)
            <h6>% de la mora actual de la cuenta: {{$cuenta->mora * 100}}%</h6>
            <h6>Total de mora de la cuenta: L.{{$cuenta->total_intereses}}</h6>
        @endforeach
        <h6 class="text-center">Acciones</h6>
        <form action="{{route('mod.porcentaje')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-auto"><strong>1.</strong></div>
                <input type="text" hidden value="{{$cod}}" name="cod">
                <div class="col-auto"><input type="number" name="porcentaje" style="width: 70px" class="form-control"></div>
                <div class="col-auto"><input type="submit" class="btn btn-outline-primary" value="Registrar nuevo %"
                                             data-toggle="tooltip" data-placement="top" title="Ingresar Nuevo % de mora"></div>
            </div>
        </form>
        <form action="{{route('mod.cambiartotal')}}" method="post">
            @csrf
            <div class="row" style="margin-top: 5px">
                <div class="col-auto"><strong>2.</strong></div>
                <input type="text" hidden value="{{$cod}}" name="cod">
                <div class="col-auto"><input type="number" name="total" style="width: 100px" class="form-control"></div>
                <div class="col-auto"><input type="submit" class="btn btn-outline-primary" value="Registrar nuevo total"
                                             data-toggle="tooltip" data-placement="top" title="Reducir o aumentar el total de la mora"></div>
            </div>
        </form>
        <form action="{{route('mod.cero')}}" method="post">
            <div class="row" style="margin-top: 5px">
                @csrf
                <div class="col-auto"><strong>3.</strong></div>
                <div class="col-auto">
                    <input type="text" hidden value="{{$cod}}" name="cod">
                    <input type="submit" class="btn btn-outline-primary btn-block" value="Dejar en 0 la mora"
                           data-toggle="tooltip" data-placement="top" title="Dejar el total de la mora en L.0">
                </div>
            </div>
        </form>
    </div>
    <div class="col-auto card">
        <h5 class="text-center"><strong>Fecha de pago</strong></h5>
        @foreach($cuentas as $cuenta)
            <h6>Dias de gracia: {{$cuenta->dias_gracia}}%</h6>
            @if($cuenta->intervalo_pago == 1)
                <h6>Intervalo de pago: Mensual</h6>
            @elseif($cuenta->intervalo_pago == 2)
                <h6>Intervalo de pago: Quincenal</h6>
            @endif
        @endforeach
        <h6 class="text-center">acciones</h6>
        <form action="">
            <div class="row" style="margin-top: 5px">
                <div class="col-auto"><strong>1.</strong></div>
                <div class="col-auto"><input type="number" name="dias" style="width: 70px;" class="form-control"></div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-outline-primary" value="Registrar dias de gracia"
                           data-toggle="tooltip" data-placement="top" title="Cambiar la cantidad de dias de gracia">
                </div>
            </div>
        </form>
        <form action="">
            <div class="row" style="margin-top: 5px">
                <div class="col-auto"><strong>2.</strong></div>
                <div class="col-auto">
                    <select name="SelectIntervalo" id="" class="form-control">
                        <option value="1">Mensual</option>
                        <option value="2">Quincenal</option>
                    </select>

                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-outline-primary" value="Registrar intervalo"
                           data-toggle="tooltip" data-placement="top" title="Camniar el intervalo de pago">
                </div>
            </div>
        </form>
    </div>
{{--    <div class="col card">--}}
{{--        <h5 class="text-center"><strong>Consecuencias</strong></h5>--}}
{{--        <p>Se tiene que estar conciente de que cada accion que se--}}
{{--        realice va a impactar significativamente la cuenta.</p>--}}
{{--        <p><strong>Nuevo % de mora</strong>, esta acción lo que realiza es--}}
{{--        calcular todas las moras con un nuevo porcentaje de mora.</p>--}}
{{--        <p><strong>Nuevo total de mora</strong>, esta accion reduce el total--}}
{{--        de la mora. Advertencia, no elimina las moras pendientes, lo que hace--}}
{{--        es nivelar las moras para que sumen el nuevo total ingresado.</p>--}}
{{--        <p><strong>Dejar mora en 0</strong>, esta accion deja la mora de la--}}
{{--        cuenta en 0. Advertencia, no eliminar las moras pendientes, si el--}}
{{--        cliente se vuelve atrasar ese pago de mora que se dejo en L.0 se--}}
{{--        reactivara nuevamente</p>--}}
{{--    </div>--}}
</div>

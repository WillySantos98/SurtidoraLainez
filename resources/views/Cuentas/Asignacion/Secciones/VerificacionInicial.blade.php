@foreach($salidas as $salida)
<h4 class="text-center">Verificacion de Informacion General del Cliente y Salida</h4>
    <div class="row">
        <div class="col-auto card border-left-success" style="padding: 5px; margin-right: 5px">
            <h5 class="text-center">Información del cliente</h5>
            <div class="row">
                <div class="col-auto"><strong>Nombre Completo:</strong></div>
                <div class="col-auto">{{$salida->nombres}} {{$salida->apellidos}}</div>
            </div>
            <div class="row">
                <div class="col-auto"><strong>Identidad:</strong></div>
                <div class="col-auto">{{$salida->identidad}}</div>
            </div>
            <div class="row">
                <div class="col-auto"><strong>Rtn:</strong></div>
                <div class="col-auto">{{$salida->rtn}}</div>
            </div>
        </div>

        <div class="col card border-left-success" style="padding: 5px">
            <h5 class="text-center">Información del Articulo</h5>
            <div class="row">
                <div class="col-auto"><strong>Marca:</strong></div>
                <div class="col-auto">{{$salida->nombre}}</div>
            </div>
            <div class="row">
                <div class="col-auto"><strong>Modelo:</strong></div>
                <div class="col-auto">{{$salida->nombre_mod}}</div>
            </div>
            <div class="row">
                <div class="col-auto"><strong>Codigo:</strong></div>
                <div class="col-auto"><a href="">{{$salida->id_moto}}</a></div>
            </div>
            <div class="row">
                <div class="col-auto"><strong>chasis:</strong></div>
                <div class="col-auto">{{$salida->chasis}}</div>
            </div>
            <div class="row">
                <div class="col-auto"><strong>Salida:</strong></div>
                <div class="col-auto"><a href="">{{$salida->cod_venta}}</a></div>
                <input type="text" value="{{$salida->id}}" hidden id="CodigoSalidaAsignacion">
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 10px">
        <p>Si la información es correcta presione el siguiente paso para introducir la información general de la cuenta.</p>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-success btn-sm" onclick="SeccionHabilitar(2)">Siguiente paso</button>
            </div>
        </div>
    </div>
@endforeach

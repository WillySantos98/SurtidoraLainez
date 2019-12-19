@extends('Index.base')
@section('title', 'Cotizador')
@section('content')

<div class="card border-left-primary">
    <div class="d-flex justify-content-between" style="padding: 5px">
        @include('Index.componentes.ButtonBack')
        <h4 class="text-gray-500">Cotizador de Surtidora Lainez</h4>
    </div>
    <hr>
    <div class="row" style="padding: 5px">
        <div class="col-auto">
            <div class="row">
                <div class="col">
                    <h3 class="text-center text-gray-400">Datos de la Cotización</h3>
                </div>
            </div>
            <form action="{{route('cotizaciones.save')}}" method="post" id="FormCotizacion" onchange="ValidacionFormCotizacion()">
                @csrf
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="text" class="form-control" id="FormCotizacion-Nombres" name="Nombre" required placeholder="Nombre del cliente">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Apellido" required id="FormCotizacion-Apellidos" placeholder="Apellidos del cliente">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Identificacion"  placeholder="Identificacion del cliente">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="text" class="form-control" id="FormCotizacion-Telefono" required name="Telefono" placeholder="Telefono">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <textarea name="Direccion" class="form-control" id="FormCotizacion-Direccion" cols="30" rows="4" placeholder="Dirección. Atras del colegio ITDES, barrio Buenos Aires, Trujillo, Colon"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select id="FormCotizacion-SelectSucursal" required  class="form-control" onchange="cargarEmpleados(this.value)">
                                <option value="0">--Selecciona Sucursal</option>
                                @foreach($sucursales as $sucursal)
                                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select id="SelectEmpleadoSucursal" name="SelectEmpleado" required class="form-control">
                                <option value="0">--Selecciona Empleado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select name="SelectTipoCotizacion" required class="form-control" id="FormCotizacion-SelectTipoCotizacion">
                                <option value="0">--Tipo de Cotización</option>
                                @foreach($tipo_cotizacion as $tipo_c)
                                    <option value="{{$tipo_c->id}}">{{$tipo_c->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <select name="SelectMarca" required id="FormCotizacion-SelectMarca" class="form-control" onchange="cargarmodelos(this.value)">
                                <option value="0">--Seleccione Marca</option>
                                @foreach($marcas as $marca)
                                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select name="selectModelo" id="SelectModelo" class="form-control" onchange="Cotizar(this.value)">
                                <option value="0">--Seleccione Modelo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="CotizacionOculto">
                    <input type="text" id="FormCotizacion-Input-PrecioContado" hidden name="PrecioFinanciado">
                    <input type="text" id="FormCotizacion-Input-Cuota" name="PrecioCuota" hidden>
                    <input type="text" id="FormCotizacion-Input-Prima" name="PrecioPrima" hidden>
                    <input type="text" id="FormCotizacion-Input-PrecioVenta" name="PrecioVenta" hidden>
                    <input type="text" id="FormCotizacion-Input-Meses" name="PrecioMeses" hidden>
                    <input type="text" id="FormCotizacion-Input-Intervalo" name="PrecioIntervalo" hidden>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" disabled class="btn btn-outline-primary" id="FormCotizacion-Submit" value="Registrar Cotización">
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="row">
                <div class="col"><h3 class="text-gray-400 text-center">Información de Pagos</h3></div>
            </div>
            <div class="card border-left-warning">
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><h4><strong>Precio:</strong></h4></div>
                    <div class="col-auto" ><h4 id="Cotizacion-PrecioContado">L.</h4></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong>Cuota Mensual:</strong></div>
                    <div class="col-auto" id="Cotizacion-CuotaMensual"></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong>Duración de la Financiación:</strong></div>
                    <div class="col-auto" id="Cotizacion-Tiempo"></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong>Intervalo de Pago:</strong></div>
                    <div class="col-auto" id="Cotizacion-Intervalo"></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong>Cuota a Pagar:</strong></div>
                    <div class="col-auto" id="Cotizacion-CuotaFinal"></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong># de Pagos:</strong></div>
                    <div class="col-auto" id="Cotizacion-NumPagos"></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong>Total Acumnulado:</strong></div>
                    <div class="col-auto" id="Cotizacion-Total"></div>
                </div>
                <div class="row" style="padding: 3px">
                    <div class="col-auto"><strong>Prima:</strong></div>
                    <div class="col-auto" id="Cotizacion-Prima">L.</div>
                </div>
                <form action="" onchange="FormCotizacionParte2()">
                    <div class="row" style="padding: 3px">
                        <div class="col-auto">Tipo de Venta: </div>
                        <div class="col-auto">
                            <select class="form-control" name="SelectTipoVenta" id="FormCotizacion-SelectTipoVenta" disabled onchange="ElegirTipoVenta(this.value)">
                                <option value="1">Contado</option>
                                <option value="2">Crédito</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding: 3px">
                        <div class="col-auto">Intervalo de Pago:</div>
                        <div class="col-auto" >
                            <select id="FormCotizacion-SelectIntervalo" disabled required class="form-control" >
                                <option value="0">Selecciona un Intervalo</option>
                                <option value="1">Mensual</option>
                                <option value="2">Quincenal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding: 3px">
                        <di class="col-auto">Meses que durará el crédito: </di>
                        <div class="col-auto"><input type="number" class="form-control" placeholder="Meses" disabled id="FormCotizacion-InputMeses"></div>
                    </div>
                    <div class="row" style="padding: 3px ">
                        <div class="col-auto">Prima: </div>
                        <div class="col-auto" >
                            <input class="form-control" id="FormCotizacion-InputPrima" value="0" disabled >
                        </div>
                        <div class="col-auto" id="FormCotizacion-PartePrimaMinima"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function ValidacionFormCotizacion() {
        let correcto ="thick solid #00FF00";
        let incorrecto = "thick solid #FF0000";
        let nombres = document.getElementById("FormCotizacion-Nombres");
        let apellidos = document.getElementById("FormCotizacion-Apellidos");
        let telefono = document.getElementById("FormCotizacion-Telefono");
        let direccion = document.getElementById("FormCotizacion-Direccion");
        let sucursal = document.getElementById("FormCotizacion-SelectSucursal");
        let Empleado = document.getElementById("SelectEmpleadoSucursal");
        let Cotizacion = document.getElementById("FormCotizacion-SelectTipoCotizacion");
        let Marca = document.getElementById("FormCotizacion-SelectMarca");
        let Modelo =document.getElementById("SelectModelo");
        let band = 0;
        if (nombres.value.length > 2){
            nombres.style.border = correcto;
            band +=1;
        }else{
            nombres.style.border = incorrecto
        }
        if (apellidos.value.length > 3 ){
            apellidos.style.border =correcto;
            band +=1;
        }else{
            apellidos.style.border = incorrecto;
        }
        if (direccion.value.length > 9){
            direccion.style.border = correcto;
            band +=1;
        }else{
            direccion.style.border = incorrecto;
        }
        if (telefono.value.length == 8 && (/^[0-9]+$/).test(telefono.value)){
            telefono.style.border = correcto
            band +=1
        }else{
            telefono.style.border = incorrecto;
        }
        if(sucursal.value !=0){
            sucursal.style.border = correcto;
            band +=1;
            if (Empleado.value != 0){
                Empleado.style.border = correcto;
                band +=1;
            }else{
                Empleado.style.border = incorrecto;
            }
        }else{
            sucursal.style.border =incorrecto;
            Empleado.style.border = incorrecto;
        }
        if (Cotizacion.value !=0){
            Cotizacion.style.border = correcto;
            band +=1;
        }else{
            Cotizacion.style.border = incorrecto;
        }
        if (Marca.value !=0){
            Marca.style.border = correcto
            band +=1;
            if (Modelo.value != 0){
                Modelo.style.border = correcto
                band +=1;
            }else{
                Modelo.style.border = incorrecto;
            }
        }else{
            Marca.style.border= incorrecto;
            Modelo.style.border = incorrecto;
        }

        if (band ==9){
            document.getElementById("FormCotizacion-Submit").disabled = false
            document.getElementById("FormCotizacion-SelectTipoVenta").disabled = false
        }
    }

    var pathname = window.location.pathname;
    if (pathname == '/cotizaciones/'){
        var precio_c;
        var prima;
        var margen_anual;
        var cuota;
        var pagos;
        var nuevo_cu;
        var html = '';
        var html2 = '';
        var html3 = '';
        var html4 = '';
        var precio_db;
    }
    function Cotizar(id) {
        axios.get('/cotizaciones/precios_modelos/'+id).then(
            function (precio) {
                if (precio.data.length > 0){
                    precio_db = precio.data;
                    precio_c = precio_db[0].precio2;
                    prima = precio_db[0].prima_minima;
                    margen_anual = precio_db[0].margen_anual;
                    cuota = precio_c;
                    contado();
                }else if(precio.data.length < 1){
                    alert("El vehiculo que selecciono no tiene precio aun, contacta al supervisor para asignale precio")

                }
            }
        )
    }

    function ElegirTipoVenta(val) {
        if(val == 1){
            document.getElementById("FormCotizacion-InputMeses").disabled = true
            document.getElementById("FormCotizacion-InputMeses").value = '';
            document.getElementById("FormCotizacion-SelectIntervalo").disabled = true
            document.getElementById("FormCotizacion-InputPrima").disabled = true
            document.getElementById("FormCotizacion-SelectIntervalo").value = 0;
            document.getElementById("FormCotizacion-InputPrima").value = 0;
            document.getElementById("FormCotizacion-Submit").disabled = false
            contado()
        }else if(val == 2){
            document.getElementById("FormCotizacion-InputMeses").disabled =false
            document.getElementById("FormCotizacion-SelectIntervalo").disabled =false
            document.getElementById("FormCotizacion-InputPrima").disabled = false
            document.getElementById("FormCotizacion-Submit").disabled = true
        }
    }

    function contado() {
        pagos = 1;
        document.getElementById("FormCotizacion-Input-PrecioContado").value = precio_c
        document.getElementById("Cotizacion-Prima").innerHTML = 'L.0';
        document.getElementById("FormCotizacion-Input-Cuota").value = precio_c
        document.getElementById("Cotizacion-PrecioContado").innerHTML = 'L.'+precio_c;
        document.getElementById("Cotizacion-CuotaMensual").innerHTML = 'L.0';
        document.getElementById("Cotizacion-Tiempo").innerHTML = 0 + ' Meses';
        document.getElementById("Cotizacion-Intervalo").innerHTML = 'Un solo pago porque es precio de contado';
        document.getElementById("Cotizacion-CuotaFinal").innerHTML = 'L.'+0;
        document.getElementById("Cotizacion-NumPagos").innerHTML = 1;
        document.getElementById("Cotizacion-Total").innerHTML = 'L.'+pagos*precio_c;

        document.getElementById("FormCotizacion-PartePrimaMinima").innerHTML = 'La prima mínima recomendada es L.'+prima
        document.getElementById("FormCotizacion-Input-Prima").value = 0;
        document.getElementById("FormCotizacion-Input-PrecioVenta").value = precio_c;
        FormEscondidoMeses = document.getElementById("FormCotizacion-Input-Meses").value = 0;
        FormEscondidoIntervalo = document.getElementById("FormCotizacion-Input-Intervalo").value = 0;
    }

    function FormCotizacionParte2() {
        let FormParte2InputMeses = document.getElementById("FormCotizacion-InputMeses");
        let FormParte2InputIntervalo = document.getElementById("FormCotizacion-SelectIntervalo");
        let FormParte2InputPrima = document.getElementById("FormCotizacion-InputPrima");
        let FormEscondidoPrecioContado = document.getElementById("FormCotizacion-Input-PrecioContado").value;
        let FormEscondidoCuota = document.getElementById("FormCotizacion-Input-Cuota");
        let FormEscondidoPrima = document.getElementById("FormCotizacion-Input-Prima");
        let FormEscondidoPrecioVenta = document.getElementById("FormCotizacion-Input-PrecioVenta");
        let FormEscondidoMeses = document.getElementById("FormCotizacion-Input-Meses");
        let FormEscondidoIntervalo = document.getElementById("FormCotizacion-Input-Intervalo");
        let bandera = 0;
        let nuevo_saldo = 0;
        if (FormParte2InputMeses.value.length >= 1){
            bandera+= 1;
        }
        if (FormParte2InputIntervalo.value !=0){
            bandera += 1;
        }
        if (FormParte2InputPrima.value.length >= 0){
            bandera +=1;
        }
        if (bandera == 3){
            document.getElementById("FormCotizacion-Submit").disabled = false
            let anualidad_mensual = 0;
            let saldo_nuevo = 0;
            let cuota_intervalo = 0;
            let total_acumulado = 0;
            anualidad_mensual = margen_anual/12;
            let suma1 = (1 + anualidad_mensual);
            let meses = FormParte2InputMeses.value;
            let suma2 = Math.pow(suma1, -meses);
            let suma3 = suma2 - 1;
            let suma4 = suma3/anualidad_mensual;
            nuevo_saldo = FormEscondidoPrecioContado - FormParte2InputPrima.value;
            nuevo_cu = -nuevo_saldo/suma4;
            cuota_intervalo = Math.round(nuevo_cu)/FormParte2InputIntervalo.value;
            total_acumulado = Math.round(parseInt(FormParte2InputPrima.value) + parseInt(cuota_intervalo * (meses * FormParte2InputIntervalo.value))) //Precio
            FormEscondidoCuota.value = Math.round(nuevo_cu);
            FormEscondidoPrima.value = FormParte2InputPrima.value;
            FormEscondidoPrecioVenta.value = total_acumulado;
            FormEscondidoMeses.value = meses;
            FormEscondidoIntervalo.value = FormParte2InputIntervalo.value;
            if (FormParte2InputPrima.value < prima){
                document.getElementById("FormCotizacion-PartePrimaMinima").innerHTML = '<strong style="color: red">Estas disminuyendo la prima minina que es de  L.'+prima+'</strong>'
            }else if (FormParte2InputPrima.value > prima){
                document.getElementById("FormCotizacion-PartePrimaMinima").innerHTML = '<strong style="color: green">Prima arriba del minimo que es L.'+prima+'</strong>'
            }
            // alert(FormParte2InputPrima.value)
            document.getElementById("Cotizacion-Prima").innerHTML = 'L.'+FormParte2InputPrima.value //este es de prima
            document.getElementById("Cotizacion-CuotaMensual").innerHTML = Math.round(nuevo_cu).toFixed(2); //aca es donde se pone la cuota mensual
            document.getElementById("Cotizacion-Tiempo").innerHTML = meses + ' Meses'; //Dureacion del Financiamiento
            if (FormParte2InputIntervalo.value == 1){
                document.getElementById("Cotizacion-Intervalo").innerHTML = 'Mensual'; //intervalo de pago
            }else if(FormParte2InputIntervalo.value == 2){
                document.getElementById("Cotizacion-Intervalo").innerHTML = 'Quincenal'; //intervalo de pago
            }
            document.getElementById("Cotizacion-CuotaFinal").innerHTML = cuota_intervalo.toFixed(2); //Cuota a Pagar
            document.getElementById("Cotizacion-NumPagos").innerHTML = meses * FormParte2InputIntervalo.value+' -----La prima no esta incluida';//Numero de Pagos
            document.getElementById("Cotizacion-Total").innerHTML = ((meses * FormParte2InputIntervalo.value) * (cuota_intervalo)).toFixed(2);//Total acumulado
            document.getElementById("Cotizacion-PrecioContado").innerHTML = Math.round(((meses * FormParte2InputIntervalo.value) * (cuota_intervalo) + parseInt(FormParte2InputPrima.value))).toFixed(2) ;
        }

    }

</script>

@endsection

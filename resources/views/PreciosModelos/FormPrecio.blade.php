<div class="row">
    <div class="col">
        <form action="{{route('preciomodelos.save')}}" method="post" id="FormPrecioModelo" onchange="ValidarFormPrecioModelo()">
            <h5 class="text-center ">Ingreso de Precio de Modelos</h5>
            @csrf
            @foreach($modelos as $modelo)
                <input type="text" hidden name="ModeloMoto" value="{{$modelo->id}}">
                <input type="text" hidden name="ModeloNombre" value="{{$modelo->nombre_mod}}">
                @break
            @endforeach
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Seleccione un Impuesto</label>
                                <select name="SelectImpuesto" id="SelectImpuesto" class="form-control">
                                    <option value="0">Seleccione un Impueto</option>
                                    @foreach($impuesto as $imp)
                                        <option value="{{$imp->id}}">{{$imp->nombre}} - {{$imp->impuesto}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Precio Sin Impuesto</label>
                                <input type="text" name="PrecioSimImp" class="form-control" required placeholder="Precio Sin Impuesto" id="InputPrecioSI">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Margen de Utilidad</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="MargenUtilidad" required  class="form-control" placeholder="Ingresar Margen en decimal" id="InputMargenUtilidad">
                                    </div>
                                    <div class="col" id="DivMargenUtilidad"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Seleccione Gasto Admin.</label>
                                <select name="SelectGA" id="SelectGA" class="form-control">
                                    <option value="0">Seleccione un Gasto Adm.</option>
                                    @foreach($Gastos as $gas)
                                        <option value="{{$gas->id}}">{{$gas->nombre}} - {{$gas->cantidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Financiamiento Anual</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" required placeholder="Escribir en Decimal" name="UtilidadAnual" class="form-control" id="InputUtilidadAnual">
                                    </div>
                                    <div class="col" id="DivUtilidadAnual"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">% de Prima</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" required id="InputPrima" placeholder="escribir en decimal" class="form-control">
                                    </div>
                                    <div class="col" id="DivInputPrima">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Cantidad de Meses</label>
                                <input type="text" required id="InputMeses" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary" id="Boton-Submit-Form">Consolidar Precio</button>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Precio de Costo</label>
                                <input type="text" class="form-control" readonly id="InputPrecioCosto" name="PrecioCosto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Precio de Contado</label>
                                <input type="text" class="form-control" readonly id="InputPrecioContado" name="PrecioContado">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Financiamiento Mensual</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly class="form-control" id="InputUtilidadMensual">
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control" id="InputUtilidadMensual100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Prima Minima</label>
                                <input type="number" id="InputPrimaMinima" readonly class="form-control" name="PrimaMinima">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Saldo Inicial</label>
                                <input type="text" id="InputSaldoInicial" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Cuota Mensual</label>
                                <input type="number" id="Inputcuota"  readonly class="form-control">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>
    <div class="col">
        <div class="row">
            <div class="col">
                <h5 class="text-center">Cotizacion de Prueba</h5>
                <div style="overflow-y: scroll; height: 410px">
                    <table class="table table-sm table-hover table-responsive-lg">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha Pago</th>
                            <th>Cuota</th>
                            <th>Salda Antes</th>
                            <th>Capital</th>
                            <th>Intereses</th>
                            <th>Saldo Despues</th>
                        </tr>
                        </thead>
                        <tbody id="TbodyPruebaCotizacion" >

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h5 class="text-center">Precio Consolidado Actualmente</h5>
                <div class="card border-left-primary">
                    @foreach($precio as $p)
                        <div class="row">
                            <div class="col">
                                <strong>Marca:</strong>{{$p->nombre}}
                            </div>
                            <div class="col"><strong>Modelo:</strong>{{$p->nombre_mod}}</div>
                            <div class="col"><strong>Impuesto:</strong>{{$p->impuesto * 100}}%</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>Precio S/Imp:</strong>L.{{$p->precio_s_impuesto}}
                            </div>
                            <div class="col">
                                <strong>% de Utilidad:</strong>{{($p->margen_utilidad * 100)}}%
                            </div>
                            <div class="col">
                                <strong>Precio costo:</strong>L.{{$p->precio1}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>Gastos Admin:</strong>L.{{$p->cantidad}}
                            </div>
                            <div class="col">
                                <strong>Precio contado:</strong>L.{{$p->precio2}}
                            </div>
                            <div class="col">
                                <strong>Finan. Anual:</strong>{{$p->margen_anual * 100}}%
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>Prima minima:</strong>L.{{$p->prima_minima}}</div>
                            <div class="col"><strong>Ultima modificacion:</strong>{{$p->ultima_modificacion}}</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span>Si quieres cambiar algun datos sobre la consolidacion actual del precio de este modelo debes llenar de nuevo el formulario
                            Ingreso de Precio de Modelo y hacer pruebas, luego consolidas el precio.</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

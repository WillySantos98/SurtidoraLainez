@foreach($cuerpo as $item)
    <div class="row" style="padding: 10px">
        <div class="col-sm-6 card border border-primary">
            <h5 class="text-center">Informacion de la Cuenta</h5>
            <div class="row">
                <div class="col">Nombre del Cliente: {{$item->nombres}} {{$item->apellidos}}</div>
            </div>
            <div class="row">
                <div class="col">Identidad: {{$item->identidad}}</div>
            </div>
            <div class="row">
                <div class="col"># Cuenta: <a href="/cuenta/{{$item->cod_cuenta}}" target="_blank">{{$item->cod_cuenta}}</a></div>
            </div>
            <div class="row">
                <div class="col">Marca: {{$item->nombre}}</div>
            </div>
            <div class="row">
                <div class="col">Modelo: {{$item->nombre_mod}}</div>
            </div>
            <div class="row">
                <div class="col">Fecha de Compra: {{$item->fecha_salida}}</div>
            </div>
            <div class="row">
                <div class="col">Lugar de Compra: {{$item->nombre_suc}}</div>
            </div>
            <div class="row">
                <form action="{{route('cobros.guardar_promesa')}}" method="post">
                    @csrf
                    <input type="submit" class="btn btn- btn-outline-" value="Enviar">
                </form>
            </div>
            <div class="row">
                <div class="col">Nivel de la Cuenta:
                    @if($item->importancia ==1)
                        <span class="badge badge-info">Nivel 1 - Cobro desde caja</span>
                    @elseif($item->importancia == 2)
                        <span class="badge badge-warning">Nivel 2 - Visita del cobrador</span>
                    @elseif($item->importancia == 3)
                        <span class="badge badge-warning">Nivel 3 - Levantar articulo</span>
                    @elseif($item->importancia == 4)
                        <span class="badge badge-danger">Nivel 4 - Legal</span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Telefonos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($telefonos as $telefono)
                                <tr>
                                    <td></td>
                                    <td>{{$telefono->numero}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col card border border-primary">
            <input type="text" value="{{$item->reporte_id}}" hidden id="Input-CodReporte">
            <h5 class="text-center">Informacion de Moras</h5>
            <div class="row">
                <div class="col">
                    Estado del reporte:
                    @if($item->importancia == 1)
                        Nivel 1
                    @elseif($item->importancia == 2)
                        Nivel 2 (Visitar)
                    @elseif($item->importancia == 3)
                        Nivel 3 (Recoger Articulo)
                    @elseif($item->importancia == 4)
                        Nivel 4 (Legal)
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Edad de Mora</th>
                                <th>Total Mora</th>
                                <th>Ultima Revision</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moras as $mora)
                                <tr>
                                    <td>{{$mora->descripcion}}</td>
                                    <td>{{$mora->dias_mora}} dias</td>
                                    <td>L.{{$mora->interes}}</td>
                                    <td>{{$mora->revision}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endforeach

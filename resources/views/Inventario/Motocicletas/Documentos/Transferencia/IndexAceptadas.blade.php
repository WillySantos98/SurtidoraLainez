@extends('Index.base')
@section('title', 'Transferencias Aceptadas')
@section('content')
    @include('Inventario.Motocicletas.Documentos.encabezado')
    <hr>
    <h4 class="text-center">Transferencias Aceptadas</h4>
    <div id="CardTransferenciasAceptadas" style="overflow-y: scroll; height: 570px">
        <div class="CardTransferenciasAceptadas">
            <div class="container-fluid">
                @foreach($origen as $info)
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                                @if($info->estado_c == 1)
                                    <button class="btn btn-outline-success disabled"><i data-feather="check"></i></button>
                                @elseif($info->estado_c == 2)
                                    <button class="btn btn-outline-danger disabled"><i data-feather="x"></i></button>
                                @else
                                <button class="btn btn-outline-success disabled" style="background-color: orangered"><i data-feather="minus"></i></button>
                                @endif
                                <div>{{$info->cod_transferencia}}</div>
                                <div>Almacen de Origen: {{$info->nombre}}</div>
                            @foreach($destino as $info2)
                                @if($info->cod_transferencia == $info2->cod_transferencia)
                                    <div>Almacen de Destino: {{$info2->nombre_suc}}</div>
                                    <input type="text" value="{{$info2->cod_transferencia}}" hidden id="IdTransferenciaPDF-{{$info2->cod_transferencia}}">
                                    <div><button class="btn btn-outline-dark" value="{{$info2->cod_transferencia}}" onclick="GenerarTransferencia(this.value)">Generar Transferencia</button></div>
                                    <div><a href="/inventario/motocicletas/documentos/transferencias_internas/{{$info2->cod_transferencia}}" target="_blank">Ver Transferencia</a></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="overflow-y: scroll; height: 110px">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Motor</th>
                                    <th>Chasis</th>
                                    <th>Color</th>
                                    <th>Ano</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($motos as $info3)
                                    @if($info->cod_transferencia == $info3->cod_transferencia)
                                        <tr>
                                            <td>{{$info3->id_moto}}</td>
                                            <td>{{$info3->nombre}}</td>
                                            <td>{{$info3->nombre_mod}}</td>
                                            <td>{{$info3->motor}}</td>
                                            <td>{{$info3->chasis}}</td>
                                            <td>{{$info3->color}}</td>
                                            <td>{{$info3->ano}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                console.log("aca1");
                $("#CardTransferenciasAceptadas .CardTransferenciasAceptadas").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    console.log("aca2");
                });
            });
        });

        function GenerarTransferencia(cod) {
            let codigo = document.getElementById("IdTransferenciaPDF-"+cod).value;
            window.open('/inventario/motocicletas/documentos/transferencias/pdf/'+codigo, '_blank');
        }
    </script>
@endsection
@extends('Index.base')
@section('title', 'Placas en Transferencia')
@section('content')
<div class="row">
    <div class="col">@include('Index.componentes.ButtonBack')</div>
    <div class="col"><h4 class="text-center">Placas en Estado de Transferencias</h4></div>
    <div class="col"><input class="form-control" id="myInput" type="text" placeholder="Buscar..."></div>
</div>
    <div style="overflow-y: scroll; height: 70%; margin-top: 20px">
        <table class="table table-sm table-hover table-responsive-xl">
            <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Almacen de Destino</th>
                    <th>lote</th>
                </tr>
            </thead>
            <tbody>
                @foreach($placas as $placa)
                    <tr>
                        <td>{{$placa->cod_transferencia}}</td>
                        <td>{{$placa->nombre}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalLotePlacas" value="{{$placa->id}}" onclick="LotesPlacas(this.value)">Ver Lote</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<div class="modal fade" id="ModalLotePlacas" tabindex="-1" role="dialog" aria-labelledby="ModalLotePlacas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lote de Placas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form action="{{route('placas.transferencia.aceptada.save')}}" method="post">
                    @csrf
                    <div id="ModalLotetitulo">

                    </div>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th>Boleta</th>
                            <th>Placa</th>
                            <th>Chasis</th>
                            <th>Cliente</th>
                            <th>Viene Placa</th>
                        </tr>
                        </thead>
                        <tbody id="BodyModalLotePlacas">

                        </tbody>
                    </table>
                    <div id="PieModalLote">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function LotesPlacas(id) {
        axios.get('/lotes_placas/'+id).
            then(function (lotes) {
            console.log(lotes.data)
            let html = '';
            let bandera = 1;
            for (let i = 0; i < lotes.data.length; i++){
                if (bandera == 1){
                    html +=`
                        <div class="row">
                            <div class="col"><strong>Cod. Transferencia:</strong> ${lotes.data[i].cod_transferencia}</div>
                            <div class="col"><strong>Sucursal de Destino: </strong>${lotes.data[i].nombre}</div>
                            <input type="text" value="${lotes.data[i].id}" name="Id" hidden>
                            <input type="text" value="${lotes.data[i].id_suc}" name="IdSuc" hidden>
                        </div>
                    `
                    bandera = 2;
                    document.getElementById("ModalLotetitulo").innerHTML = html;
                    html= '';
                }
                let estado = '';
                if (lotes.data[i].estado_enlazo == 1){
                    estado = 'Si Vino'
                }if(lotes.data[i].estado_enlazo == 2){
                    estado = 'No vino'
                }
                html +=`
                    <tr>
                        <td>${lotes.data[i].num_boleta}</td>
                        <td>${lotes.data[i].num_placa}</td>
                        <td>${lotes.data[i].nombres} ${lotes.data[i].apellidos}</td>
                        <td>${lotes.data[i].chasis}</td>
                        <td>${estado}</td>
                    </tr>
                `
            }

            document.getElementById("BodyModalLotePlacas").innerHTML = html;
            html = '';
            html += '<input type="submit" class="btn btn-outline-success" value="Aceptar Transferencia">'
            document.getElementById("PieModalLote").innerHTML = html;

        })
    }
</script>
@endsection


<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Busqueda de Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <div style="overflow-y: scroll; height: 550px">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <div class="p-2 bd-highlight">
                        <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
                    </div>
                </div>
                <table class="table table-sm">
                    <thead>
                        <th colspan="2">Nombre Completo</th>
                        <th>Identidad</th>
                        <th>Rtn</th>
                        <th>Accion</th>
                    </thead>
                    <tbody id="bodyTable">
                    @foreach($clientes as $info)
                        <tr>
                            <td>{{$info->nombres}}</td>
                            <td>{{$info->apellidos}}</td>
                            <td>{{$info->identidad}}</td>
                            <td>{{$info->rtn}}</td>
                            <td><button class="btn btn-success" data-dismiss="modal" value="{{$info->id}}.{{$info->nombres}}.{{$info->apellidos}}.{{$info->identidad}}.{{$info->rtn}}" onclick="addCliente(this.value)">
                                    <i class="fa fa-arrow-right" aria-hidden="true"> Seleccionar</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('Index.componentes.buscador')

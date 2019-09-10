<div class="modal fade" id="ModalTipoUsuarios" tabindex="-1" role="dialog" aria-labelledby="ModalTipoUsuarios" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tipos de Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>Seleccione un tipo de usuario</span>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>    </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipos as $tipo)
                            <tr>
                                <td>{{$tipo->nombre}}</td>
                                <td>
                                    <button class="btn btn-outline-success" value="{{$tipo->id}}.{{$tipo->nombre}}" data-dismiss="modal" aria-label="Close" onclick="tipousuario(this.value)">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>

</div >

<script>
    function tipousuario(datos) {
        let html =''
        let array = datos.split('.');
        let id = array[0], nombre = array[1];
        html +=`
        <div style="overflow-y: scroll;height: 500px">
            <form method="post" action="{{route('usuario.permisos')}}">
                <div class="form-group">
                    <h4><strong>${nombre}</strong></h4>
                    <input class="form-control" value="${id}" hidden name="Id">
                </div>
                @foreach($secciones as $seccion)
                @csrf
                <div class="row">
                    <div class="col">
                        <h5><strong>{{$seccion->nombre}}</strong></h5>
                    </div>
                    <div class="col">
                        <select name="select-{{$seccion->nombre}}" class="form-control">
                            <option value="0"># {{$seccion->nombre}}</option>
                            <option value="{{$seccion->id}}">Si</option>
                        </select>
                    </div>
                </div>
                @foreach($subsecciones as $sub)
                    @if($sub->seccion_id == $seccion->id)
                        <div class="row">
                            <div class="col">
                                <h6>{{$sub->nombre}}</h6>
                            </div>
                            <div class="col">
                                <select name="select-sub-{{$sub->codigo}}" class="form-control">
                                    <option value="0">#</option>
                                    <option value="{{$sub->codigo}}">Si</option>
                                </select>
                            </div>
                        </div>
                    @endif
                 @endforeach
                @endforeach
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Registrar Permisos</button>
                </div>
            </form>
        </div>
            `

        document.getElementById("CuerpoCreacionSeccionesUsuarios").innerHTML = html;
    }
</script>

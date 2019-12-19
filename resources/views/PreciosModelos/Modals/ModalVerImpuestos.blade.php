<div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="titulo">Seccion de Impuestos
                </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <h4 class="text-center">Crear un Impuesto nuevo</h4>
            <form action="{{route('impuesto_save')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre del Impuesto" name="Nombre" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="% del impuesto" name="Impuesto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" class="btn btn-outline-primary" value="Registar Impuesto">
                    </div>
                </div>
            </form>
            <hr>
            <h4 class="text-center">Impuestos Existentes</h4>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Porcentaje del Impuesto</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($impuestos as $imp)
                        <tr>
                            <td>{{$imp->nombre}}</td>
                            <td>{{$imp->impuesto}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h4 class="text-center">Modificar Impuesto</h4>
            <form action="{{route('impuesto_edit')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select name="SelectImpuesto" required id="" class="form-control">
                                <option value="-">Seleccione un Impuesto</option>
                                @foreach($impuestos as $imp)
                                    <option value="{{$imp->id}}">{{$imp->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Nuevo % del Impuesto" name="NuevoMargen">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="submit" value="Modificar Impuesto" class="btn btn-outline-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

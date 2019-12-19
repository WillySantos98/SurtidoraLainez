<div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo">Seccion de Gastos Administrativos
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <h4 class="text-center">Crear Nuevo Gasto</h4>
            <form action="{{route('ga.save')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="number" name="Gasto" class="form-control" placeholder="Gigite el Gasto">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="Nombre del Gasto Adm." name="NombreGasto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" class="btn btn-outline-primary" value="Registar Gasto Adm.">
                    </div>
                </div>
            </form>
            <hr>
            <h4 class="text-center">Gastos Administrativos</h4>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Total del Gasto</th>
                </tr>
                </thead>
                <tbody>
                @foreach($GA as $gastos)
                    <tr>
                        <td>{{$gastos->nombre}}</td>
                        <td>{{$gastos->cantidad}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <h4 class="text-center">Modificar Gasto Admin.</h4>
            <form action="{{route('ga.edit')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select name="SelectGA" required id="" class="form-control">
                                <option value="-">Seleccione un el Gasto</option>
                                @foreach($GA as $gasto)
                                    <option value="{{$gasto->id}}">{{$gasto->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Digite la nueva cantidad" name="NuevoGasto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="submit" value="Modificar Gasto Administrativo" class="btn btn-outline-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

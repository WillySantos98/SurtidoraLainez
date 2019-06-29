
    <h4 class="text-center">Datos de la Entrada</h4>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>cod de Entrada</th>
            <th>Tipo de Entrada</th>
            <th>Proveedor</th>
            <th>Sucursal de Entrada</th>
            <th>Colaborador Responsable</th>
            <th>Fecha de Ingreso</th>
            <th>Usuario</th>
        </tr>
        </thead>
        <tbody>
        @foreach($consignacion as $item)
            <tr>
                <input type="text" name="EntradaId" hidden value="{{$item->id}}">
                <td>{{$item->cod_entrada}}</td>
                <td>{{$item->nombre_ent}}</td>
                <td>{{$item->nombre_pro}}</td>
                <td>{{$item->nombre_su}}</td>
                <td>{{$item->nombre_col}}</td>
                <td>{{$item->fecha_entrada}}</td>
                <td>{{$item->usuario}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="card shadow mb-4">
        <a href="#collapse-documentos" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="false">
            <h6 class="m-0 font-weight-bold text-primary">Agregar Documentos Escaneados de la Entrada</h6>
        </a>
        <div class="collapse" id="collapse-documentos">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="file" name="Documentos[]" class="form-control" multiple>
                    </div>
                </div>
            </div>
        </div>
    </div>
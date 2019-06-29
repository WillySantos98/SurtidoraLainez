@include('Index.componentes.status')
<form action="{{route('tipocolaborador.save')}}" method="post">
    {{ csrf_field() }}
    <h4 class="text-center">Formulario para crear un nuevo tipo de colaborador</h4>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipo de Colaborador</label>
        <div class="col-sm-6">
            <input type="text" name="Nombre" class="form-control" required placeholder="Nombre del Tipo de Colaborador">
        </div>
        <div class="col-sm-3">
            <input type="submit" class="btn btn-primary" value="Guardar Tipo de Colaborador">
        </div>
    </div>
</form>
<hr>
<div class="container w-75">
    <h4>Nuevo Proveedor</h4>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <p>
                    {{$error}}
                </p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'proveedor.save', 'method' => 'POST']) !!}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('NombreProveedor','Nombre del Proveedor') !!}
                {!! Form::text('NombreProveedor', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Proveedor', 'required']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('Rtn','Rtn del Proveedor') !!}
                {!! Form::text('Rtn', null, ['class'=>'form-control', 'placeholder'=>'Rtn del Proveedor', 'required']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('Telefono','Telefono') !!}
                {!! Form::text('Telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono del Proveedor', 'required']) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('Correo','Correo Electronico') !!}
                {!! Form::text('Correo', null, ['class'=>'form-control', 'placeholder'=>'Correo del Proveedor', 'required']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('Direccion','Direccion del Proveedor') !!}
                {!! Form::text('Direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion del Proveedor', 'required']) !!}
            </div>
        </div>
        {!! Form::submit('Guardar Proveedor', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
<script>

</script>
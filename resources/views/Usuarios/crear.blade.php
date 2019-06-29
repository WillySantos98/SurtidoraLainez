@extends('Index.base')
@section('title', 'Crear Usuarios')
@section('content')
    <div class="container-fluid w-50">
        <h4 class="text-center">Formulario para crear nuevo Usuario</h4>
        <hr>
        <form action="{{route('usuario.save')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Nombre Completo</label>
                        <input type="text" class="form-control" name="Nombre" required >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Nombre de Usuario</label>
                        <input type="text" class="form-control" maxlength="15" name="Usuario" required >
                        <span>Maximo 15 caracteres</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Correo Electronico</label>
                        <input type="email" class="form-control" required name="Correo">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Contrasena</label>
                        <input type="password" class="form-control" required name="Contra">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Tipo de Usuario</label>
                    <select name="SelectUsuario" required class="form-control" id="">
                        <option value="">----</option>
                        @foreach($tipo as $info)
                            <option value="{{$info->id}}">{{$info->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <input type="submit" class="btn btn-primary" value="Guardar Usuario">
        </form>
    </div>
@endsection

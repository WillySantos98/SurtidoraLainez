@extends('Index.base')
@section('title', 'Usuarios')
@section('content')
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight">
            <h4>Usuarios</h4>
        </div>
        <div class="p-2 bd-highlight">
            <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Nombre de Usuario</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Contrasena</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $info)
                <tr>
                    <td>{{$info->name}}</td>
                    <td>{{$info->usuario}}</td>
                    <td>{{$info->email}}</td>
                    <td>{{$info->password}}</td>
                    @if($info->id_t == 1)
                        <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
                    @elseif($info->estado == 1)
                        <td>
                            <button class="btn btn-success disabled"  data-toggle="modal" data-target="#ModalUsuarioEstado"
                                    data-id="{{$info->id}}">
                                <i data-feather="user-check"></i></button>
                        </td>
                    @else
                        <td>
                            <button class="btn btn-success disabled"  data-toggle="modal" data-target="#ModalUsuarioEstado"
                                    data-id="{{$info->id}}">
                                <i data-feather="user-x"></i></button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<div class="modal fade" id="ModalUsuarioEstado" tabindex="-1" role="dialog" aria-labelledby="ModalUsuarioEstado" aria-hidden="true">
    @include('Usuarios.Modals.ModalEstadoUsuario')
</div>
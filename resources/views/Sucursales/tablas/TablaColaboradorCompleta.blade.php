<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th class="text-center">Fecha de Nacimiento</th>
        <th class="text-center">Estado</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Correo</th>
        <th class="text-center">Fecha de Inicio</th>
        <th class="text-center">Puesto</th>
        <th class="text-center">Sucursal Asignada</th>
        <th class="text-center">Editar</th>
    </tr>
    </thead>
    <tbody id="MyTable">
    <tr>
        <td class="text-center">{{$colaborador->fecha_nacimiento}}</td>
        @if($colaborador->estado == 1)
            <td class="text-center"><span class="badge badge-success"><i data-feather="user-check"></i></span></td>
        @else
            <td class="text-center"><span class="badge badge-danger"><i data-feather="user-x"></i></span></td>
        @endif
        <td class="text-center">{{$colaborador->telefono}}</td>
        <td class="text-center">{{$colaborador->email}}</td>
        <td class="text-center">{{$colaborador->fecha_inicio}}</td>
        <td class="text-center">{{$colaborador->nombre_colaborador}}</td>
        <td class="text-center">{{$colaborador->nombre_sucursal}}</td>
        <td class="text-center">
            <a type="button" class="btn btn" style="background-color: orangered; padding: 0px"  data-toggle="modal" data-target="#ModalEditColaborador"
               data-id="{{$colaborador->id}}"
               data-nombre="{{$colaborador->nombre}}"
               data-telefono="{{$colaborador->telefono}}"
               data-email="{{$colaborador->email}}">
                <span class="badge badge-danger"><i data-feather="edit"></i></span>
            </a>
        </td>
    </tr>
    </tbody>
</table>

<div class="modal fade " id="ModalEditColaborador" tabindex="-1" role="dialog" aria-labelledby="ModalEditColaborador" aria-hidden="true">
    @include('Sucursales.modals.ModalEditColaborador')
</div>
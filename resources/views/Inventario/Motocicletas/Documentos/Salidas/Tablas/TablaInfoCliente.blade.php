<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 13px">Nombre Completo</th>
        <th class="text-center" style="font-size: 13px">Identidad</th>
        <th class="text-center" style="font-size: 13px">Rtn</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-center" style="font-size: 13px"><a href="/clientes/perfil/{{$info->id_c}}" target="_blank">{{$info->nombres}} {{$info->apellidos}}</a></td>
        <td class="text-center" style="font-size: 13px">{{$info->identidad}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->rtn}}</td>
    </tr>
    </tbody>
</table>

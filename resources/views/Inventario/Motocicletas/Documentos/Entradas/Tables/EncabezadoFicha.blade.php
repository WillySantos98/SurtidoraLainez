<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 13px"># de Documento de Entrada</th>
        <th class="text-center" style="font-size: 13px"># de Transferencia</th>
        <th class="text-center" style="font-size: 13px">Proveedor</th>
        <th class="text-center" style="font-size: 13px">Fecha de Entrada</th>
        <th class="text-center" style="font-size: 13px">Tipo de Entrada</th>
        <th class="text-center" style="font-size: 13px">Encargado</th>
        <th class="text-center" style="font-size: 13px">Sucursal de Entrada</th>
        <th class="text-center" style="font-size: 13px">Usuario Registrador</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-center" style="font-size: 13px">{{$info->guia_remision}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->num_transferencia}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_pro}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->fecha_entrada}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_tip}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_col}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->nombre_suc}}</td>
        <td class="text-center" style="font-size: 13px">{{$info->usuario}}</td>
    </tr>
    </tbody>
</table>


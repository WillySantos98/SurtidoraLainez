<h6>Informacion del modelo</h6>
<table class="table">
    <thead>
    <tr>
        <th class="text-center" style="font-size: 14px">Proveedor</th>
        <th class="text-center" style="font-size: 14px">Marca</th>
        <th class="text-center" style="font-size: 14px">Modelo</th>
        <th class="text-center" style="font-size: 14px">Cilindraje</th>
        <th class="text-center" style="font-size: 14px">Tipo de Vehiculo</th>
        <th class="text-center" style="font-size: 14px">Ruedas</th>
        <th class="text-center" style="font-size: 14px">Codigo QR</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-center" style="font-size: 14px">{{$info_m->nombre_pro}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_m->nombre_mar}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_m->nombre_mod}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_m->cilindraje}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_m->nombre_v}}</td>
        <td class="text-center" style="font-size: 14px">{{$info_m->ruedas}}</td>
        <td class="text-center" style="font-size: 14px">
            <a href="/motocicletas/qr/{{$info_m->id_moto}}" target="_blank">Imprimir Codigo QR</a>
        </td>
    </tr>
    </tbody>
</table>


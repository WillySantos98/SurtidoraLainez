<h6 class="text-center">Datos de las Motocicletas</h6>
<div style="overflow-y: scroll; height: 130px">
    <table class="table table-hover table-sm">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Chasis</th>
            <th>Motor</th>
            <th>Ano</th>
            <th>Color</th>
        </tr>
        </thead>
        <tbody>
        @foreach($motos as $moto)
            <tr>
                <td>{{$moto->id_moto}}</td>
                <td>{{$moto->nombre_mar}}</td>
                <td>{{$moto->nombre_mod}}</td>
                <td>{{$moto->chasis}}</td>
                <td>{{$moto->motor}}</td>
                <td>{{$moto->ano}}</td>
                <td>{{$moto->color}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

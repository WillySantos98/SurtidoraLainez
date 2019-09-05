<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h6 class="text-center" style="font-size: 10px"><strong>SURTIDORA LAINEZ</strong></h6>
<h6 class="text-center" style="font-size: 8px">Escanea para saber datos sobre esta motocicleta</h6>
@foreach($info_modelo as $info_m)
    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(200)->generate('Motocicleta Codigo'.$info_m->id_moto.' , Modelo:'.$info_m->nombre_mod.'. Precio de contado:')) }} ">
@endforeach
<hr>

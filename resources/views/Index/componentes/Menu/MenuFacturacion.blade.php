<li class="nav-item">
    <a class="nav-link" href="{{route('doc.index')}}">
        <i class="fa fa-file" aria-hidden="true"></i>
        <span>Documentos</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario2" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-motorcycle" aria-hidden="true"></i>
        {{--            <i class="fa fa-motorcycle" aria-hidden="true"></i>--}}
        <span>Inventario</span>
    </a>
    <div id="collapseInventario2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventario</h6>
            <a class="collapse-item" href="{{route('motocicletas.index')}}">Inventario Disponible</a>
            <a class="collapse-item" href="{{route('inventario.vendidas')}}">Inventario Vendido</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlacas1" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-motorcycle" aria-hidden="true"></i>
        {{--            <i class="fa fa-motorcycle" aria-hidden="true"></i>--}}
        <span>Gestion de Placas</span>
    </a>
    <div id="collapsePlacas1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventario</h6>
            <a class="collapse-item" href="{{route('placas.inventario')}}">Inven, de Boletas/Placas</a>
            <a class="collapse-item" href="{{route('placas.transferencia')}}">Hacer Transferencia</a>
        </div>
    </div>
</li>

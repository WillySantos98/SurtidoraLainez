<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-address-card"></i>
        <span>Clientes</span>
    </a>
    <div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion de Clientes</h6>
            <a class="collapse-item" href="{{route('cliente.index')}}">Existencia de Clientes</a>
        </div>
    </div>
</li>
<div class="sidebar-heading">
    Placas
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlacas1" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-motorcycle" aria-hidden="true"></i>
        {{--            <i class="fa fa-motorcycle" aria-hidden="true"></i>--}}
        <span>Gestion de Placas</span>
    </a>
    <div id="collapsePlacas1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventario</h6>
            <a class="collapse-item" href="{{route('placas.ingreso')}}">Ingreso de Placa</a>
            <a class="collapse-item" href="{{route('placas.inventario')}}">Inven, de Boletas/Placas</a>
        </div>
    </div>
</li>

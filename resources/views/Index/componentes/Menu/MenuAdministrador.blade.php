<div class="sidebar-heading">
    Administrador
</div>
<li class="nav-item">
    <a class="nav-link" href="{{route('reportes.index')}}">
        <i class="fa fa-file" aria-hidden="true"></i>
        <span>Reportes</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tareas</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tareas del Administrador</h6>
            <hr>
            <span class="collapse-header">Proveedores</span>
            <a class="collapse-item" href="{{route('proveedor.index')}}">Proveedores</a>
            <a class="collapse-item" href="{{route('contactos.index')}}">Contactos</a>
            <a class="collapse-item" href="{{route('consultas.index')}}">Edición</a>
            <span class="collapse-header">Sucursales</span>
            <a class="collapse-item" href="{{route('sucursal.index')}}">Sucursales</a>
            <a class="collapse-item" href="{{route('colaboradores.index')}}">Colaboradores</a>
            <hr>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-user-circle"></i>
        <span>Usuarios</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configuracion de Usuarios</h6>
            <a class="collapse-item" href="{{route('usuario.index')}}">Usuarios</a>
            <a class="collapse-item" href="{{route('usuario.crear')}}">Crear Usuarios</a>
            <a class="collapse-item" href="{{route('usuario.secciones')}}">Crear Secciones</a>
        </div>
    </div>
</li>
<div class="sidebar-heading">
    Clientes
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-address-card"></i>
        <span>Clientes</span>
    </a>
    <div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion de Clientes</h6>
            <a class="collapse-item" href="{{route('cliente.formNuevo')}}">Nuevo Cliente</a>
            <a class="collapse-item" href="{{route('cliente.index')}}">Existencia de Clientes</a>
        </div>
    </div>
</li>
<div class="sidebar-heading">
    Inventario
</div>

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
            <a class="collapse-item" href="{{route('inventario.transferencia')}}">Inventario en Transferencia</a>
            <a class="collapse-item" href="{{route('inventarioSucursal.index')}}">Inventario x Sucursal</a>
            <a class="collapse-item" href="{{route('inventario.vendidas)}}">Inventario Vendido</a>
            <a class="collapse-item" href="{{route('transferencias_externas.index')}}">Inventario Trans. Externa</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-plus" aria-hidden="true"></i>
        {{--            <i class="fa fa-motorcycle" aria-hidden="true"></i>--}}
        <span>Gestion de Motocicletas</span>
    </a>
    <div id="collapseInventario" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion de Motos</h6>
            <a class="collapse-item" href="{{route('consignada.index')}}">Entrada</a>
            <a class="collapse-item" href="{{route('transferencia.formulario')}}">Trasnferencia Interna</a>
            <a class="collapse-item" href="{{route('transferenciasExternas.form')}}">Trasnferencia Externa</a>
            <a class="collapse-item" href="{{route('salidaVenta.index')}}">Salida x Venta</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('doc.index')}}">
        <i class="fa fa-file" aria-hidden="true"></i>
        <span>Documentos</span>
    </a>
</li>
<hr class="sidebar-divider">
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
            <a class="collapse-item" href="{{route('placas.inventario')}}">Inven, de Boletas/Placas</a>
            <a class="collapse-item" href="{{route('placas.transferencia')}}">Hacer Transferencia</a>
            <a class="collapse-item" href="{{route('placas.ingreso')}}">Ingreso de Placa</a>
        </div>
    </div>
</li>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle" src="{{asset('logo2.png')}}" style="width: 100%; height: 100%;" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Surtidora Lainez</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>
    <!-- Divider -->
@if(Auth::user()->tipousuario_id == 1)

        <hr class="sidebar-divider">


    <div class="sidebar-heading">
        Administrador
    </div>

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

    <!-- Nav Item - Utilities Collapse Menu -->
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
            </div>
        </div>
    </li>
    @endif


    @if(Auth::user()->tipousuario_id == 4 Or Auth::user()->tipousuario_id == 1 or Auth::user()->tipousuario_id == 6)
        <hr class="sidebar-divider">
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
        <li class="nav-item">
            <a  class="nav-link collapsed disabled" href="#" data-toggle="collapse" data-target="#collapseAvales" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa fa-address-card"></i>
                <span>Avales</span>
            </a>
            <div id="collapseAvales" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gestion de Avales</h6>
                    <a class="collapse-item" href="{{route('aval.formNuevo')}}">Nuevo Aval</a>
                    <a class="collapse-item" href="#">Existencia de Avales</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

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
                    <a class="collapse-item" href="{{route('inventarioSucursal.index')}}">Inventario Vendido</a>
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
        @if(Auth::user()->tipousuario_id == 1 or Auth::user()->tipousuario_id == 4)
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
                    <a class="collapse-item" href="{{route('placas.transferencia')}}">Hacer Transferencia</a>
                </div>
            </div>
        </li>
            @endif
    @endif

    @if(Auth::user()->tipousuario_id == 3)
        <hr class="sidebar-divider">


        <div class="sidebar-heading">
            Ventas
        </div>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('motocicletas.index')}}">
                <i class="fa fa-motorcycle" aria-hidden="true"></i>
                <span>Inventario</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('cliente.formNuevo')}}">
                <i class="fa fa-address-card"></i>
                <span>Crear Cliente</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('cliente.index')}}">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                <span>Clientes</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('salidaVenta.index')}}">
                <i class="fa fa-address-card" aria-hidden="true"></i>
                <span>Registrar una Venta</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('placas.inventario')}}">
                <i class="fa fa-folder" aria-hidden="true"></i>
                <span>Placas</span></a>
        </li>

    @endif

    @if(Auth::user()->tipousuario_id == 2)
        <li class="nav-item">
            <a class="nav-link" href="{{route('doc.index')}}">
                <i class="fa fa-file" aria-hidden="true"></i>
                <span>Documentos</span>
            </a>
        </li>
    @endif



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>

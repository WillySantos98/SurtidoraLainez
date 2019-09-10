<div class="container-fluid">
    <h6 class="text-center">Cuadro de Actividades</h6>
    <div class="row">
        <div class="col">
            <div class="card border-left-primary" style="width: 100%">
                <div class="card-body">
                    <strong>Tareas del Administrador - Proveedores - Sucursales</strong>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('docEntrada.index')}}" class="btn btn-outline-primary rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-user-alt"></i><i class="fas fa-user-alt"></i><i class="fas fa-user-alt"></i></div>
                                Proveedores
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('salidas.index')}}" class="btn btn-outline-primary rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-address-book"></i></div>
                                Contactos
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-primary rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-edit"></i></div>
                                Ediciones del Proveedor
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-primary rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-user-plus"></i></div>
                                Crear Usuarios
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-primary rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-users"></i></div>
                                Ver Usuarios
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-primary rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-chart-bar"></i></div>
                                Reportes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="card border-left-warning" style="width: 100%">
                <div class="card-body">
                    <strong>Clientes - Avales</strong>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('docEntrada.index')}}" class="btn btn-outline-warning rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-user-alt"></i></div>
                                Clientes
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('salidas.index')}}" class="btn btn-outline-warning rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-user-alt"></i><i class="fas fa-user-alt"></i></div>
                                Existencia de Cliente
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-warning rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-user-alt"></i></div>
                                Avales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col">
            <div class="card border-left-info" style="width: 100%">
                <div class="card-body">
                    <strong>Motocicletas</strong>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('docEntrada.index')}}" class="btn btn-outline-info rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-clipboard-list"></i></div>
                                Inventario Disponible
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('salidas.index')}}" class="btn btn-outline-info rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-clipboard-list"></i> <i class="fas fa-exchange-alt"></i></div>
                                Inventario en Transferencia
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-info rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-clipboard-list"></i> <i class="fas fa-store-alt"></i></div>
                                Inventario por Sucursal
                            </a>
                        </div><div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-info rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-clipboard-list"></i> <i class="fas fa-money-bill-wave-alt"></i></div>
                                Inventario Vendido
                            </a>
                        </div><div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-info rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="fas fa-clipboard-list"></i> <i class="far fa-times-circle"></i></div>
                                Inventario en Transferencia Externa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card border-left-danger" style="width: 100%">
                <div class="card-body">
                    <strong>Gestion de Placas</strong>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('docEntrada.index')}}" class="btn btn-outline-danger rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="far fa-address-card"></i><i class="fas fa-plus"></i></div>
                                Ingreso de Placas
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('salidas.index')}}" class="btn btn-outline-danger rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="far fa-address-card"></i></div>
                                Inventario de Placas
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-danger rounded disabled" style="width: 100px;height: 100px; font-size: 12px">
                                <br>
                                <div class="row d-flex justify-content-center" style="font-size: 22px"><i class="far fa-address-card"></i> <i class="fas fa-exchange-alt"></i></div>
                                Transferencia de Placas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

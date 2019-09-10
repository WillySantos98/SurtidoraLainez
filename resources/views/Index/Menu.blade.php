<script>
    axios.get('/cargar_menu/{{Auth::user()->id}}').then(
        function (elementos) {
            let html = '';
            let html_usuario = '';
            let html_tareas = '';
            let html_cliente = '';
            let html_inventario = '';
            let html_gestionM = '';
            let html_placas ='';
            let html_documentos = '';
            let html_documentos_moto = '';
            let html_documentos_transferencia = '';
            let html_documentos_placas = '';
            var elem;
            elem =elementos.data;
            var pathname = window.location.pathname;
            for (let i =0; i<elementos.data.length; i++){
                if (elementos.data[i].codigo == 1){
                    html +=`
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('reportes.index')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Reportes</span></a>
                    </li>
                    `
                }
                if(elementos.data[i].codigo == 2){
                    html +=`
                    <div class="sidebar-heading">
                        Administrador
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa fa-user-circle"></i>
                            <span>Usuarios</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded" id="MenuUsuarios">
                                <h6 class="collapse-header">Configuracion de Usuarios</h6>

                            </div>
                        </div>
                    </li>
                    `
                }
                if (elementos.data[i].codigo == '2-0'){
                    html_usuario +=`
                        <a class="collapse-item" href="{{route('usuario.index')}}">Usuarios</a>
                    `
                }

                if (elementos.data[i].codigo == '2-1'){
                    html_usuario +=`
                        <a class="collapse-item" href="{{route('usuario.crear')}}">Crear Usuarios</a>
                    `
                }

                if (elementos.data[i].codigo == 3){
                    html +=`
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Tareas</span>
                            </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded" id="MenuTareas">
                                </div>
                            </div>
                         </li>
                    `
                }
                if (elementos.data[i].codigo == '3-0'){
                    html_tareas +=`
                            <span class="collapse-header">Proveedores</span>
                            <a class="collapse-item" href="{{route('proveedor.index')}}">Proveedores</a>
                        `
                }

                if (elementos.data[i].codigo == '3-1'){
                    html_tareas +=`
                            <a class="collapse-item" href="{{route('contactos.index')}}">Contactos</a>
                        `
                }

                if (elementos.data[i].codigo == '3-2'){
                    html_tareas +=`
                            <a class="collapse-item" href="{{route('consultas.index')}}">Edición</a>
                        `
                }
                if (elementos.data[i].codigo == '3-3'){
                    html_tareas +=`
                            <span class="collapse-header">Sucursales</span>
                            <a class="collapse-item" href="{{route('sucursal.index')}}">Sucursales</a>
                        `
                }
                if (elementos.data[i].codigo == '3-4'){
                    html_tareas +=`
                            <a class="collapse-item" href="{{route('colaboradores.index')}}">Colaboradores</a>
                        `
                }

                if (elementos.data[i].codigo == 7){
                    html +=`
                    <div class="sidebar-heading">
                        Clientes
                    </div>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa fa-address-card"></i>
                            <span>Clientes</span>
                        </a>
                        <div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded" id="MenuCliente">
                                <h6 class="collapse-header">Gestion de Clientes</h6>
                            </div>
                        </div>
                    </li>
                    `
                }

                if (elementos.data[i].codigo == '7-0'){
                    html_cliente +=`
                        <a class="collapse-item" href="{{route('cliente.formNuevo')}}">Nuevo Cliente</a>
                    `
                }
                if (elementos.data[i].codigo == '7-1'){
                    html_cliente +=`
                         <a class="collapse-item" href="{{route('cliente.index')}}">Existencia de Clientes</a>
                    `
                }

                if (elementos.data[i].codigo == 9){
                    html +=`
                    <div class="sidebar-heading">
                            Motocicletas
                        </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario2" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa fa-motorcycle" aria-hidden="true"></i>
                            <span>Inventario</span>
                        </a>
                        <div id="collapseInventario2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded" id="MenuIventarioMoto">

                            </div>
                        </div>
                        </li>

                    `
                }
                if(elementos.data[i].codigo == '9-0'){
                    html_inventario +=`
                            <h6 class="collapse-header">Inventario</h6>
                            <a class="collapse-item" href="{{route('motocicletas.index')}}">Inventario Disponible</a>
                        `
                }
                if (elementos.data[i].codigo == '9-1'){
                    html_inventario +=`
                            <a class="collapse-item" href="{{route('inventario.transferencia')}}">Inventario en Transferencia</a>

                        `
                }
                if (elementos.data[i].codigo == '9-2'){
                    html_inventario +=`
                            <a class="collapse-item" href="{{route('inventario.vendidas')}}">Inventario Vendido</a>
                        `
                }

                if (elementos.data[i].codigo == '9-3'){
                    html_inventario +=`
                            <a class="collapse-item" href="{{route('inventarioSucursal.index')}}">Inventario x Sucursal</a>
                        `
                }
                if (elementos.data[i].codigo == '9-4'){
                    html_inventario +=`
                            <a class="collapse-item" href="{{route('transferencias_externas.index')}}">Inventario Trans. Externa</a>
                        `
                }

                if(elementos.data[i].codigo == 4){
                    html +=`
                        <div class="sidebar-heading">
                            Seccion de documentos
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('doc.index')}}">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Documentos</span>
                            </a>
                        </li>
                    `

                }

                if (elementos.data[i].codigo == 6){
                    html +=`
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario" aria-expanded="true" aria-controls="collapseUtilities">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <span>Gestion de Motocicletas</span>
                            </a>
                            <div id="collapseInventario" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded" id="MenuGestionMotos">
                                    <h6 class="collapse-header">Gestion de Motos</h6>

                                </div>
                            </div>
                        </li>
                    `
                }
                if(elementos.data[i].codigo == '6-0'){
                    html_gestionM +=`
                    <a class="collapse-item" href="{{route('consignada.index')}}">Entrada</a>
                `
                }
                if (elementos.data[i].codigo == '6-1'){
                    html_gestionM +=`
                        <a class="collapse-item" href="{{route('transferencia.formulario')}}">Trasnferencia Interna</a>
                    `
                }
                if (elementos.data[i].codigo == '6-2'){
                    html_gestionM +=`
                    <a class="collapse-item" href="{{route('transferenciasExternas.form')}}">Trasnferencia Externa</a>
                    `
                }
                if (elementos.data[i].codigo =='6-3'){
                    html_gestionM +=`
                         <a class="collapse-item" href="{{route('salidaVenta.index')}}">Salida x Venta</a>
                    `
                }

                if (elementos.data[i].codigo == 5){
                    html +=`
                    <div class="sidebar-heading">
                            Placas
                        </div>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlacas1" aria-expanded="true" aria-controls="collapseUtilities">
                                <i class="fa fa-motorcycle" aria-hidden="true"></i>
                                <span>Gestion de Placas</span>
                            </a>
                            <div id="collapsePlacas1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded" id="MenuPlacas">
                                </div>
                            </div>
                        </li>
                    `
                }
                if (elementos.data[i].codigo == '5-0'){
                    html_placas +=`
                        <a class="collapse-item" href="{{route('placas.inventario')}}">Inven. de Boletas/Placas</a>
                    `
                }
                if (elementos.data[i].codigo == '5-1'){
                    html_placas +=`
                        <a class="collapse-item" href="{{route('placas.transferencia')}}">Hacer Transferencia</a>
                    `
                }
                if (elementos.data[i].codigo == '5-2'){
                    html_placas +=`
                    <a class="collapse-item" href="{{route('placas.ingreso')}}">Ingreso de Placa</a>
                    `
                }





            }
            document.getElementById("menu").innerHTML = html;
            for(let i = 0; i<elem.length; i++){
                if (elem[i] == 2){
                    document.getElementById("MenuUsuarios").innerHTML = html_usuario;
                }
                if (elem[i] == 3){
                    document.getElementById("MenuTareas").innerHTML = html_tareas;
                }
                if (elem[i] == 7){
                    document.getElementById("MenuCliente").innerHTML = html_cliente;
                }
                if (elem[i] == 9){
                    document.getElementById("MenuIventarioMoto").innerHTML = html_inventario;
                }
                if (elem[i] == 6){
                    document.getElementById("MenuGestionMotos").innerHTML = html_gestionM;
                }
                if (elem[i] == 5){
                    document.getElementById("MenuPlacas").innerHTML = html_placas;
                }

            }
            console.log(elem)

        }
    )
</script>

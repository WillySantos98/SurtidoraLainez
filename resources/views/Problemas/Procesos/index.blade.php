@extends('Problemas.index')
@section('title','SL-Procesos')
@section('content-p')
    <div uk-grid>
        <div class="uk-width-1-4">
            @include('Problemas.Procesos.Componentes.Menu')
        </div>

        <div id="ContenidoProcesos" class="uk-width-3-4">
            <h2 class="uk-text-center uk-text-bold">Procesos</h2>
            <p>Esta es la parte de la documentación donde muestra los procesos paso a paso de todos procesos que contempla el sistema.</p>
            <hr>
            <div id="ProcesoCliente">
                <h3 class="uk-text-center uk-text-bold">Registro de Clientes</h3>
                <p>En este diagrama se resumen los pasos para poder registrar un cliente.</p>
                <p><strong>SL-proceso-1</strong></p>
                @include('Problemas.Procesos.draw.Registro de Clientes')
                <h4 class="uk-text-bold">Información</h4>
                <div style="overflow-y: scroll; overflow-y: scroll">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dt>paso #3.Información de los campos del formulario registro de clientes</dt>
                        <a href="#">información del formulario</a>
                        <dt>conoce mas sobre este proceso en la documentación de la sección de clientes</dt>
                        <a href="#">sección de clientes</a>
                        <dt>En el proceso numero 4 el botón de Registrar cliente solo se preciona una vez.</dt>
                        <dt>conoce el formulario de registro de clientes</dt>
                        <a href="#modal-vistaRegistroCliente" uk-toggle>Vista de Formulario de Registro de Clientes</a>
                    </dl>
                </div>
            </div>
            <hr>
            <div id="ProcesosPerfilCliente">
                <h3 class="uk-text-center uk-text-bold">Ver el Perfil de un Cliente</h3>
                <p>En este diagrama se resume el proceso de poder ver el perfil de un cliente para ver determinada información.</p>
                <p><strong>SL-proceso-2</strong></p>
                @include('Problemas.Procesos.draw.perfil cliente')
                <h4 class="uk-text-bold">Información</h4>
                <div style="height: 250px; overflow-y: scroll">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dt>conoce mas sobre el perfil del cliente en la documentación</dt>
                        <a href="#">documentacion del perfil de cliente</a>
                    </dl>
                </div>
            </div>
            <hr>
            <div id="ProcesosVerDocumentosCliente">
                <h3 class="uk-text-center uk-text-bold">Ver Documentos de un Cliente</h3>
                <p>En este diagrama se resume el proceso para poder ver documentos o fotos de un cliente.</p>
                <p><strong>SL-proceso-3</strong></p>
                @include('Problemas.Procesos.draw.ver documentos clientes')
                <h4 class="uk-text-bold">Información</h4>
                <div style="overflow-y: scroll; height: 250px">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dt>paso #5.conoce la función de los botontes "vista documentos" y "vista imagen" en la documentación</dt>
                        <a href="#">información de botones vista documentos y vista imagen</a>
                    </dl>
                </div>
            </div>
            <hr>
            <div id="ProcesosIngresoMotocicletas">
                <h3 class="uk-text-center uk-text-bold">Ingresar Motocicletas Nuevas al Inventario</h3>
                <p>Esta es la sección que explica como se debe ingresar una motocicleta nueva al inventario. Hay dos procesos
                que explican el ingreso de una motocicleta, el <a href="#ProcesosIngresoMotocicletas-1">primero es el formulario</a> de ingreso que solicita los datos de la
                guia de remisión o factura de entrega, y el <a href="#ProcesosIngresoMotocicletas-2">segundo formulario</a> solicita la los componentes con los que viene la
                motocicleta. Si quieres conocer mas sobre estos procesos puedes irte a la sección de información que se encuentra
                abajo.</p>
                <p><strong>SL-proceso-4</strong></p>
                @include('Problemas.Procesos.draw.Registro Motocicletas 1')
                <h4 class="uk-text-bold">Información</h4>
                <div style="overflow-y: scroll; height: 250px">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dt>conoce la documentación de esta sección de ingreso de motocicletas</dt>
                        <a href="#">Ingreso de Motocicletas</a>
                    </dl>
                </div>
                <div id="ProcesosIngresoMotocicletas-1">
                    <h4 class="uk-text-bold">Ingreso de Motocicletas Nuevas al Inventario - Formulario Datos de entrada</h4>
                    <p>Este diagrama muestra los pasos que se tiene que realizar el llenado de formulario de datos de entrada para el
                    ingreso de una motocicleta nueva al inventario.</p>
                    <p><strong>SL-proceso-4-1</strong></p>
                    @include('Problemas.Procesos.draw.Formulario 1 - Registro Motocicletas')
                    <h4 class="uk-text-bold">Información</h4>
                    <div style="overflow-y: scroll; height: 250px">
                        <dl class="uk-description-list uk-description-list-divider">
                            <dt>conoce una guia de remisión</dt>
                            <a href="../Documentacion/FotosProcesos/guia_remision_ejemplo.pdf" target="_blank">Guia de Remision de Ejemplo</a>
                            <dt>conoce el formulario de datos de entrada</dt>
                            <a href="#modal-vistaForm-DatosEntrada" uk-toggle>Ver Formulario</a>
                            <dt>paso #3. para conocer la información que van en los campos del formulario de registro de datos de entradas puedes visitar
                            la documentación donde está detallada toda la información.</dt>
                            <a href="#" uk-toggle>Documentacion de informacion de los campos</a>
                            <dt>paso #5. para conocer la información que van en los campos del formulario que se despliega cuando presionas el boton
                                +Motos.</dt>
                            <a href="#" uk-toggle>documentacion de formulario +Motos</a>
                            <dt>Si te equivocas en el formulario de +Motos puedes aun corregir el error cuando aparecen los datos en la tabla de abajo.
                            Siempre revisa los datos bien, porque registrando las motocicletas el número de chasis y motor ya no se podran cambiar, y queda
                            registrado en la base de datos quien ingreso las motocicletas</dt>
                            <dt>Conoce la documentación de esta sección</dt>
                            <a href="#">documentacion de registro de motocicletas</a>
                        </dl>
                    </div>
                </div>
                <div id="ProcesosIngresoMotocicletas-2">
                    <h4 class="uk-text-bold">Ingreso de Motocicletas Nueval al Inventario - Formulario de Componentes de Motocicletas</h4>
                    <p>Este diagrama muestra los pasos de la segunda parte de registro de nuevas motocicletas al inventario, en este formulario se requiere
                    el documento escaneado de la guía de remisión, sino los tiene por favor escaneelos, tambien en este formulario se le solicitan fotos de cada
                    motocicletas, como tambien si viene con casco, bateria, acido etc.
                        Para conocer mas de este formulario puedes visitar la documentación de la sección de regitro de documentos</p>
                    <p><strong>SL-proceso-4-2</strong></p>
                    @include('Problemas.Procesos.draw.Formulario 2 registro moto')
                    <h4 class="uk-text-bold">Información</h4>
                    <div style="overflow-y: scroll; height: 250px">
                        <dl class="uk-description-list uk-description-list-divider">
                            <dt>conozca mas sobre este formulario en la documentación</dt>
                            <a href="#">documentacion registro de motocicletas, segunda parte</a>
                            <dt>paso #7. Simbologia de la segunda parte de ingreso de motocicletas</dt>
                            <a href="#">documentacion registro motocicletas, segunda parte, simbologia</a>
                        </dl>
                    </div>
                </div>
            </div>
            <hr>

            <div id="ProcesosTransferenciaExterna">
                <h3 class="uk-text-center uk-text-bold">Realizar una Transferencia Externa</h3>
                <p>El siguiente diagrama resume los pasos para poder realizar una transferencia externa. Para conocer mas sobre las transferenias
                externas puede ir a la sección de información y visitar la documentación.</p>
                <p><strong>SL-proceso-5</strong></p>
                @include('Problemas.Procesos.draw.Transferencia Externa')
                <h4 class="uk-text-bold">Información</h4>
                <div style="overflow-y: scroll; height: 250px">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dt>conozca mas sobre las transferencias externas en la documentación</dt>
                        <a href="#">documentacion transferencias externa</a>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    @include('Problemas.Procesos.Modals.VistaFormularioRegistroCliente')
    @include('Problemas.Procesos.Modals.ModalVistaFormularioDatosEntrada')


@endsection

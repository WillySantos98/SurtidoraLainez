@extends('Index.base')
@section('title', 'Documentos de Entradas')
@section('content')
    <div class="container-fluid">
        @include('Index.componentes.status')
        <h4 class="text-center">Seleccione el Tipo de Documento</h4>
        <br>
        <hr>
        <div id="MenuDocumentos">

        </div>




    </div>

    <script>
        axios.get('/cargar_menu/{{Auth::user()->id}}').then(
            function (elementos) {
                let html_documentos = '';
                var html_documentos_moto = '';
                let html_documentos_transferencia = '';
                let html_documentos_placas = '';
                let html_documentos_cotizaciones = '';
                var elem;
                for (let i =0; i<elementos.data.length; i++){
                    elem = elementos.data
                    if( elementos.data[i].codigo ==4) {
                        html_documentos += `
                        <div class="row">
                            <div class="col">
                                <div class="card border-left-primary" style="width: 100%">
                                    <div class="card-body">
                                        <strong>Motocicletas</strong>
                                        <hr class="my-4">
                                        <div class="row" id="MenuDocumentosMotocicletas">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col">
                                <div class="card border-left-warning" style="width: 100%">
                                    <div class="card-body">
                                        <strong>Transferencias de Motocicletas</strong>
                                        <hr class="my-4">
                                        <div class="row" id="MenuDocumentosTransferencias">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col">
                                <div class="card border-left-info" style="width: 100%">
                                    <div class="card-body">
                                        <strong>Placas</strong>
                                        <hr class="my-4">
                                        <div class="row" id="MenuDocumentosPlacas">

                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col">
                                <div class="card border-left-success" style="width: 100%">
                                    <div class="card-body">
                                        <strong>Cotizaciones</strong>
                                        <hr class="my-4">
                                        <div class="row" id="MenuDocumentosCotizaciones">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    `
                    }
                        if (elementos.data[i].codigo == '4-0'){
                        html_documentos_moto +=`
                        <div class="col-auto">
                            <a href="{{route('docEntrada.index')}}" class="btn btn-outline-primary rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Entrada de Motocicletas
                                <span class="badge badge-success">{{$entradas}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-1'){
                        html_documentos_moto +=`
                        <div class="col-auto">
                            <a href="{{route('salidas.index')}}" class="btn btn-outline-primary rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Salidas por Ventas
                                <span class="badge badge-success">{{$salidas}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-2'){
                        html_documentos_moto +=`
                        <div class="col-auto">
                            <a href="{{route('notificaciones.index')}}" class="btn btn-outline-primary rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Notificaciones Pendientes
                                <span class="badge badge-success">{{$notificaciones}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-20'){
                        html_documentos_moto +=`
                        <div class="col-auto">
                            <a href="{{route('contratospendientes')}}" class="btn btn-outline-primary rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Contratos Pendientes
                                <span class="badge badge-success">{{$contratos_pendientes}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-3'){
                        html_documentos_moto +=`
                        <div class="col-auto">
                            <a href="{{route('notificacion.gen')}}" class="btn btn-outline-primary rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Notificaciones Generadas
                                <span class="badge badge-success">{{$notificaciones2}}</span>
                            </a>
                        </div>

                        `
                    }
                    if (elementos.data[i].codigo == '4-4'){
                        html_documentos_transferencia +=`
                        <div class="col-auto">
                            <a href="{{route('transferencias_internas.index')}}" class="btn btn-outline-warning rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Transferencias Pendientes
                                <span class="badge badge-success">{{$trans_p}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-5'){
                        html_documentos_transferencia +=`
                        <div class="col-auto">
                            <a href="{{route('aceptadas.index')}}" class="btn btn-outline-warning rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Transferencias
                                <span class="badge badge-success">{{$trans_a}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-6'){
                        html_documentos_transferencia +=`
                        <div class="col-auto">
                            <a href="{{route('transferencia.rechazadas')}}" class="btn btn-outline-warning rounded" style="width: 150px;height: 150px;">
                                <br>
                                Transferencias Rechazadas
                                por Facturacion
                                <span class="badge badge-success">{{$trans_r}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-7'){
                        html_documentos_transferencia +=`
                        <div class="col-auto">
                            <a href="{{route('declinada.transferencia.index')}}" class="btn btn-outline-warning rounded" style="width: 150px;height: 150px;">
                                <br>
                                Transferencias Declinadas
                                por Gerencia
                                <span class="badge badge-success">{{$trans_declinadas}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-8'){
                        html_documentos_transferencia +=`
                        <div class="col-auto">
                            <a href="{{route('exitosas.transferencia.index')}}" class="btn btn-outline-warning rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Transferencias Exitosas
                                <span class="badge badge-success">{{$trans_exitosas}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-9'){
                        html_documentos_transferencia +=`
                        <div class="col-auto">
                            <a href="{{route('transferencias_externas.index')}}" class="btn btn-outline-warning rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Transferencias Externas
                                <span class="badge badge-success">{{$transferencias_externas}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-10'){
                        html_documentos_placas +=`
                        <div class="col-auto">
                            <a href="{{route('permisos.index')}}" class="btn btn-outline-info rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Generar Permisos
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-11'){
                        html_documentos_placas +=`
                        <div class="col-auto">
                            <a href="{{route('placas.pendientes')}}" class="btn btn-outline-info rounded" style="width: 150px;height: 150px;">
                                <br>
                                <br>
                                Placas Pendientes
                                <span class="badge badge-success">{{$placas_pendientes}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-12'){
                        html_documentos_placas +=`
                    <div class="col-auto">
                        <a href="{{route('placasTransferencias')}}" class="btn btn-outline-info rounded" style="width: 150px;height: 150px;">
                            <br>
                            Placas en Transferencias
                            <span class="badge badge-success">{{$placas_transferencia}}</span>
                        </a>
                    </div>
                    `
                    }
                    if (elementos.data[i].codigo == '4-12'){
                        html_documentos_placas +=`
                        <div class="col-auto">
                            <a href="{{route('placas.aceptadas.sucursal')}}" class="btn btn-outline-info rounded" style="width: 150px;height: 150px;">
                                <br>
                                Transferencias Aceptadas
                                por Gerencia
                                <span class="badge badge-success">{{$placas_aceptadas}}</span>
                            </a>
                        </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-14'){
                        html_documentos_placas +=`
                        <div class="col-auto">
                            <a href="{{route('placas.entrega')}}" class="btn btn-outline-info rounded disabled" style="width: 150px;height: 150px;">
                                <br>
                                Placas Entregadas a Clientes
                                <span class="badge badge-success">{{$placas_entregada}}</span>
                            </a>
                        </div>
`
                    }

                    if (elementos.data[i].codigo == '4-15'){
                        html_documentos_cotizaciones +=`
                            <div class="col-auto">
                                <a href="{{route('cotizaciones.abiertas')}}" class="btn btn-outline-success rounded" style="width: 150px;height: 150px;">
                                    <br>
                                    Cotizaciones de Clientes Potenciales
                                    <span class="badge badge-warning">{{$cotizaciones_abiertas}}</span>
                            </a>
                            </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-16'){
                        html_documentos_cotizaciones +=`
                            <div class="col-auto">
                                <a href="{{route('placas.entrega')}}" class="btn btn-outline-success rounded" style="width: 150px;height: 150px;">
                                    <br>
                                    Cotizaciones de Clientes Cerradas
                                    <span class="badge badge-warning"></span>
                            </a>
                            </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-17'){
                        html_documentos_cotizaciones +=`
                            <div class="col-auto">
                                <a href="{{route('cotizaciones.pendientes')}}" class="btn btn-outline-success rounded" style="width: 150px;height: 150px;">
                                    <br>
                                    Cotizaciones Para Ventas Pendientes
                                    <span class="badge badge-warning">{{$cotizaciones_pendientes}}</span>
                            </a>
                            </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-18'){
                        html_documentos_cotizaciones +=`
                            <div class="col-auto">
                                <a href="{{route('cotizaciones.ventas.aceptadas')}}" class="btn btn-outline-success rounded" style="width: 150px;height: 150px;">
                                    <br>
                                    Cotizaciones Para Ventas Aceptadas
                                    <span class="badge badge-warning">{{$cotizaciones_v_aceptadas}}</span>
                            </a>
                            </div>
                        `
                    }
                    if (elementos.data[i].codigo == '4-19'){
                        html_documentos_cotizaciones +=`
                            <div class="col-auto">
                                <a href="{{route('cotizaciones.declinadas')}}" class="btn btn-outline-success rounded" style="width: 150px;height: 150px;">
                                    <br>
                                    Cotizaciones Para Ventas Declinadas
                                    <span class="badge badge-warning">{{$cotizaciones_v_declinadas}}</span>
                            </a>
                            </div>
                        `
                    }
                }

                document.getElementById("MenuDocumentos").innerHTML = html_documentos;
                document.getElementById("MenuDocumentosMotocicletas").innerHTML = html_documentos_moto;
                document.getElementById("MenuDocumentosTransferencias").innerHTML = html_documentos_transferencia;
                document.getElementById("MenuDocumentosPlacas").innerHTML = html_documentos_placas;
                document.getElementById("MenuDocumentosCotizaciones").innerHTML = html_documentos_cotizaciones;
            })


    </script>

@endsection

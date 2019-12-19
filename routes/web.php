<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login


use FontLib\Table\Type\name;


//use Illuminate\Routing\Route;

Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/verificar', 'Auth\LoginController@enter')->name('validacionUser');
Route::get('/meter','Auth\LoginController@meter');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('/fallo_inicio_sesion','InicioController@fallo')->name('sesion.fallo');
//index
Route::get('/inicio', 'InicioController@index')->name('index');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/usuarios/','UsuarioController@index')->name('usuario.index');
Route::get('/usuarios/nuevo','UsuarioController@crear_usuario')->name('usuario.crear');
Route::post('/usuarios/nuevo','UsuarioController@save_usuario')->name('usuario.save');
Route::get('/usuarios/secciones','UsuarioController@secciones')->name('usuario.secciones');
Route::post('/usuarios/secciones','UsuarioController@save_secciones')->name('usuario.save_secciones');
Route::post('/usuarios/sub_secciones','UsuarioController@save_sub_secciones')->name('usuario.save_subsecciones');
Route::post('/usuarios/permisos','UsuarioController@permisos')->name('usuario.permisos');
Route::get('/cargar_menu/{id}','UsuarioController@menu');

//----------------------------------------------------------------------------------------------------------------------
//*****Proveedores
Route::get('/proveedores','ProveedorController@index')->name('proveedor.index');
Route::post('/proveedores_save', 'ProveedorController@save_proveedor')->name('proveedor.save');
//marcas
Route::post('/marca_save', 'ProveedorController@save_marca')->name('marca.save');
Route::post('/modelo_save', 'ProveedorController@save_modelo')->name('modelo.save');
Route::get('/mostrar_marcas/{id}', 'ProveedorController@view_marcas');
//tipo de vehiculos
Route::post('/save_tipovehiculos', 'ProveedorController@save_tipovehiculo')->name('tipovehiculo.save');
Route::post('/tipovehiculos/save-tipo-vehivulo-edit','ProveedorController@save_tipovehiculo_edit')->name('save.tipovehiculo.edit');
Route::post('/tipovehiculos/save-modelos-edit','ProveedorController@save_modelos_edit')->name('save.modelos.edit');
Route::post('/tipovehiculos/save-proveedores-edit','ProveedorController@save_proveedores_edit')->name('save.proveedores.edit');
//contactos
Route::get('/contactos-proveedores', 'ProveedorController@contactos')->name('contactos.index');
Route::post('/contactos-proveedores/save-contacto', 'ProveedorController@save_contacto')->name('save.contacto');
Route::post('/contactos-proveedores/save-contacto-edit', 'ProveedorController@save_contacto_edit')->name('save.contacto.edit');
Route::get('/consultas-contactos', 'ProveedorController@consultas')->name('consultas.index');
//----------------------------------------------------------------------------------------------------------------------
//*****Sucursales
Route::get('/sucursales', 'SucursalController@index')->name('sucursal.index');
Route::post('/sucursales_save', 'SucursalController@save_sucursal')->name('sucursal.save');
Route::get('/sucursales/{slug}', 'SucursalController@ficha_sucursal')->name('sucursal.ficha');
//colaboradores
Route::get('colaboradores','SucursalController@colaboradores')->name('colaboradores.index');
Route::post('calaboradores/save-tipocolaborador', 'SucursalController@save_tipocolaborador')->name('tipocolaborador.save');
Route::post('colaboradores/new-colaborador', 'SucursalController@save_newcolaborador')->name('colaborador.save');
Route::get('colaborador/{id}', 'SucursalController@ficha_colaborador')->name('colaborador.ficha');
Route::post('colaboradores/save-colaboradores-edit', 'SucursalController@save_colaborador_edit')->name('save.colaborador.edit');
//----------------------------------------------------------------------------------------------------------------------
//*****Clientes
Route::get('cliente_nuevo', 'ClientesController@cliente_formnuevo')->name('cliente.formNuevo');
Route::post('cliente_save', 'ClientesController@cliente_save')->name('cliente.save');
Route::get('clientes', 'ClientesController@clientes')->name('cliente.index');
Route::get('clientes/perfil/{id}', 'ClientesController@perfil')->name('cliente.perfil');
Route::post('clientes/prefil/save-rtn','ClientesController@savertn')->name('save.rtn');
//Route::get('clientes/perfil/{id}', 'ClientesController@estadotelefono')->name('cambiar.estado.telefono');
//avales
Route::get('aval-nuevo', 'AvalController@cliente_formnuevo')->name('aval.formNuevo');

//----------------------------------------------------------------------------------------------------------------------
//*****Entradas de motocicletas
//Consignadasn
Route::get('inventario/motocicletas/registro','ConsignadaController@indexForm')->name('consignada.index');
Route::get('/cargar_empleados/{id}', 'ConsignadaController@cargar_empleados');
Route::get('cargar_modelos/{id}', 'ConsignadaController@cargar_modelos');
Route::get('cargar_datos_modelos/{id}', 'ConsignadaController@cargar_datos_modelos');
Route::post('/inventario/motocicletas/consignada/registro','ConsignadaController@registro')->name('consignada.registro.save');
Route::get('/inventario/motocicletas/registro/2/{id}', 'ConsignadaController@registro2')->name('consignada.2.form');
Route::post('/inventario/motocicletas/consignada/registro/2','ConsignadaController@save_registro2')->name('save.2.form');
Route::get('/inventario/edit_entrada/{codigo}', 'ConsignadaController@edit_entrada');

//inventario
Route::get('/inventario/motocicletas','MotocicletasController@index')->name('motocicletas.index');
Route::get('/inventario/motocicletas/ficha/{codigo}','MotocicletasController@ficha')->name('motocicletas.ficha');
Route::get('/inventario/motocicletas/inventario_x_sucursal','MotocicletasController@inventario_sucursal')->name('inventarioSucursal.index');
Route::get('/inventario/motocicletas/cargarmotos/{id}','MotocicletasController@info_sucursal');
Route::get('/inventario/motocicletas/estado_de_transferencia', 'MotocicletasController@transferencia')->name('inventario.transferencia');
Route::get('inventario/motocicletas/vendidas', 'MotocicletasController@vendidas')->name('inventario.vendidas');
//doucmentos de entrada
Route::get('/inventario/motocicletas/documentos/entrada', 'DocumentosInventarioController@entrada_doc')->name('docEntrada.index');
Route::get('/inventario/motocicletas/documentos/', 'DocumentosInventarioController@doc')->name('doc.index');
Route::get('/inventario/motocicletas/documentos/entrada/{codigo}', 'DocumentosInventarioController@docEntrada_ficha')->name('docEntrada.ficha');
Route::post('/inventario/motocicletas/documentos/salidaceptada','DocumentosInventarioController@save_aceptado')->name('save.aceptada.salida');
Route::post('/inventario/motocicletas/documentos/entrada_edit','ConsignadaController@update_entrada')->name('edit.entrada');
//salidas
Route::get('/inventario/motocicletas/salidas_x_venta/', 'SalidasMotocicletasController@salidas_venta')->name('salidaVenta.index');
Route::post('/inventario/motocicletas/documentos/save_salida','SalidasMotocicletasController@salida_save')->name('salida.save');
Route::get('/inventario/motocicletas/documentos/salidas','SalidasMotocicletasController@index')->name('salidas.index');
Route::get('/inventario/motocicletas/documentos/salidas/{codigo}','SalidasMotocicletasController@venta')->name('salidas.venta');
Route::post('/inventario/motocicletas/documentos/salidas_x_venta/add_documentos','SalidasMotocicletasController@add_doc')->name('add.doc');
Route::post('/inventario/motocicletas/documentos/edit/num_factura','SalidasMotocicletasController@edit_num_factura')->name('edit_num_factura');
Route::get('/inventario/motocicletas/documentos/contratos_pendientes','SalidasMotocicletasController@contratos_pendientes')->name('contratospendientes');
//notificacions
Route::get('/inventario/motocicletas/notificaciones/', 'SalidasController@index_notificaciones')->name('notificaciones.index');
Route::get('/inventario/motocicletas/notificaciones/pendientes/{codigo}', 'SalidasController@index_notificaciones')->name('generacion.ver');
Route::get('/inventario/motocicletas/notificaciones/generadas/', 'SalidasController@index_generadas')->name('notificacion.gen');
Route::get('/inventario/motocicletas/notificaciones/generar/{codigo}/{fecha}', 'SalidasController@generacion_notificacion')->name('generacion.notificacion');
//transferencia
Route::get('/inventario/motocicletas/transferencias/salida_x_transferencia','SalidasController@formulario')->name('transferencia.formulario');
Route::post('/inventario/motocicletas/transferencias/salida_x_transferencia','TransferenciaController@save_transferencia')->name('save.transferencia');
Route::get('/cargar_motos_x_sucursal/{id}', 'SalidasController@cargarMotos');
Route::get('/inventario/motocicletas/documentos/transferencias/','TransferenciaController@index')->name('transferencias_internas.index');
Route::get('/inventario/motocicletas/documentos/transferencias_internas/{codigo}','TransferenciaController@transferencia')->name('transferencias_internas.transferencia');
Route::get('/decisiontransferencia/{codigo}/{valor}/{idusuario}/{idtr}', 'TransferenciaController@aceptarTrans');
Route::get('/inventario/motocicletas/documentos/transferencias/aceptadas','TransferenciaController@index_aceptadas')->name('aceptadas.index');
Route::get('/inventario/motocicletas/documentos/transferencias/pdf/{codigo}','TransferenciaController@pdf');
Route::post('/inventario/motocicletas/documentos/transferencias/declinadas','TransferenciaController@declinada')->name('declinada.transferencia');
Route::post('/inventario/motocicletas/documentos/transferencias/exitosas','TransferenciaController@exitosa')->name('transferencia.exitosa');
Route::get('/inventario/motocicletas/documentos/transferencias/declinadas','TransferenciaController@declinadas')->name('declinada.transferencia.index');
Route::get('/inventario/motocicletas/documentos/transferencias/exitosas','TransferenciaController@exitosas')->name('exitosas.transferencia.index');
Route::get('/inventario/motocicletas/documentos/transferenciasrechazadas/','TransferenciaController@rechazada')->name('transferencia.rechazadas');
Route::get('/inventario/motocicletas/documentos/transferencias/exitosas/motos/{codigo}','TransferenciaController@motos');
Route::get('/inventario/motocicletas/documentos/transferencias_externas','TransferenciasExternasController@index')->name('transferencias_externas.index');


Route::get('/inventario/motocicletas/documentos/salidas_x_transferencia_externa','TransferenciasExternasController@form')->name('transferenciasExternas.form');
Route::post('/inventario/motocicletas/documentos/salidas_x_transferencia_externa','TransferenciasExternasController@save_form')->name('transferenciasExternas.form.save');
Route::get('/inventario/motocicletas/documentos/salidas_x_transferencia_externa/{codigo}','TransferenciasExternasController@transferencia')->name('transferenciaExterna');

Route::get('/permisos/circulacion_sin_placa','PermisosController@index')->name('permisos.index');
Route::get('/compras_x_cliente/{id}','PermisosController@compras');
Route::get('/permiso/circulacion_sin_placa/{id}','PermisosController@generar_permiso');

//=========================================================================Placas
Route::get('/placas/ingreso','PlacasController@ingreso')->name('placas.ingreso');
Route::post('/placas/ingreso','PlacasController@save_ingreso')->name('placas.save');
Route::get('/placas/inventario','PlacasController@inventario')->name('placas.inventario');
Route::get('/info_placas/{id}','PlacasController@info');
Route::get('/placas/boleta/{codigo}','PlacasController@boleta')->name('placas.boleta');
Route::get('/placas/transferencia','PlacasController@transferencia')->name('placas.transferencia');
Route::post('/placas/transferencia','PlacasController@save_transferencia')->name('placas.transferencia.save');
Route::get('/cargar_almacenes','PlacasController@sucursales');
Route::get('/cargar_placas/{idorigen}/{iddestino}','PlacasController@cargarPlacas');
Route::get('/cargar_info_boletas/{id}','PlacasController@ver_info');
Route::get('/placas/documentos/transferencia','PlacasController@placas_transferencias')->name('placasTransferencias');
Route::get('/lotes_placas/{id}','PlacasController@lotes');
Route::post('/placas/transferencia_aceptar', 'PlacasController@saveTransferencia_aceptada')->name('placas.transferencia.aceptada.save');
Route::get('/placas/documentos/aceptadas_x_sucursals','PlacasController@aceptadas_sucursal')->name('placas.aceptadas.sucursal');
Route::get('verificar_chasis/{chasis}','ExistenciaPlacasController@chasis');
Route::get('verificar_motor/{motor}','ExistenciaPlacasController@motor');
Route::get('placas/documentos/pendientes','PlacasController@Pendientes')->name('placas.pendientes');
Route::get('placas/entrega','PlacasController@entrega')->name('placas.entrega');
Route::post('placas/entrega/save','PlacasController@entrega_save')->name('placas.entrega.save');
Route::get('/placas/documento_entrega/{boleta}','PlacasController@documento_entrega');

//qr  y reportes
Route::get('/motocicletas/qr/{codigo}','MotocicletasController@qr')->name('motocicletas.qr');
Route::get('/sl/reportes','ReportesController@index')->name('reportes.index');
Route::get('/sl/ventasmarcas/{num_peticion}','ReportesController@v_marcas');
Route::get('/sl/ventasmarcas/fecha/{mes}/{ano}','ReportesController@f_marcas');
Route::get('/sl/ventasmarcas/fecha/{ano}','ReportesController@f_ano');

//Problemas
Route::get('seccion_documentacion/','ProblemasController@index')->name('problemas.index');
Route::get('seccion_documentacion/reportar_problema','ProblemasController@reporte')->name('problemas.reporte');
Route::post('seccion_documentacion/reportar_problema','ProblemasController@save_reporte')->name('problemas.reporte.save');

Route::get('documentacion','DocumentacionController@index')->name('documentacion.index');
Route::get('documentacion/procesos','DocumentacionController@procesos')->name('documentacion.procesos');

//precios
Route::get('/modelos/asignacion_precios','PreciosModelosController@index')->name('preciomodelos.index');
Route::get('/modelos/asignacion_precios/modelo/{mdoelo}','PreciosModelosController@ficha')->name('preciosmodelos.ficha');
Route::post('/impuesto_save','PreciosModelosController@save_impuesto')->name('impuesto_save');
Route::post('/impuesto_edit','PreciosModelosController@edit_impuesto')->name('impuesto_edit');
Route::post('/gasto_administrativo_save','PreciosModelosController@save_ga')->name('ga.save');
Route::post('/gasto_administrativo_edit','PreciosModelosController@edit_ga')->name('ga.edit');
Route::post('/precio_modelo_save','PreciosModelosController@save_precios')->name('preciomodelos.save');

//cotizaciones
Route::get('/cotizaciones','CotizacionesController@index')->name('cotizaciones.index');
Route::get('/cotizaciones/precios_modelos/{id}','CotizacionesController@precios');
Route::post('/cotizaciones_save','CotizacionesController@save')->name('cotizaciones.save');
Route::get('/documentos/cotizaciones/cotizaciones_potenciales_abiertas','CotizacionesController@potenciales_abiertas')->name('cotizaciones.abiertas');
Route::get('/documentos/cotizaciones/cotizaciones_potenciales_abiertas/{cod}','CotizacionesController@potenciales_abiertas_cod')->name('cotizaciones.abiertas.cod');
Route::get('/documentos/cotizaciones/cotizaciones_potenciales_abiertas/pdf/{cod}','CotizacionesController@pdf')->name('cotizaciones.pdf');
Route::get('/documentos/cotizaciones/cotizaciones_ventas_pendientes/','CotizacionesController@pendientes')->name('cotizaciones.pendientes');
Route::get('/documentos/cotizaciones/cotizaciones_ventas_declinadas/','CotizacionesController@declinadas')->name('cotizaciones.declinadas');
Route::get('/documentos/cotizaciones/cotizaciones_ventas_aceptadas/','CotizacionesController@ventas_aceptadas')->name('cotizaciones.ventas.aceptadas');
Route::get('/documentos/cotizaciones/cotizaciones_ventas_pendientes/{cod}','CotizacionesController@pendientes_cot')->name('cotizaciones.pendientes_cod');
Route::get('/documentos/cotizaciones/cotizaciones_ventas_aceptadas/{cod}','CotizacionesController@cotizacion_aceptadas')->name('cotizaciones.aceptadas');
Route::post('/documentos/cotizacion/aceptar_cotizacion','CotizacionesController@aceptar')->name('cotizacion.aceptar');


//cuentas
Route::get('/cuentas','CuentasController@cuentas')->name('cuentas.cuentas');
Route::get('/cuentas/index','CuentasController@index')->name('cuentas.index');
Route::get('/cuenta/{codigo}','CuentasController@cuenta')->name('cuentas.cuenta');
Route::get('/cuenta/estado_cuenta/{cod}','CuentasController@historial_pago');
Route::get('/cuenta/proximos_pagos/{cod}','CuentasController@proximos_pagos');
Route::get('/cuenta/moras/{cod}','CuentasController@moras');
Route::get('/cuenta/pagos/cuota/{cod}','CuentasController@cuotas');

Route::post('/cuentas/edit/mora/porcentaje','ModificarCuentasController@mora_porcentaje')->name('mod.porcentaje');
Route::post('/cuentas/edit/mora/cambiar','ModificarCuentasController@mora_cambiar')->name('mod.cambiartotal');
Route::post('/cuentas/edit/mora/cero','ModificarCuentasController@mora_cero')->name('mod.cero');
//este es el calendario
Route::get('/cuentas/calendario_abonos','CuentasController@calendario')->name('calendario.index');
//este es para el posteo
Route::get('/cuentas/posteo/','CuentasController@posteo')->name('posteo.index');
Route::get('/cuenta/posteo/{codigo}','CuentasController@posteo_cuenta')->name('posteo.cuenta');
Route::get('/cuentas/posteo/info/{codigo}/{pago}','CuentasController@info_posteo');
Route::post('/cuenta/posteo/','CuentasController@registrar_posteo')->name('posteo.registrar');
Route::get('/cuenta/posteo/{codigo}/revision/{recibo}/{id}','CuentasController@revision')->name('posteo.revision');
Route::get('/cuenta/posteo/{codigo}/{id}','CuentasController@recibo')->name('posteo.recibo');
//este es para Asignar Cuentas
Route::get('/cuentas/asignacion', 'AsignarcuentasController@index')->name('cuentas.asignacion.index');
Route::get('/cuentas/asignacion/{salida}', 'AsignarcuentasController@cuenta')->name('cuentas.asignacion');
Route::post('/cuentas/asignacion/crear_cuenta','AsignarCuentasController@crear')->name('cuentas.asignacion.crear');
Route::get('/cuentas/asignacion/pagos/{cuenta}','AsignarCuentasController@pagos');
Route::get('/cuentas/asignacion/pagos/{id}/{pago}','AsignarCuentasController@pagos_pagos');
//otras cuentas
Route::get('/cuentas/otras/','CuentasController@otras');
//cajas
Route::get('/cajas/','CajasController@index');
Route::get('/cajas/consulta','CajasController@cargar_abonos');
//Calendario de Abonos
Route::get('/calendario/abonos/{ano}/{mes}','CuentasController@calendario_abonos');
//php artisan schedule:run
Route::get('/pruebas','PruebasController@txt');

//********moras
Route::get('/cobros/1/','ReporteMora1Controller@index')->name('cobros.index');
Route::get('/cobros/reporte/{cod}','ReporteMora1Controller@ver')->name('cobros.ver');
Route::post('/cobros/save_reporte','ReporteMora1Controller@save_accion');
Route::get('/cobros/cuerpo_reporte/{rep_id}','ReporteMora1Controller@cuerpo');
Route::post('/cobros/guardar_promesas', 'ReporteMora1Controller@guardar_promesa')->name('cobros.guardar_promesa');
Route::get('/cobros/cuerpo_promesas/{id}','ReporteMora1Controller@promesas');

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
Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/verificar', 'Auth\LoginController@enter')->name('validacionUser');
Route::get('/meter','Auth\LoginController@meter');
//index
Route::get('/inicio', 'InicioController@index')->name('index');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/usuarios/','UsuarioController@index')->name('usuario.index');
Route::get('/usuarios/nuevo','UsuarioController@crear_usuario')->name('usuario.crear');
Route::post('/usuarios/nuevo','UsuarioController@save_usuario')->name('usuario.save');
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
//Consignadas
Route::get('inventario/motocicletas/registro','ConsignadaController@indexForm')->name('consignada.index');
Route::get('/cargar_empleados/{id}', 'ConsignadaController@cargar_empleados');
Route::get('cargar_modelos/{id}', 'ConsignadaController@cargar_modelos');
Route::get('cargar_datos_modelos/{id}', 'ConsignadaController@cargar_datos_modelos');
Route::post('/inventario/motocicletas/consignada/registro','ConsignadaController@registro')->name('consignada.registro.save');
Route::get('/inventario/motocicletas/registro/2/{id}', 'ConsignadaController@registro2')->name('consignada.2.form');
Route::post('/inventario/motocicletas/consignada/registro/2','ConsignadaController@save_registro2')->name('save.2.form');

//inventario
Route::get('/inventario/motocicletas','MotocicletasController@index')->name('motocicletas.index');
Route::get('/inventario/motocicletas/ficha/{codigo}','MotocicletasController@ficha')->name('motocicletas.ficha');
Route::get('/inventario/motocicletas/inventario_x_sucursal','MotocicletasController@inventario_sucursal')->name('inventarioSucursal.index');
Route::get('/inventario/motocicletas/cargarmotos/{id}','MotocicletasController@info_sucursal');

//doucmentos de entrada
Route::get('/inventario/motocicletas/documentos/entrada', 'DocumentosInventarioController@entrada_doc')->name('docEntrada.index');
Route::get('/inventario/motocicletas/documentos/', 'DocumentosInventarioController@doc')->name('doc.index');
Route::get('/inventario/motocicletas/documentos/entrada/{codigo}', 'DocumentosInventarioController@docEntrada_ficha')->name('docEntrada.ficha');
Route::post('/inventario/motocicletas/documentos/salidaceptada','DocumentosInventarioController@save_aceptado')->name('save.aceptada.salida');
//salidas
Route::get('/inventario/motocicletas/salidas_x_venta/', 'SalidasMotocicletasController@salidas_venta')->name('salidaVenta.index');
Route::post('/inventario/motocicletas/documentos/save_salida','SalidasMotocicletasController@salida_save')->name('salida.save');
    Route::get('/inventario/motocicletas/documentos/salidas','SalidasMotocicletasController@index')->name('salidas.index');
Route::get('/inventario/motocicletas/documentos/salidas/{codigo}','SalidasMotocicletasController@venta')->name('salidas.venta');
//notificacions
Route::get('/inventario/motocicletas/notificaciones/', 'SalidasController@index_notificaciones')->name('notificaciones.index');
Route::get('/inventario/motocicletas/notificaciones/ver/{codigo}', 'SalidasController@index_notificaciones')->name('generacion.ver');
Route::post('/inventario/motocicletas/notificaciones/generar/', 'SalidasController@generacion_notificacion')->name('generacion.notificacion');
//transferencia
Route::get('/inventario/motocicletas/transferencias/salida_x_transferencia','SalidasController@formulario')->name('transferencia.formulario');

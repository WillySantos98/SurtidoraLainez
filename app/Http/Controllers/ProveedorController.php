<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use SurtidoraLainez\ContactoProveedor;
use SurtidoraLainez\Marca;
use SurtidoraLainez\Modelo;
use SurtidoraLainez\Proveedor;
use DB;
use SurtidoraLainez\Http\Requests\SaveProveedorRequest;
use SurtidoraLainez\Http\Requests\SaveTipoVehiculoRequest;
use SurtidoraLainez\Http\Requests\SaveModelosRequest;
use SurtidoraLainez\Http\Requests\SaveContactoProveedorRequest;
use SurtidoraLainez\TipoVehiculo;

class ProveedorController extends Controller
{
    public function index(){
        $proveedores = Proveedor::where('estado', 1)->get();
        $tipovehiculo = TipoVehiculo::all();
        $modelos = DB::table('modelos')
            ->join('marcas', 'marcas.id', '=','modelos.marca_id')->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->select('marcas.nombre', 'modelos.nombre_mod', 'marcas.proveedor_id','tipo_vehiculos.nombre_v', 'modelos.cilindraje')->get();

        return view('Proveedores.indexP', compact('proveedores', 'tipovehiculo','modelos'));
    }

    public function save_proveedor(SaveProveedorRequest $request)
    {

        $nuevo_proveedor = new Proveedor();

        $nuevo_proveedor->rtn = $request->input('Rtn');
        $nuevo_proveedor->nombre = $request->input('NombreProveedor');
        $nuevo_proveedor->telefono = $request->input('Telefono');
        $nuevo_proveedor->email = $request->input('Correo');
        $nuevo_proveedor->direccion = $request->input('Direccion');
        $nuevo_proveedor->estado = '1';
        $nuevo_proveedor->save();

        return redirect()->route('proveedor.index') ;
    }

    public function save_marca(Request $request){
        $nueva_marca = new Marca();

        $nueva_marca->nombre = $request->input('NombreMarca');
        $nueva_marca->proveedor_id = $request->input('SelectProveedor');
        $nueva_marca->save();

        return redirect()->route('proveedor.index') ;
    }

    public function save_modelo(SaveModelosRequest $request){
        $nuevo_modelo = new Modelo();

        $nuevo_modelo->marca_id = $request->input('SelectMarca');
        $nuevo_modelo->nombre_mod = $request->input('NombreModelo');
        $nuevo_modelo->cilindraje = $request->input('Cilindraje');
        $nuevo_modelo->tipovehiculo_id = $request->input('SelectTipoVehiculo');
        $nuevo_modelo->save();

        return redirect()->route('proveedor.index') ;
    }

    public function view_marcas($id){
        $marcas = Marca::where('proveedor_id', $id)->get();
        return $marcas->toJson();
    }

    public function save_tipovehiculo(SaveTipoVehiculoRequest $request){

        $nuevo_tipovehiculo = new TipoVehiculo();
        $nuevo_tipovehiculo->nombre_v = $request->input('Nombre');
        $nuevo_tipovehiculo->ruedas = $request->input('Ruedas');
        $nuevo_tipovehiculo->save();

        return redirect()->route('proveedor.index');
    }

    public function contactos(){
        $proveedores = Proveedor::where('estado', 1)->get();
        $contactos = DB::table('contacto_proveedors')
            ->join('proveedors', 'proveedors.id','=','contacto_proveedors.proveedor_id')
            ->select('contacto_proveedors.nombre','contacto_proveedors.telefono','contacto_proveedors.email','contacto_proveedors.tipo',
                'contacto_proveedors.estado', 'proveedors.nombre as nombre_p', 'contacto_proveedors.id')->get();

        return view('Proveedores.contactos', compact('proveedores','contactos'));
    }
    public function save_contacto(SaveContactoProveedorRequest $request){

        $nuevo_contacto = new ContactoProveedor();

        $nuevo_contacto->proveedor_id = $request->input('SelectProveedor');
        $nuevo_contacto->nombre = $request->input('NombreContacto');
        $nuevo_contacto->telefono = $request->input('Telefono');
        $nuevo_contacto->email = $request->input('Correo');
        $nuevo_contacto->estado = '1';
        $nuevo_contacto->tipo = $request->input('Funcion');
        $nuevo_contacto->save();

        return redirect()->route('contactos.index');
    }

    public function save_contacto_edit(Request $request){

        $nombre = $request->input('NombreContacto');
        DB::table('contacto_proveedors')->where('id', $request->Id)
            ->update(['telefono'=>$request->Telefono,'email'=>$request->Correo,'tipo'=>$request->Funcion, 'estado'=>$request->SelectEstado]);

        return redirect()->route('contactos.index')->with('status','El cambio del contacto '.$nombre.' se ha realizado correctamente');
    }

    public function consultas(){
        $tipoVehiculo = TipoVehiculo::all();
        $modelos = DB::table('modelos')
            ->join('marcas', 'marcas.id', '=','modelos.marca_id')->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('proveedors','proveedors.id','=','marcas.proveedor_id')
            ->select('marcas.nombre', 'modelos.nombre_mod', 'marcas.proveedor_id','tipo_vehiculos.nombre_v', 'modelos.cilindraje',
                'proveedors.nombre as nombre_Pro', 'modelos.id')->get();
        $proveedor = Proveedor::all();
        return view('Proveedores.consultas', compact('tipoVehiculo','modelos','proveedor'));
    }

    public function save_tipovehiculo_edit(SaveTipoVehiculoRequest $request){

        $nombre = $request->Nombre;
        DB::table('tipo_vehiculos')->where('id', $request->Id)
            ->update(['nombre_v'=>$request->Nombre,'ruedas'=>$request->Ruedas]);
            return redirect()->route('consultas.index')->with('status','La edición del nombre tipo vehivulo '.$nombre.'  correctamente');
    }

    public function save_modelos_edit(SaveModelosRequest $request){
        $nombre= $request->NombreModelo;

        DB::table('modelos')->where('id', $request->Id)
            ->update(['nombre_mod'=>$request->NombreModelo, 'cilindraje'=>$request->Cilindraje, 'tipovehiculo_id'=>$request->SelectTipoVehiculo]);

        return redirect()->route('consultas.index')->with('modelos','La edición del modelo '.$nombre.' se realizo correctamente');
    }
    public function save_proveedores_edit(Request $request){


    }
}

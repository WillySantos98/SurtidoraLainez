<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\GastosAdministrativos;
use SurtidoraLainez\HistorialUsuario;
use SurtidoraLainez\Impuesto;
use SurtidoraLainez\Marca;
use SurtidoraLainez\Modelo;
use SurtidoraLainez\PreciosModelo;
use SurtidoraLainez\TipoPrecio;
use Auth;

class PreciosModelosController extends Controller
{
    public function index(){
        $modelos = Modelo::join('marcas','marcas.id','=','modelos.marca_id')
            ->join('proveedors','proveedors.id','=','marcas.proveedor_id')
            ->select('modelos.nombre_mod','marcas.nombre as marca','proveedors.nombre as proveedor','modelos.id')
            ->get();
        $impuestos = Impuesto::all();
        $GA = GastosAdministrativos::all();
        return view('PreciosModelos.index',compact('modelos','impuestos','marcas','GA'));
    }

    public function ficha($modelo){
        $modelos = Modelo::join('marcas','marcas.id','=','modelos.marca_id')
            ->join('proveedors','proveedors.id','=','marcas.proveedor_id')
            ->select('modelos.nombre_mod','marcas.nombre as marca','proveedors.nombre as proveedor','modelos.id')
            ->where('modelos.nombre_mod', $modelo)
            ->get();
        $impuesto = Impuesto::all();
        $Gastos = GastosAdministrativos::all();
        $precio = PreciosModelo::join('modelos','modelos.id','=','precios_modelos.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->join('impuestos','impuestos.id','=','precios_modelos.id_impuesto')
            ->join('gastos_administrativos','gastos_administrativos.id','=','precios_modelos.id_gastos_administrativos')
            ->select('impuestos.impuesto','precios_modelos.margen_utilidad','precios_modelos.precio_s_impuesto',
                'precios_modelos.precio1','gastos_administrativos.cantidad','precios_modelos.precio2',
                'modelos.nombre_mod','marcas.nombre','precios_modelos.margen_anual','precios_modelos.prima_minima',
                'precios_modelos.ultima_modificacion')
            ->where('modelos.nombre_mod', $modelo)->get();
        return view('PreciosModelos.ficha', compact('modelos','impuesto','Gastos','precio'));
    }

    public function save_impuesto(Request $request){
        $nuevo_impuesto = new Impuesto();
        $nuevo_impuesto->nombre = $request->input('Nombre');
        $nuevo_impuesto->impuesto = ($request->input('Impuesto')/100);
        $nuevo_impuesto->save();

        return redirect()->route('preciomodelos.index')->with('aprobado','Se ha creado el impuesto '.$request->input('Nombre').' correctamente');
    }

    public function edit_impuesto(Request $request){
        DB::table('impuestos')->where('id',$request->input('SelectImpuesto'))
            ->update(['impuesto'=>($request->input('NuevoMargen')/100)]);

        return redirect()->route('preciomodelos.index')
            ->with('aprobado','Se ha actualizado correctamente el impuesto');
    }

    public function save_ga(Request $request){
        $nuevo_ga = new GastosAdministrativos();
        $nuevo_ga->nombre = $request->input('NombreGasto');
        $nuevo_ga->cantidad = $request->input('Gasto');
        $nuevo_ga->save();

        return redirect()->route('preciomodelos.index')
            ->with('aprobado','Se ha creado el gasto administrativo '.$request->input('NombreGasto').' correctamente.');
    }

    public function edit_ga(Request $request){
        DB::table('gastos_administrativos')->where('id',$request->input('SelectGA'))
            ->update(['cantidad'=>$request->input('NuevoGasto')]);

        return redirect()->route('preciomodelos.index')
            ->with('aprobado','Se ha actualizado correctamente el gasto administrativo');
    }

    public function save_precios(Request $request){
        $fecha_actual = date('Y-m-N');
        $modelo = $request->input('ModeloNombre');
        if (PreciosModelo::where('modelo_id','=', $request->input('ModeloMoto'))->exists()){
            DB::table('precios_modelos')->where('modelo_id','=', $request->input('ModeloMoto'))
                ->update(['precio_s_impuesto'=>$request->input('PrecioSimImp'),'margen_utilidad'=>$request->input('MargenUtilidad'),
                    'id_impuesto'=>$request->input('SelectImpuesto'),'precio1'=>$request->input('PrecioCosto'),
                    'id_gastos_administrativos'=>$request->input('SelectGA'),'precio2'=>$request->input('PrecioContado'),
                    'margen_anual'=>$request->input('UtilidadAnual'),'prima_minima'=>$request->input('PrimaMinima'),
                    'ultima_modificacion'=>$fecha_actual]);

            $nuevo_h = new HistorialUsuario();
            $nuevo_h->id_usuario = Auth::user()->id;
            $nuevo_h->usuario = Auth::user()->usuario;
            $nuevo_h->descripcion = "Cambio el precio del modelo de motocicletas ".$modelo;
            $nuevo_h->codigo = $modelo;
            $nuevo_h->save();

            return redirect('/modelos/asignacion_precios/modelo/'.$modelo)
                ->with('aprobado','Se ha modificado el precio del modelo '.$modelo.' y se le consolido el nuevo precio correctamente.');
        }else{
            $nuevo_precio = new PreciosModelo();
            $nuevo_precio->precio_s_impuesto = $request->input('PrecioSimImp');
            $nuevo_precio->margen_utilidad = $request->input('MargenUtilidad');
            $nuevo_precio->id_impuesto = $request->input('SelectImpuesto');
            $nuevo_precio->precio1 = $request->input('PrecioCosto');
            $nuevo_precio->id_gastos_administrativos = $request->input('SelectGA');
            $nuevo_precio->precio2 = $request->input('PrecioContado');
            $nuevo_precio->margen_anual= $request->input('UtilidadAnual');
            $nuevo_precio->prima_minima = $request->input('PrimaMinima');
            $nuevo_precio->observacion = "Sin Observaciones";
            $nuevo_precio->modelo_id = $request->input('ModeloMoto');
            $nuevo_precio->ultima_modificacion = $fecha_actual;
            $nuevo_precio->save();

            $nuevo_h = new HistorialUsuario();
            $nuevo_h->id_usuario = Auth::user()->id;
            $nuevo_h->usuario = Auth::user()->usuario;
            $nuevo_h->descripcion = "Consolido un precio nuevo al modelo de motocicletas ".$modelo;
            $nuevo_h->codigo = $modelo;
            $nuevo_h->save();

            return redirect('/modelos/asignacion_precios/modelo/'.$modelo)
                ->with('aprobado','Se ha consolidado un precio nuevo para el modelo '.$modelo.'.');
        }
    }

}

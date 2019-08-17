<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SurtidoraLainez\CuerpoTransferenciasExternas;
use SurtidoraLainez\EntradaMotocicleta;
use SurtidoraLainez\HistorialUsuario;
use SurtidoraLainez\Sucursal;
use SurtidoraLainez\Transferencia;
use SurtidoraLainez\TransferenciaInterna;
use SurtidoraLainez\TransferenciasExternas;
use Illuminate\Support\Facades\DB;

class TransferenciasExternasController extends Controller
{
    public function form(){
        $sucursales = Sucursal::all();
        return view('Inventario.Motocicletas.TransferenciasExternas.index', compact('sucursales'));
    }

    public function save_form(Request $request){
        $motos = $request->input('IdMotocicleta');
        $nueva_transferencia = new Transferencia();
        $cont_transferencia = Transferencia::all()->count();
        $nueva_transferencia_externa = new TransferenciasExternas();
        $fecha = date("ymd");

        $nueva_transferencia->cod_transferencia = 'tf-'.$cont_transferencia;
        $nueva_transferencia->almacen_salida = $request->input('SelectSucursal');
        $nueva_transferencia->encargado_salida = $request->input('SelectEmpleadoSucursal');
        $nueva_transferencia->usuario_creacion = $request->input('InputIdUsuario');
        $nueva_transferencia->fecha_solicitada = $fecha;
        $nueva_transferencia->fecha_decision = $fecha;
        $nueva_transferencia->estado = 7;
        $nueva_transferencia->observacion = $request->input('InputObservacion');
        $nueva_transferencia->estado_c = 7;
        $nueva_transferencia->save();

        $nueva_transferencia_externa->num_documento = $request->input('InputNumTransferencia');
        $nueva_transferencia_externa->destino = $request->input('InputDestino');
        $nueva_transferencia_externa->transferencia_id = $nueva_transferencia->id;
        $nueva_transferencia_externa->save();

        foreach ($request->input('IdMotocicleta') as $key => $value){
            $nueva_transferencia_externa_cuerpo = new CuerpoTransferenciasExternas();
            $nueva_transferencia_externa_cuerpo->moto_id = $motos[$key];
            $nueva_transferencia_externa_cuerpo->transferencia_id  = $nueva_transferencia_externa->id;
            $nueva_transferencia_externa_cuerpo->save();

            DB::table('entrada_motocicletas')->where('id', $motos[$key])
                ->update(['estado'=>7]);

            $nuevo_historial_m = new HistorialUsuario();
            $nuevo_historial_m->id_usuario = $request->input('InputIdUsuario');
            $nuevo_historial_m->usuario = $request->input('InputUsuario');
            $nuevo_historial_m->descripcion = 'Realizo la Salida de la motocicleta hacia '.$request->input('InputDestino');
            $nuevo_historial_m->codigo = $motos[$key];
            $nuevo_historial_m->save();
        }

        $nuevo_historial = new HistorialUsuario();
        $nuevo_historial->id_usuario = $request->input('InputIdUsuario');
        $nuevo_historial->usuario = $request->input('InputUsuario');
        $nuevo_historial->descripcion = 'Realizo una transferencia de salida externa hacia '.$request->input('InputDestino');
        $nuevo_historial->codigo = $nueva_transferencia->cod_transferencia;
        $nuevo_historial->save();

        return redirect()->route('transferencias_externas.index')->with('status','Se realizo la transferencia '.$nueva_transferencia->cod_transferencia.' con exito');

    }

    public function index(){
        $transferencia = Transferencia::where('transferencias.estado',7)->join("sucursals","sucursals.id","=","transferencias.almacen_salida")
            ->join("colaboradors","colaboradors.id","=","transferencias.encargado_salida")
            ->join("transferencias_externas","transferencias_externas.transferencia_id","=","transferencias.id")
            ->join("users","users.id","=","transferencias.usuario_creacion")
            ->select("transferencias.cod_transferencia","sucursals.nombre","transferencias.fecha_decision","transferencias_externas.destino",
                "users.usuario")
            ->get();
        return view('Inventario.Motocicletas.Documentos.TransferenciasExternas.index', compact('transferencia'));
    }

    public function transferencia($codigo){
        $transferencia = Transferencia::where('transferencias.cod_transferencia',$codigo)->join("sucursals","sucursals.id","=","transferencias.almacen_salida")
            ->join("colaboradors","colaboradors.id","=","transferencias.encargado_salida")
            ->join("transferencias_externas","transferencias_externas.transferencia_id","=","transferencias.id")
            ->join("users","users.id","=","transferencias.usuario_creacion")
            ->select("transferencias.cod_transferencia","sucursals.nombre as nombre_suc","transferencias.fecha_decision","transferencias_externas.destino",
                "users.usuario","colaboradors.nombre as nombre_col","transferencias.observacion")
            ->get();
        $motos = EntradaMotocicleta::join("cuerpo_transferencias_externas","cuerpo_transferencias_externas.moto_id","=","entrada_motocicletas.id")
            ->join("transferencias_externas","transferencias_externas.id","=","cuerpo_transferencias_externas.transferencia_id")
            ->join("transferencias","transferencias.id","=","transferencias_externas.transferencia_id")
            ->join("marcas","marcas.id","=","entrada_motocicletas.marca_id")
            ->join("modelos","modelos.id","=","entrada_motocicletas.modelo_id")
            ->where("transferencias.cod_transferencia", $codigo)
            ->select("entrada_motocicletas.id_moto","marcas.nombre as nombre_mar","modelos.nombre_mod","entrada_motocicletas.chasis",
                "entrada_motocicletas.motor","entrada_motocicletas.ano","entrada_motocicletas.color")
            ->get();
        $historial = HistorialUsuario::where('codigo', $codigo)->get();
        return view('Inventario.Motocicletas.Documentos.TransferenciasExternas.transferencia', compact('transferencia', 'motos','historial'));
    }
}

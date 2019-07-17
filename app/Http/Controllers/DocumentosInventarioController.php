<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Consignacion;
use SurtidoraLainez\HistorialUsuario;
use SurtidoraLainez\Notificacion;
use SurtidoraLainez\Salida;
use SurtidoraLainez\Transferencia;

class DocumentosInventarioController extends Controller
{

    public function entrada_doc(){
        $DatosEntrada = DB::table('consignacions')
            ->join('proveedors','proveedors.id','=','consignacions.proveedor_id')
            ->join('sucursals','sucursals.id','=','consignacions.sucursal_id')
            ->join('tipo_entradas','tipo_entradas.id','=','consignacions.tipo_entrada_id')
            ->select('consignacions.cod_entrada', 'consignacions.num_transferencia',
                'consignacions.fecha_entrada', 'proveedors.nombre as nombre_pro','sucursals.nombre as nombre_suc',
                'tipo_entradas.nombre as nombre_ent')
            ->get();
        return view('Inventario.Motocicletas.Documentos.Entradas.index', compact('DatosEntrada'));
    }
    public function doc(){
        $entradas = Consignacion::all()->count();
        $salidas = Salida::all()->count();
        $notificaciones = Notificacion::where('estado',1)->count();
        $notificaciones2 = Notificacion::where('estado',2)->count();
        $trans_p = Transferencia::where('estado', 2)->count();
        $trans_a = Transferencia::where('estado', 1)->count();
        $trans_r = Transferencia::where('estado', 3)->count();
        $trans_declinadas = Transferencia::where('estado_c', 2)->count();
        $trans_exitosas = Transferencia::where('estado_c', 1)->count();
        return view('Inventario.Motocicletas.Documentos.index', compact('entradas','salidas','notificaciones'
        ,'trans_p','trans_a','trans_r','notificaciones2','trans_declinadas','trans_exitosas'));
    }

    public function docEntrada_ficha($codigo){
        $DatosEncabezado = Consignacion::where('cod_entrada',$codigo)->get();
        $historial = HistorialUsuario::all();
        $entrada_documentos = DB::table('documentos_consignacions')
            ->join('consignacions','consignacions.id','=','documentos_consignacions.consignacion_id')
            ->select('documentos_consignacions.nombre','consignacions.cod_entrada')
            ->where('consignacions.cod_entrada',$codigo)->get();
        $contador_doc = DB::table('documentos_consignacions')
            ->join('consignacions','consignacions.id','=','documentos_consignacions.consignacion_id')
            ->where('consignacions.cod_entrada',$codigo)->get()->count();
        $DatosEntrada = DB::table('consignacions')
            ->join('proveedors','proveedors.id','=','consignacions.proveedor_id')
            ->join('tipo_entradas','tipo_entradas.id','=','consignacions.tipo_entrada_id')
            ->join('colaboradors','colaboradors.id','=','consignacions.colaborador_id')
            ->join('sucursals','sucursals.id','=','consignacions.sucursal_id')
            ->join('users','users.id','=','consignacions.usuario_id')
            ->select('consignacions.num_transferencia','consignacions.fecha_entrada',
                'tipo_entradas.nombre as nombre_tip','colaboradors.nombre as nombre_col','sucursals.nombre as nombre_suc',
                'consignacions.cod_entrada','users.usuario','proveedors.nombre as nombre_pro')
            ->where('consignacions.cod_entrada',$codigo)
            ->get();
        $DatosMotos = DB::table('entrada_motocicletas')
            ->join('marcas', 'marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos', 'modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('consignacions', 'consignacions.id','=','entrada_motocicletas.consignacion_id')
            ->select('marcas.nombre as nombre_mar','modelos.nombre_mod','entrada_motocicletas.chasis','entrada_motocicletas.motor',
                'entrada_motocicletas.ano','entrada_motocicletas.observacion','entrada_motocicletas.id','entrada_motocicletas.id_moto')
            ->where('consignacions.cod_entrada',$codigo)
            ->get();
        return view('Inventario.Motocicletas.Documentos.Entradas.ficha', compact('DatosEncabezado','DatosEntrada','contador_doc',
            'entrada_documentos','DatosMotos', 'historial'));
    }
}

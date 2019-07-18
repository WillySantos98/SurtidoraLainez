<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use SurtidoraLainez\CuerpoTransfereciaInterna;
use SurtidoraLainez\HistorialUsuario;
use SurtidoraLainez\Transferencia;
use SurtidoraLainez\TransferenciaInterna;
use SurtidoraLainez\User;

class TransferenciaController extends Controller
{
    public function save_transferencia(Request $request){
        $motos = $request->input('IdMotocicleta');
        $nueva_transferencia = new Transferencia();
        $cont_transferencia = Transferencia::all()->count();
        $nueva_transferencia_interna = new TransferenciaInterna();
        $cont_interna = TransferenciaInterna::all()->count();

        $nueva_transferencia->cod_transferencia = 'tf-'.$cont_transferencia;
        $nueva_transferencia->almacen_salida = $request->input('SelectAlmacenOrigen');
        $nueva_transferencia->encargado_salida = $request->input('SelectEncargadoOrigen');
        $nueva_transferencia->usuario_creacion = $request->input('IdUsuario');
        $nueva_transferencia->fecha_solicitada = $request->input('FechaPeticion');
        $nueva_transferencia->estado = 2;
        $nueva_transferencia->estado_c = 3;
        $nueva_transferencia->save();

        $nueva_transferencia_interna->transferencia_id = $nueva_transferencia->id;
        $nueva_transferencia_interna->cod_transferencia = $nueva_transferencia->cod_transferencia.'-tfi-'.$cont_interna;
        $nueva_transferencia_interna->almacen_destino = $request->input('SelectAlmacenDestino');
        $nueva_transferencia_interna->encargado_destino = $request->input('SelectEncargadoDestino');
        $nueva_transferencia_interna->usuario_decision = 6;
        $nueva_transferencia_interna->save();

        foreach ($request->input('IdMotocicleta') as $key => $value){
            $nueva_transferencia_interna_cuerpo = new CuerpoTransfereciaInterna();
            $nueva_transferencia_interna_cuerpo->moto_id = $motos[$key];
            $nueva_transferencia_interna_cuerpo->transferencia_id  = $nueva_transferencia_interna->id;
            $nueva_transferencia_interna_cuerpo->save();
        }


        return redirect()->route('transferencias_internas.index');
    }

    public function index(){
        $transferencia = DB::table('transferencias')
            ->select('transferencias.id','transferencias.cod_transferencia','sucursals.nombre as nombre_suc','transferencias.fecha_solicitada')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')->where('transferencias.estado', 2)
            ->get();
        return view('Inventario.Motocicletas.Documentos.Transferencia.index', compact('transferencia'));
    }

    public function transferencia($codigo){
        $trans1 = DB::table('transferencias')
            ->select('transferencias.id','transferencias.cod_transferencia','sucursals.nombre as nombre_suc','transferencias.fecha_solicitada',
                'colaboradors.nombre as nombre_col','users.usuario', 'transferencias.fecha_decision','transferencias.estado','transferencias.estado_c')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')
            ->join('colaboradors','colaboradors.id','=','transferencias.encargado_salida')
            ->join('users','users.id','=','transferencias.usuario_creacion')
            ->where('transferencias.cod_transferencia',$codigo)
            ->get();
        $trans2 = DB::table('transferencia_internas')
            ->select('sucursals.nombre as nombre_suc','colaboradors.nombre as nombre_col','users.usuario','transferencia_internas.id')
            ->join('sucursals','sucursals.id','=','transferencia_internas.almacen_destino')
            ->join('colaboradors','colaboradors.id','=','transferencia_internas.encargado_destino')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->join('users','users.id','=','transferencia_internas.usuario_decision')
            ->where('transferencias.cod_transferencia',$codigo)->get();
        $trans3 = DB::table('cuerpo_transferecia_internas')
            ->select('entrada_motocicletas.id_moto','entrada_motocicletas.chasis','entrada_motocicletas.motor',
                'entrada_motocicletas.color','entrada_motocicletas.ano','marcas.nombre','modelos.nombre_mod')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','cuerpo_transferecia_internas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('transferencia_internas','transferencia_internas.id','=','cuerpo_transferecia_internas.transferencia_id')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->join('users','users.id','=','transferencia_internas.usuario_decision')
            ->where('transferencias.cod_transferencia',$codigo)->get();
        return view('Inventario.Motocicletas.Documentos.Transferencia.transInternas', compact('trans1','trans2','trans3'));
    }

    public function aceptarTrans($codigo,$valor, $idusuario, $idtr){
        $fecha = date("ymd");
        $users = User::where('id', $idusuario);
        DB::table('transferencias')->where('cod_transferencia', $codigo)
          ->update(['estado'=>$valor, 'fecha_decision'=>$fecha]);
        DB::table('transferencia_internas')->where('id', $idtr)
            ->update(['usuario_decision'=>$idusuario]);
        $validar = DB::table('transferencias')->select('transferencias.estado','transferencia_internas.almacen_destino')
            ->join('transferencia_internas','transferencia_internas.transferencia_id','=','transferencias.id')
            ->where('transferencias.cod_transferencia', $codigo)->get();
        $motos = DB::table('cuerpo_transferecia_internas')->select('cuerpo_transferecia_internas.moto_id')
            ->join('transferencia_internas','transferencia_internas.id','=','cuerpo_transferecia_internas.transferencia_id')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->where('transferencias.cod_transferencia', $codigo)
            ->get();
        foreach ($validar as $value):
            if ($value->estado == 1){
                try{
                    foreach ($users as $user){
                        $nuevo_historial = new HistorialUsuario();
                        $nuevo_historial->id_usuario = $idusuario;
                        $nuevo_historial->usuario = $user->usuario;
                        $nuevo_historial->descripcion = "Acepto la transferencia numero ";
                        $nuevo_historial->codigo = $codigo;
                        $nuevo_historial->save();
                        break;
                    }
                    foreach ($motos as $moto){
                        DB::table('entrada_motocicletas')->where('id', $moto->moto_id)
                            ->update(['estado'=>5]);
                        //'sucursal_id'=>$value->almacen_destino,
                        foreach ($users as $user){
                            $nuevo_historial = new HistorialUsuario();
                            $nuevo_historial->id_usuario = $idusuario;
                            $nuevo_historial->usuario = $user->usuario;
                            $nuevo_historial->descripcion = "Acepto la transferencia de la moto ".$moto->moto_id.' en la transferencia '.$codigo;
                            $nuevo_historial->codigo = $codigo;
                            $nuevo_historial->save();
                            break;
                        }
                    }

                    $accion = 1;
                }catch (Exception $e){
                    $accion = 0;
                }
            }elseif ($value->estado  == 3){
                $accion = 1;
                foreach ($users as $user){
                    $nuevo_historial = new HistorialUsuario();
                    $nuevo_historial->id_usuario = $idusuario;
                    $nuevo_historial->usuario = $user->usuario;
                    $nuevo_historial->descripcion = "No acepto la transferencia numero ";
                    $nuevo_historial->codigo = $codigo;
                    $nuevo_historial->save();
                }
            }else{
                $accion = 0;
            }
        endforeach;
        return $accion;
    }

    public function index_aceptadas(){
        $origen = DB::table('transferencias')
            ->select('transferencias.cod_transferencia','sucursals.nombre','transferencias.estado_c')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')
            ->where('transferencias.estado', 1)->get();
        $destino = DB::table('transferencia_internas')
            ->join('sucursals','sucursals.id','=','transferencia_internas.almacen_destino')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->select('transferencias.cod_transferencia','sucursals.nombre as nombre_suc')
            ->where('transferencias.estado', 1)->get();
        $motos = DB::table('cuerpo_transferecia_internas')
            ->select('entrada_motocicletas.id_moto','entrada_motocicletas.motor','entrada_motocicletas.chasis',
                'entrada_motocicletas.color','entrada_motocicletas.ano','marcas.nombre','modelos.nombre_mod','transferencias.cod_transferencia')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','cuerpo_transferecia_internas.moto_id')
            ->join('transferencia_internas','transferencia_internas.id','=','cuerpo_transferecia_internas.transferencia_id')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->where('transferencias.estado', 1)->get();
        return view('Inventario.Motocicletas.Documentos.Transferencia.IndexAceptadas',compact('origen','destino','motos'));
    }

    public function pdf($codigo){
        $consultaO = DB::table('transferencias')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')
            ->join('colaboradors','colaboradors.id','=','transferencias.encargado_salida')
            ->join('users','users.id','=','transferencias.usuario_creacion')
            ->select('sucursals.nombre as nombre_suc','sucursals.direccion','transferencias.cod_transferencia','colaboradors.nombre as nombre_col',
                'users.usuario')
            ->where('transferencias.cod_transferencia', $codigo)
            ->get();
        $consulta2 = DB::table('transferencia_internas')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->join('sucursals','sucursals.id','=','transferencia_internas.almacen_destino')
            ->join('colaboradors','colaboradors.id','=','transferencia_internas.encargado_destino')
            ->join('users','users.id','=','transferencia_internas.usuario_decision')
            ->select('sucursals.nombre as nombre_suc','sucursals.direccion','transferencias.cod_transferencia','colaboradors.nombre as nombre_col',
                'users.usuario')
            ->where('transferencias.cod_transferencia', $codigo)
            ->get();
        $motos = DB::table('cuerpo_transferecia_internas')
            ->select('entrada_motocicletas.id_moto','entrada_motocicletas.motor','entrada_motocicletas.chasis',
                'entrada_motocicletas.color','entrada_motocicletas.ano','marcas.nombre','modelos.nombre_mod','transferencias.cod_transferencia')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','cuerpo_transferecia_internas.moto_id')
            ->join('transferencia_internas','transferencia_internas.id','=','cuerpo_transferecia_internas.transferencia_id')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->where('transferencias.cod_transferencia', $codigo)->get();
        $pdf = \PDF::loadView('transferencia', compact('consultaO', 'consulta2','motos'));
        return $pdf->stream('documentoddj');
    }

    public function declinada(Request $request){
        DB::table('transferencias')->where('transferencias.cod_transferencia',$request->input('InputCodTransferencia'))
            ->update(['estado_c'=>2]);
        $motos = DB::table('cuerpo_transferecia_internas')
            ->join('transferencia_internas','transferencia_internas.id','=','cuerpo_transferecia_internas.transferencia_id')
            ->join('transferencias','transferencias.id','=','transferencia_internas.transferencia_id')
            ->select('cuerpo_transferecia_internas.moto_id')
            ->where('transferencias.cod_transferencia',$request->input('InputCodTransferencia'))->get();
        foreach ($motos as $moto){
            DB::table('entrada_motocicletas')->where('id',$moto->moto_id)
                ->update(['estado'=>1]);
        }
        $nuevo_historial = new HistorialUsuario();
        $nuevo_historial->id_usuario = $request->input('UserTransferencia');
        $nuevo_historial->usuario = $request->input('User');
        $nuevo_historial->descripcion = "Cancelo la transferencia. Mirar en observaciones de la transferencia.";
        $nuevo_historial->codigo = $request->input('InputCodTransferencia');
        $nuevo_historial->save();

        //return var_dump($motos);
        return redirect()->route('doc.index')->with('status','La declinacion de la transferencia ha sido exitosa');
    }

    public function rechazada(){
        $transferencia = DB::table('transferencias')
            ->select('transferencias.id','transferencias.cod_transferencia','sucursals.nombre as nombre_suc'
                ,'transferencias.fecha_solicitada','transferencias.estado')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')->where('transferencias.estado', 3)
            ->get();
        return view('Inventario.Motocicletas.Documentos.Transferencia.TransferenciasRechazadas', compact('transferencia'));
    }

    public function declinadas(){
        $transferencia = DB::table('transferencias')
            ->select('transferencias.id','transferencias.cod_transferencia','sucursals.nombre as nombre_suc'
                ,'transferencias.fecha_solicitada','transferencias.estado_c')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')
            ->where('transferencias.estado_c', 2)
            ->get();

        return view('Inventario.Motocicletas.Documentos.Transferencia.IndexDeclinadas', compact('transferencia'));
    }

    public function exitosa(Request $request){
        $id = $request->input('InputIdTrans');
        $motos = $request->input('InputIdMoto');
        $sucursal = TransferenciaInterna::where('transferencia_id', $id)->get();
        DB::table('transferencias')->where('id', $id)
            ->update(['estado_c'=>1]);
        foreach ($sucursal as $item){
            for ($i=0; $i<count($motos); $i++){
                DB::table('entrada_motocicletas')->where('id', $motos[$i])
                    ->update(['estado'=>1,'sucursal_id'=>$item->almacen_destino]);
                DB::table('documentos_motocicletas')->where('entrada_id', $motos[$i])
                    ->update(['casco'=>$request->input('SelectCasco'), 'hoja_garantia'=>$request->input('SelectHoja'),
                        'llaves'=>$request->input('SelectLlaves'), 'bateria'=>$request->input('SelectBateria'),
                        'acido_bateria'=>$request->input('SelectAcido')]);
            }
            break;
        }
        return redirect()->route('doc.index')->with('status','La Aceptacion de la transferencia ha sido exitosa');
    }

    public function motos($codigo){
        $motos = DB::table('transferencias')
            ->join('transferencia_internas','transferencia_internas.transferencia_id','=','transferencias.id')
            ->join('cuerpo_transferecia_internas','cuerpo_transferecia_internas.transferencia_id','=','transferencia_internas.id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','cuerpo_transferecia_internas.moto_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('entrada_motocicletas.id_moto','modelos.nombre_mod','entrada_motocicletas.motor','entrada_motocicletas.chasis',
                'entrada_motocicletas.color','transferencias.id','entrada_motocicletas.id as idm')
            ->where('transferencias.cod_transferencia', $codigo)->get();

        return $motos;
    }

    public function exitosas(){
        $transferencia = DB::table('transferencias')
            ->select('transferencias.id','transferencias.cod_transferencia','sucursals.nombre as nombre_suc'
                ,'transferencias.fecha_solicitada','transferencias.estado_c')
            ->join('sucursals','sucursals.id','=','transferencias.almacen_salida')
            ->where('transferencias.estado_c', 1)
            ->get();

        return view('Inventario.Motocicletas.Documentos.Transferencia.IndexExistosas', compact('transferencia'));
    }
}

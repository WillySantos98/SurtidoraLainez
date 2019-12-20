<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\CuerpoReporteMora;
use SurtidoraLainez\Mora;
use SurtidoraLainez\PromesasReporteMora;
use SurtidoraLainez\ReporteMora;
use SurtidoraLainez\TelefonoCliente;

class ReporteMora1Controller extends Controller
{
    public function index(){
        $reportes = ReporteMora::join('cuentas','cuentas.id','=','reporte_moras.cuenta_id')
            ->join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->where('estado', 2)->where('proximo_recordatorio', date('Y-m-d'))->get();
        return view('Cobros.Nivel1.index', compact('reportes'));
    }

    public function ver($cod){
        $cuerpo = ReporteMora::
            join('cuentas','cuentas.id','=','reporte_moras.cuenta_id')
            ->join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('sucursals','sucursals.id','=','salidas.sucrusal_id')
            ->select('clientes.id','clientes.nombres','clientes.apellidos','cuentas.cod_cuenta','marcas.nombre',
                'modelos.nombre_mod','salidas.fecha_salida','sucursals.nombre as nombre_suc','cuentas.id as cuenta_id',
                'reporte_moras.importancia','reporte_moras.id as reporte_id','reporte_moras.importancia')
            ->where('reporte_moras.codigo_reporte', $cod)->get();
        $id_cliente = 0;
        $cuenta_id = 0;
        foreach ($cuerpo as $c):
            $id_cliente = $c->id;
            $cuenta_id = $c->cuenta_id;
        endforeach;
        $telefonos = TelefonoCliente::where('cliente_id', $id_cliente)->get();
        $moras = Mora::join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
        ->where('moras.cuenta_id', $cuenta_id)->where('moras.estado',1)->get();

        return view('Cobros.index', compact('cod','cuerpo','telefonos','moras'));

    }

    public function save_accion(Request $request){
        $data = [];
        $fecha_actual = date('Y-m-d');
         $fecha_nueva  = strtotime('+1 day',strtotime($fecha_actual));
        $fecha_nueva =  date('Y-m-d', $fecha_nueva);
        try{
            $contador = CuerpoReporteMora::where('reporte_id', $request->input('reporte_id'))->count();
            $nuevo_cuerpo = new CuerpoReporteMora();
            $nuevo_cuerpo->reporte_id = $request->input('reporte_id');
            $nuevo_cuerpo->observacion = $request->input('observacion');
            $nuevo_cuerpo->fecha = $fecha_actual;
            $nuevo_cuerpo->forma_contactado = $request->input('contactado');
            $nuevo_cuerpo->codigo = $request->input('reporte_cod').'-'.($contador + 1);
            $nuevo_cuerpo->resultado = $request->input('resultado');
            $nuevo_cuerpo->usuario_id = Auth::user()->id;
            $nuevo_cuerpo->save();
            $data['success'][0] = $nuevo_cuerpo->codigo;
            DB::table('reporte_moras')->where('id', $request->input('reporte_id'))
                ->update(['proximo_recordatorio'=>$fecha_nueva,'ultima_modificacion'=>date('Y-m-d')]);
        }catch (\Exception $exception){
            $data['errors'] = $exception;
        }

        return $data;
    }

    public function guardar_promesa(Request $request){
        $errors = [];
        try{
            $nueva_promesa = new PromesasReporteMora();
            $nueva_promesa->reporte_id = $request->input('reporte_id');
            $nueva_promesa->fecha_promesa = $request->input('fecha_promesa');
            $nueva_promesa->descripcion = "Promesa de pago";
            $nueva_promesa->referencia = $request->input('referencia');
            $nueva_promesa->pago_acordado = $request->input('pago_acordado');
            $nueva_promesa->save();

            DB::table('reporte_moras')->where('id', $request->input('reporte_id'))
                ->update(['proximo_recordatorio'=>$request->input('fecha_promesa'),'ultima_modificacion'=>date('Y-m-d')]);

        }catch (\Exception $exception){
            $errors= $exception;
        }

        return $errors;

    }

    public function promesas($rep_id){
        $promesas = PromesasReporteMora::where('reporte_id',$rep_id)->get();
        return $promesas;

    }
    public function cuerpo($rep_id){
        $cuerpo = CuerpoReporteMora::join('users','users.id','=','cuerpo_reporte_moras.usuario_id')
        ->where('reporte_id', $rep_id)->get();
        return $cuerpo;
    }
}

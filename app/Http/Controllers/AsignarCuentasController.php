<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\Http\Controllers\Funciones\AsignarCuenta;
use SurtidoraLainez\PagosCuenta;
use SurtidoraLainez\Salida;
use SurtidoraLainez\User;

class AsignarCuentasController extends Controller
{
    public function index(){
        $salidas = Salida::join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->where('cuenta',2)->get();
        return view('Cuentas.Asignacion.index',compact('salidas'));
    }

    public function cuenta($salida){
        $salidas = Salida::join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('clientes.nombres','clientes.apellidos','clientes.identidad','marcas.nombre','salidas.cod_venta',
                'salidas.id','modelos.nombre_mod','entrada_motocicletas.chasis','entrada_motocicletas.id_moto')
            ->where('cod_venta',$salida)->get();

        return view('Cuentas.Asignacion.Asignacion', compact('salidas'));
    }

    public function save(Request $request){

    }

    public function tareas(){
        $tareas = User::all();

        return $tareas;
    }

    public function crear(Request $request){
        $errores = [];
        try{
            $fecha = $request->input('fecha');
            $fecha_vencimiento = strtotime('+'.$request->input('plazo').' month', strtotime($fecha));
            $fecha_vencimiento = date('Y-m-d', $fecha_vencimiento);
            if ($request->input('intervalo') == 0){
                $descripcion = 'Cuenta del contado';
            }elseif ($request->input('intervalo') > 0){
                $descripcion = 'Cuenta al credito';
            }
            $codigo_cuenta = FuncionesCuenta::CrearCodigo();
            $nueva_cuenta = new Cuenta();
            $nueva_cuenta->salida_id = $request->input('salida_id');
            $nueva_cuenta->plazo = $request->input('plazo');
            $nueva_cuenta->intervalo_pago = $request->input('intervalo');
            $nueva_cuenta->dias_gracia = 5;
            $nueva_cuenta->cod_cuenta = $codigo_cuenta;
            $nueva_cuenta->saldo_financiar = round($request->input('saldo_inicial') - $request->input('prima'),2);
            $nueva_cuenta->total_inicial_cuenta = $request->input('saldo_inicial');
            $nueva_cuenta->saldo_actual = $request->input('saldo_inicial');
            $nueva_cuenta->fecha_vencimiento = $fecha_vencimiento;
            $nueva_cuenta->prima = $request->input('prima');
            $nueva_cuenta->total_pagos = $request->input('plazo') * $request->input('intervalo');
            $nueva_cuenta->estado_interes = 1;
            $nueva_cuenta->total_intereses = 0;
            $nueva_cuenta->estado_cuenta = 1;
            $nueva_cuenta->descripcion = $descripcion;
            $nueva_cuenta->mora = 0.05;
            $nueva_cuenta->saldo_con_interes = $request->input('saldo_inicial');
            $nueva_cuenta->tipo_cuenta = 1;
            $nueva_cuenta->save();

            AsignarCuenta::CrearPagos($nueva_cuenta->id,$request->input('dias_pago'),$request->input('intervalo'),
                $request->input('prima'),$request->input('saldo_inicial'),$fecha, $request->input('plazo'));
            AsignarCuenta::EstadoSalida($request->input('salida_id'));
            AsignarCuenta::Estadocuenta($nueva_cuenta->id, $request->input('saldo_inicial'), $codigo_cuenta);
            $errores = $nueva_cuenta->id;
        }catch (\Exception $exception){
            $errores = $exception;
            PagosCuenta::where('cuenta_id', $nueva_cuenta->id)->delete();
            Cuenta::destroy($nueva_cuenta->id);
        }

        return response($errores);
    }

    public function pagos($codigo){
        $pagos = PagosCuenta::where('cuenta_id', $codigo)->get();

        return $pagos;
    }

    public function pagos_pagos($id, $pago){
        $errores = [];
        try{
            $pagos = PagosCuenta::where('id', $id)->get();
            foreach ($pagos as $p){
                $cuota = $p->cuota;
                $cuenta = $p->cuenta_id;
                break;
            }
            $nuevo_total = round($cuota - $pago, 2);
            if ($nuevo_total <= 0){
                $estado = 2;
                $nuevo_total = 0;
            }else{
                $estado = 1;
            }

            DB::table('pagos_cuentas')->where('id', $id)
                ->update(['cuota'=>$nuevo_total,'estado'=>$estado]);
            $cuentas = Cuenta::where('id',$cuenta)->get();
            foreach ($cuentas as $c){
                $saldo_cuenta = $c->saldo_con_interes;
                break;
            }
            $saldo_nuevo_cuenta = round($saldo_cuenta - $pago, 2);
            if ($saldo_nuevo_cuenta <= 0){
                $estado_cuenta = 2;
            }else{
                $estado_cuenta = 1;
            }
            AsignarCuenta::EstadoCuentaCredito($cuenta, $saldo_cuenta, Auth::user()->usuario, 'Posteo por usuario al crear la cuenta', $pago);
            DB::table('cuentas')->where('id', $cuenta)
                ->update(['saldo_actual'=>$saldo_nuevo_cuenta,'estado_cuenta'=>$estado_cuenta,'saldo_con_interes'=>$saldo_nuevo_cuenta]);
            $errores = $nuevo_total;
        }catch (\Exception $exception){
            $errores = $exception;
        }

        return $errores;
    }

}

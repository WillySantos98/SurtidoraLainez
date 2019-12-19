<?php


namespace SurtidoraLainez\Http\Controllers\Funciones;


use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Abonos;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\Mora;
use SurtidoraLainez\PagosCuenta;

class PostearPagos
{
    public static function PostearMora($mora_id, $pago, $cuenta_id, $descripcion, $recibo){
        $moras = Mora::where('id', $mora_id)->get();
        foreach ($moras as $mora){
            $total_interes = $mora->interes;
            break;
        }
        $total_nuevo = round($total_interes - $pago,2);
        if ($total_nuevo <= 0){
            $estado = 2;
        }elseif ($total_nuevo > 0){
            $estado = 1;
        }
        DB::table('moras')->where('id', $mora_id)
            ->update(['interes'=>$total_nuevo,'estado'=>$estado,'revision'=>date('Y-m-d')]);
        self::Abono($cuenta_id, $descripcion, $pago, $recibo, $total_interes);
    }

    public static function PostearCuota($id, $pago, $cuentaid, $descripcion, $recibo){
        $pagos = PagosCuenta::where('id', $id)->get();
        foreach ($pagos as $p){
            $total_cuota = $p->cuota;
            break;
        }
        $total_nuevo = round($total_cuota - $pago, 2);
        if ($total_nuevo <= 0){
            $estado = 2;
        }elseif ($total_nuevo > 0){
            $estado = 1;
        }
        DB::table('pagos_cuentas')->where('id', $id)
            ->update(['cuota'=>$total_nuevo,'estado'=>$estado]);
        self::Abono($cuentaid,$descripcion,$pago, $recibo, $total_cuota);
    }

    public static function Abono($cuenta_id, $descripcion, $total_abonado, $referencia, $total_debe){
        $nuevo_abono = new Abonos();
        $nuevo_abono->fecha_posteo = date('Y-m-d');
        $nuevo_abono->descripcion = $descripcion;
        $nuevo_abono->total_pagar = $total_debe;
        $nuevo_abono->total_abonado = $total_abonado;
        $nuevo_abono->referencia = $referencia;
        $nuevo_abono->cuenta_id = $cuenta_id;
        $nuevo_abono->save();
    }

    public static function Cuenta($id, $total_mora, $total_cuotas, $tipo_cuenta, $salida_id){
        $cuentas = Cuenta::where('id', $id)->get();
        foreach ($cuentas as $cuenta){
            $saldo_actual = $cuenta->saldo_actual;
            $saldo_interes = $cuenta->total_intereses;
        }
        $nuevo_saldo_actual = round($saldo_actual - $total_cuotas, 2);
        $nuevo_saldo_interes = round($saldo_interes - $total_mora, 2);
        if ($nuevo_saldo_interes <= 0){
            $estado_mora = 1;
        }else{
            $estado_mora = 2;
        }
        if ($nuevo_saldo_actual + $nuevo_saldo_interes <= 0){
            $estado_cuenta = 2;
            if ($tipo_cuenta == 2){
                PostearCuentas::TipoCuenta2($salida_id);
            }
        }else{
            $estado_cuenta = 1;
        }
        DB::table('cuentas')->where('id', $id)
            ->update(['saldo_actual'=>$nuevo_saldo_actual,'estado_interes'=>$estado_mora,'total_intereses'=>$nuevo_saldo_interes,'estado_cuenta'=>$estado_cuenta,
                'saldo_con_interes'=>$nuevo_saldo_interes + $nuevo_saldo_actual]);
    }
}

<?php


namespace SurtidoraLainez\Http\Controllers;


use Illuminate\Support\Facades\DB;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\Mora;

class FuncionesModificarCuentas
{
    public static function CambiarPorcentaje($cod, $porcentaje){
        $moras = Mora::join('cuentas','cuentas.id','=','moras.cuenta_id')
            ->join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->select('moras.dias_mora','pagos_cuentas.cuota','moras.id','cuentas.id as cuenta','cuentas.total_intereses','cuentas.saldo_actual')
            ->where('cuentas.cod_cuenta', $cod)->where('moras.estado',1)->get();
        $gran_total = 0;
        $cuenta_id = 0;
        $total_viejo = 0;
        $saldo_actual = 0;
        $porcentaje = $porcentaje/100;
        foreach ($moras as $mora){
            $cuenta_id = $mora->cuenta;
            $dias= $mora->dias_mora;
            $total_pago = $mora->cuota;
            $total_viejo = $mora->total_intereses;
            $total_pago = ((($total_pago * $porcentaje)*$dias)/30);
            $total_pago = round($total_pago, 2);
            $saldo_actual = $mora->saldo_actual;
            DB::table('moras')->where('id', $mora->id)
                ->update(['interes'=>$total_pago, 'revision'=>date('Y-m-d')]);
            $gran_total = $gran_total + $total_pago;
        }

        DB::table('cuentas')->where('id', $cuenta_id)
            ->update(['total_intereses'=>$gran_total,'mora'=>$porcentaje]);

            $nuevo_estado = new EstadoCuenta();
            $nuevo_estado->cuenta_id = $cuenta_id;
            $nuevo_estado->fecha_posteo = date('Y-m-d');
            $nuevo_estado->debito = 0;
            $nuevo_estado->credito = $gran_total;
            $nuevo_estado->cod_posteo = 'supervisor';
            $nuevo_estado->descripcion = 'Se le cambio mora por parte del supervisor';
            $nuevo_estado->saldo = $saldo_actual + $gran_total;
            $nuevo_estado->save();
    }

    public static function EstadoCuentaTotal($cuenta, $total, $saldo, $des){
        $nuevo_estado = new EstadoCuenta();
        $nuevo_estado->cuenta_id = $cuenta;
        $nuevo_estado->fecha_posteo = date('Y-m-d');
        $nuevo_estado->debito = 0;
        $nuevo_estado->credito = $total;
        $nuevo_estado->cod_posteo = 'supervisor';
        $nuevo_estado->descripcion = $des;
        $nuevo_estado->saldo = $saldo + $total;
        $nuevo_estado->save();
    }
}

<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\Mora;

class ModificarCuentascontroller extends Controller
{
    public function mora_porcentaje(Request $request){
        FuncionesModificarCuentas::CambiarPorcentaje($request->input('cod'), $request->input('porcentaje'));

        return redirect('cuenta/'.$request->input('cod'))->with('aprobado', 'Se realizo el cambio de porcentaje de mora correctamente.');
    }

    public function mora_cambiar(Request $request){
        $saldo_actual = 0;
        $id_cuenta = 0;
        $contador = Mora::join('cuentas','cuentas.id','=','moras.cuenta_id')
            ->join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->where('cuentas.cod_cuenta', $request->input('cod'))->where('moras.estado',1)->count();
        if ($contador == 0){
            return redirect('cuenta/'.$request->input('cod'))->with('error', 'No hay moras pendientes ahorita');
        }
        $nuevo_total = $request->input('total') / $contador;
        $nuevo_total = round($nuevo_total, 2);
        $moras = Mora::join('cuentas','cuentas.id','=','moras.cuenta_id')
            ->join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->select('moras.dias_mora','pagos_cuentas.cuota','moras.id','cuentas.id as cuenta','cuentas.total_intereses','cuentas.saldo_actual')
            ->where('cuentas.cod_cuenta', $request->input('cod'))->where('moras.estado',1)->get();
        foreach($moras as $mora){
            DB::table('moras')->where('id', $mora->id)
                ->update(['interes'=>$nuevo_total, 'revision'=>date('Y-m-d')]);

            DB::table('pagos_cuentas')->where('id', $mora->pago)
                ->update(['dia_limite_pago'=>date('Y-m-d')]);
            $saldo_actual = $mora->saldo_actual;
            $id_cuenta = $mora->cuenta;
        }
        DB::table('cuentas')->where('cod_cuenta', $request->input('cod'))
            ->update(['total_intereses'=>$request->input('total')]);
        $descripcion = 'Se le modifico total mora por parte del supervisor';
        FuncionesModificarCuentas::EstadoCuentaTotal($id_cuenta, $request->input('total'), $saldo_actual, $descripcion);

        return redirect('cuenta/'.$request->input('cod'))->with('aprobado', 'Se realizo correctamente el cambio de total de mora.');
    }

    public function mora_cero(Request $request){
        $id_cuenta = 0;
        $saldo_actual=0;
        $moras = Mora::join('cuentas','cuentas.id','=','moras.cuenta_id')
            ->join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->select('moras.dias_mora','pagos_cuentas.cuota','moras.id','pagos_cuentas.id as pago','cuentas.total_intereses',
                'cuentas.saldo_actual','cuentas.id as cuenta')
            ->where('cuentas.cod_cuenta', $request->input('cod'))->where('moras.estado',1)->get();
        foreach($moras as $mora){
            DB::table('moras')->where('id', $mora->id)
                ->update(['interes'=> 0, 'revision'=>date('Y-m-d'),'estado'=>3,'dias_mora', 0]);
            DB::table('pagos_cuentas')->where('id', $mora->pago)
                ->update(['estado_mora'=> 1,'dia_limite_pago'=>date('Y-m-d')]);
            $id_cuenta = $mora->cuenta;
            $saldo_actual = $mora->saldo_actual;
        }
        DB::table('cuentas')->where('cod_cuenta', $request->input('cod'))
            ->update(['total_intereses'=>0,'estado_interes'=>1]);
        $descripcion = 'Se dejo la mora en cero';
        if ($id_cuenta == 0){
            return redirect('cuenta/'.$request->input('cod'))->with('error', 'No hay moras pendientes en esta cuenta');
        }
        FuncionesModificarCuentas::EstadoCuentaTotal($id_cuenta, 0, $saldo_actual, $descripcion);
        return redirect('cuenta/'.$request->input('cod'))->with('aprobado', 'Se realizo correctamente el cambio de total de mora. Mora de L.0');
    }
}

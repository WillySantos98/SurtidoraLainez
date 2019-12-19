<?php


namespace SurtidoraLainez\Http\Controllers\Funciones;


use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Description;
use SurtidoraLainez\Caja;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\CuerpoRecibo;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\infoRecibo;
use SurtidoraLainez\Mora;
use SurtidoraLainez\PagosCuenta;
use SurtidoraLainez\Recibo;
use SurtidoraLainez\Salida;

class PostearCuentas
{
    public static function CrearRecibo($num_recibo,$usuario_id,$cuenta_id, $saldo_normal,$saldo_intereses, $total_pagar,$sucursal_id, $referencia){

        $nuevo_recibo = new Recibo();
        $nuevo_recibo->cod_recibo = $referencia.$num_recibo;
        $nuevo_recibo->fecha = date('Y-m-d');
        $nuevo_recibo->usuario_id = $usuario_id;
        $nuevo_recibo->cuenta_id = $cuenta_id;
        $nuevo_recibo->total_pagar = round($total_pagar, 2);
        $nuevo_recibo->saldo_anterior = $saldo_normal + $saldo_intereses;
        $nuevo_recibo->saldo_actual = round(($saldo_normal + $saldo_intereses) - $total_pagar, 2);
        $nuevo_recibo->sucursal_id = $sucursal_id;
        $nuevo_recibo->saldo_normal = round($saldo_normal,2);
        $nuevo_recibo->saldo_interes = round($saldo_intereses,2);
        $nuevo_recibo->save();

        return $nuevo_recibo->id;
    }
    public static function RealizarCuerpoRecibo($recibo_id, $pagos, $recibo, $total, $cuenta_id){
        for ($i = 0; $i <  count($pagos); $i++){
            $total_nuevo = $total - $pagos[$i]['paga'];
            $nuevo_cuerpo = new CuerpoRecibo();
            $nuevo_cuerpo->recibo_id = $recibo_id;
            $nuevo_cuerpo->descripcion = $pagos[$i]['des'];
            $nuevo_cuerpo->paga = $pagos[$i]['paga'];
            $nuevo_cuerpo->debe = 0;
            $nuevo_cuerpo->save();
        }

    }

    public static function BuscarId($codigo){
        $cuenta = Cuenta::where('cod_cuenta', $codigo)->get();
        foreach ($cuenta as $c){
            $id = $c->id;
            break;
        }
        return $id;
    }

    public static function Rango($sucursal_id, $rango1, $rango2){
        $contador = Recibo::where('sucursal_id', $sucursal_id)->count();
        $contador = $contador + 1;
        if ($contador < 10){//10
            $cod = '0000000'.$contador;
        }elseif ($contador > 9 && $contador < 100){//100 y un 9
            $cod = '000000'.$contador;
        }elseif ($contador > 99 && $contador < 1000){//100 y dos 9
            $cod = '00000'.$contador;
        }elseif ($contador > 999 && $contador < 10000){//diezmil y tres 9
            $cod = '0000'.$contador;
        }elseif ($contador > 9999 && $contador < 100000){//cienmil y cuatro 9
            $cod = '000'.$contador;
        }elseif ($contador > 99999 && $contador < 1000000){//millon y cinco 9
            $cod = '00'.$contador;
        }elseif ($contador > 999999 && $contador < 10000000){//10 millones y seis 9
            $cod = '0'.$contador;
        }elseif ($contador > 9999999 && $contador < 100000000){
            $cod = $contador;
        }//100 millones y siete 6


        return $cod;
    }

    public static function AntesCuerpoRecibo($idsMoras, $idsCuotas,$pagaraMoras,$pagaraCuotas, $morasDescripcion, $cuotasDescripcion, $recibo_id, $total,$cuenta,
                                             $num_recibo, $cuenta_id, $saldo_con_interes, $referencia_recivbo, $tipo_cuenta, $salida_id){
        $bandera = true;
        $i = 0;
        $e = -1;
        $pagos = [];
        $total_moras = 0;
        $total_cuotas = 0;
        $recibo = $referencia_recivbo.$num_recibo;
        while ($bandera == true){
            if ($i < count($idsMoras)){
                $e = $e +1;
                $pagos[$e]['id'] = $idsMoras[$i];
                $pagos[$e]['des'] = $morasDescripcion[$i];
                $pagos[$e]['paga'] = $pagaraMoras[$i];
                PostearPagos::PostearMora($idsMoras[$i], $pagaraMoras[$i], $cuenta_id, $morasDescripcion[$i], $recibo);
                $total_moras = round($total_moras + $pagaraMoras[$i], 2);
                $bandera =  true;
            }else{
                $bandera =  false;
            }
            if ($i < count($idsCuotas)){
                $pagos[$e + 1]['id'] = $idsCuotas[$i];
                $pagos[$e + 1]['des'] = $cuotasDescripcion[$i];
                $pagos[$e + 1]['paga'] = $pagaraCuotas[$i];
                PostearPagos::PostearCuota($idsCuotas[$i],$pagaraCuotas[$i], $cuenta_id,$cuotasDescripcion[$i], $recibo);
                $total_cuotas = round($total_cuotas + $pagaraCuotas[$i],2);
                $bandera=true;
            }else{
                $bandera = false;
            }
            $i +=1;
            $e +=1;
        }

        PostearPagos::Cuenta($cuenta_id, $total_moras, $total_cuotas, $tipo_cuenta, $salida_id);
        self::RealizarCuerpoRecibo($recibo_id,$pagos, $num_recibo, $total, $cuenta_id);
        self::PostearEstadoCuenta($cuenta_id,'Se posteo pago',$recibo,$saldo_con_interes, $total);
    }

    private static function PostearEstadoCuenta($cuenta_id, $descripcion, $cod_posteo, $saldo_actual, $total){
        $nuevoEstado = new EstadoCuenta();
        $nuevoEstado->cuenta_id = $cuenta_id;
        $nuevoEstado->fecha_posteo = date('Y-m-d');
        $nuevoEstado->descripcion = $descripcion;
        $nuevoEstado->cod_posteo = $cod_posteo;
        $nuevoEstado->debito = $total;
        $nuevoEstado->credito = 0;
        $nuevoEstado->saldo = round($saldo_actual - $total, 2);
        $nuevoEstado->save();
    }

    public static function IngresoCaja($recibo, $total,$sucursal){
        $nuevo_ingresoCaja = new Caja();
        $nuevo_ingresoCaja->recibo_id = $recibo;
        $nuevo_ingresoCaja->total = round($total,2);
        $nuevo_ingresoCaja->fecha = date('Y-m-d');
        $nuevo_ingresoCaja->sucursal_id = $sucursal;
        $nuevo_ingresoCaja->save();
    }

    public static function ReferenciaRecibo($sucursal){
        $referencias = infoRecibo::where('sucursal_id', $sucursal)->where('estado',1)->get();
        foreach ($referencias as $referencia){
            $r1= $referencia->dato1;
            $r2= $referencia->dato2;
            $r3= $referencia->dato3;
        }
        return $r1.'-'.$r2.'-'.$r3.'-';
    }

    public static function TipoCuenta2($salida_id){
        $salidas = Salida::where('id', $salida_id)->get();
        foreach ($salidas as $salida){
            $moto = $salida->moto_id;
            break;
        }
        DB::table('placas')->where('id_moto', $moto)
            ->update(['estado_pago_matricula'=>2]);
    }
}

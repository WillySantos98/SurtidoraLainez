<?php


namespace SurtidoraLainez\Http\Controllers\Funciones;


use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\PagosCuenta;

class AsignarCuenta
{
    public static function CrearPagos($cuenta_id, $dias_pago, $intervalo, $prima, $saldo_incial, $fecha, $plazo){
        $errores = [];
        $errores[0] = $cuenta_id;
        try{
            self::IngresoPrima($cuenta_id, $prima, $fecha, $intervalo, $saldo_incial);
            $nuevo_plazo = $intervalo * $plazo;
            $contador = 1;
            for ($i = 0; $i < $nuevo_plazo; $i++){
                if ($intervalo == 0){
                    break;
                }
                if ($i == 0){
                    $cuota = round(($saldo_incial - $prima)/$nuevo_plazo,2);
                }
                $fecha_pago = self::FechaPago($intervalo, $fecha, $dias_pago, $contador);
                $fecha_limite = self::FechaLimite($fecha_pago);

                $nuevo_pago = new PagosCuenta();
                $nuevo_pago->cuenta_id = $cuenta_id;
                $nuevo_pago->dia_pago = $fecha_pago;
                $nuevo_pago->dia_limite_pago = $fecha_limite;
                $nuevo_pago->cuota = $cuota;
                $nuevo_pago->estado = 1;
                $nuevo_pago->estado_mora = 1;
                $nuevo_pago->descripcion = 'Pago'.($i + 1);
                $nuevo_pago->cuota_inicial = $cuota;
                $nuevo_pago->save();
                $fecha = $fecha_pago;
                $contador++;
                if ($contador == 3){
                    $contador = 1;
                }
            }

        }catch (Exception $exception){
            $errores = $exception;
        }
    }

    private static function FechaPago($intervalo, $fecha, $dias_pagos, $i){
        $fecha = strtotime($fecha);
        $fecha = date('Y-m-'.$dias_pagos, $fecha);
        if ($intervalo == 1){
            $f = strtotime('+1 month', strtotime($fecha));
            $f = date('Y-m-d', $f);
        }
        if ($intervalo == 2){
            if ($i == 1){
                $f = strtotime('+1 month', strtotime($fecha));
            }elseif ($i == 2){
                $f = strtotime('+15 day', strtotime($fecha));
            }
            $f = date('Y-m-d', $f);
        }

        return $f;
    }

    private static function FechaLimite($fecha){
        $nuevaFecha = strtotime('+5 day', strtotime($fecha));
        $nuevaFecha = date('Y-m-d', $nuevaFecha);
        return $nuevaFecha;
    }
    private static function IngresoPrima($cuenta_id, $prima, $fecha, $intervalo, $saldo_inicial){
        $errores = [];
        if ($intervalo == 0){
            $des = 'Pago Unico';
            $cuota = $saldo_inicial;
        }elseif($intervalo > 0 && $prima > 0){
            $des = 'Prima';
            $cuota = $prima;
        }
        try{
            $dia_limite = strtotime('+5 day', strtotime($fecha));
            $dia_limite = date('Y-m-d', $dia_limite);
            $nuevo_pago = new PagosCuenta();
            $nuevo_pago->cuenta_id = $cuenta_id;
            $nuevo_pago->dia_pago = $fecha;
            $nuevo_pago->dia_limite_pago = $dia_limite;
            $nuevo_pago->cuota = $cuota;
            $nuevo_pago->estado = 1;
            $nuevo_pago->estado_mora = 1;
            $nuevo_pago->descripcion = $des;
            $nuevo_pago->cuota_inicial = $cuota;
            $nuevo_pago->save();
        }catch (\Exception $exception){
            $errores = [$exception];
        }
    }

    public static function EstadoSalida($salida){
        DB::table('salidas')->where('id', $salida)
            ->update(['cuenta'=>1]);
    }

    public static function Estadocuenta($cuenta, $saldo, $codigo){
        $nuevo_estado = new EstadoCuenta();
        $nuevo_estado->cuenta_id = $cuenta;
        $nuevo_estado->fecha_posteo = date('Y-m-d');
        $nuevo_estado->descripcion = "Inicio de cuenta";
        $nuevo_estado->cod_posteo = $codigo;
        $nuevo_estado->debito = 0;
        $nuevo_estado->credito = $saldo;
        $nuevo_estado->saldo = $saldo;
        $nuevo_estado->save();
    }

    public static function EstadoCuentaCredito($cuenta, $saldo_cuenta, $cod_posteo, $descripcion, $credito){
        $nuevo_estado = new EstadoCuenta();
        $nuevo_estado->cuenta_id = $cuenta;
        $nuevo_estado->fecha_posteo = date('Y-m-d');
        $nuevo_estado->descripcion = $descripcion;
        $nuevo_estado->cod_posteo = $cod_posteo;
        $nuevo_estado->debito = 0;
        $nuevo_estado->credito = $credito;
        $nuevo_estado->saldo = round($saldo_cuenta - $credito,2);
        $nuevo_estado->save();
    }
}

<?php


namespace SurtidoraLainez\Http\Controllers;


use SurtidoraLainez\Cuenta;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\PagosCuenta;

class FuncionesCuenta
{
    public static function Descripcion($tipo_cuenta){
        if ($tipo_cuenta == 2){
            return 'Cuenta de Contado';
        }elseif ($tipo_cuenta == 1){
            return 'Cuenta al Credito';
        }
    }

    public static function DefinirCiclo($fecha_venta){
        $fecha_entera = strtotime($fecha_venta);
        $dia = date("d", $fecha_entera);
        if ($dia < 16){
            return 1;
        }elseif ($dia > 15){
            return 2;
        }
    }
    public static function Pagos($intervalo, $plazo){
        if ($intervalo == 1){
            return 1 * $plazo;
        }elseif ($intervalo == 2){
            return 2 * $plazo;
        }
    }

    public static function CrearCodigo(){
        $numero1 = rand(0, 9);
        $numero2 = rand(0,9);
        $cuentas = Cuenta::count();
        $cuerpocodigo = null;
        if (strlen($cuentas) == 1){
            $cuerpocodigo = '000'.$cuentas;
        }elseif (strlen($cuentas) == 2){
            $cuerpocodigo = '00'.$cuentas;
        }elseif (strlen($cuentas) == 3){
            $cuerpocodigo = '0'.$cuentas;
        }elseif (strlen($cuentas) > 3){
            $cuerpocodigo = $cuentas;
        }
        $codigo = $numero1.$numero1.$cuerpocodigo.$numero2.$numero2.rand(0,9);
        return $codigo;
    }

    public static function FechaVencimiento($req){
        $plazo = $req->input('Plazo');
        if ($req->input('SelectVenta') == 1){
            $fecha = $req->input('PrimerPago');
            $fecha_vencimiento = strtotime('+'.$plazo.' month', strtotime($fecha));
            $fecha_vencimiento = date('Y-m-d', $fecha_vencimiento);
        }elseif ($req->input('SelectVenta') == 2){
            $fecha = $req->input('Fecha_Venta');
            $fecha_vencimiento = strtotime('+'.$req->input('DiasGracia').' day', strtotime($fecha));
//            $fecha_vencimiento = strtotime('+'.$req->input('DiasGracia').' day', strtotime($fecha_vencimiento));
            $fecha_vencimiento = date('Y-m-d', $fecha_vencimiento);
        }
        return $fecha_vencimiento;

    }

    public static function PagosCuenta($id, $req, $pagos){
        $dia_abono = $req->input('Fecha_Venta');
        $dias_gracia = $req->input('DiasGracia');
        $dia_limite = strtotime('+'.$dias_gracia.' day', strtotime($dia_abono));
        $nuevos_pagos = new PagosCuenta();
        if ($req->input('SelectVenta') == 1){
            $cuota = $req->input('Prima');
            $des = 'Prima';
        }elseif ($req->input('SelectVenta') == 2){
            $cuota = $req->input('TotalCuenta');
            $des = 'Pago Unico';
        }

        $nuevos_pagos->cuenta_id = $id;
        $nuevos_pagos->dia_pago = $dia_abono;
        $nuevos_pagos->dia_limite_pago = date('Y-m-d', $dia_limite);
        $nuevos_pagos->cuota = $cuota;
        $nuevos_pagos->estado = 1;
        $nuevos_pagos->estado_mora = 1;
        $nuevos_pagos->descripcion = $des;
        $nuevos_pagos->save();
        if ($pagos > 0){
            $dia_abono = $req->input('PrimerPago');
            $dia_limite = strtotime('+'.$dias_gracia.' day', strtotime($dia_abono));

            self::Fechas($req, $dia_abono, $dia_limite, $dias_gracia, $id, $pagos);
        }
    }

    public static function Fechas($req,$dia_abono, $dia_limite, $dias_gracia, $id, $pagos){
        $bandera = 0;
        $dias_de_abono = $req->input('DiasPago');
        for ($i = 0 ; $i < $pagos; $i++){
            $nuevos_pagos = new PagosCuenta();
            $bandera += 1;
            $nuevos_pagos->cuenta_id = $id;
            $nuevos_pagos->dia_pago = $dia_abono;
            $nuevos_pagos->dia_limite_pago = date('Y-m-d', $dia_limite);
            $nuevos_pagos->cuota = $req->input('Cuota');
            $nuevos_pagos->estado = 1;
            $nuevos_pagos->estado_mora = 1;
            $nuevos_pagos->descripcion = 'Pago'.($i + 1);
            $nuevos_pagos->save();

            if ($req->input('Intervalo') == 1){
                $dia_abono = strtotime('+1 month', strtotime($dia_abono));
                $dia_abono = date('Y-m-d', $dia_abono);
                $dia_limite = strtotime('+'.$dias_gracia.' day', strtotime($dia_abono));
            }elseif ($req->input('Intervalo') == 2){
                if ($bandera == 1){
                    $dia_abono = strtotime('+1 month', strtotime($dia_abono));
                    $dia_abono = date('Y-m-'.$dias_de_abono, $dia_abono);
                    $dia_limite = strtotime('+'.$dias_gracia.' day', strtotime($dia_abono));
                }elseif ($bandera == 2){
                    $dia_abono = strtotime('+15 day'. strftime($dia_abono));
                    $dia_abono = date('Y-m-d', $dia_abono);
                    $dia_limite = strtotime('+'.$dias_gracia.' day', strtotime($dia_abono));
                    $bandera = 0;
                }
            }

        }
    }

    public static function EstadoCuenta($req, $id, $cod){
        $nuevo_estado_cuenta = new EstadoCuenta();
        $nuevo_estado_cuenta->cuenta_id = $id;
        $nuevo_estado_cuenta->fecha_posteo = $req->input('Fecha_Venta');
        $nuevo_estado_cuenta->descripcion = 'Inicio de cuenta';
        $nuevo_estado_cuenta->cod_posteo = $cod;
        $nuevo_estado_cuenta->debito = 0;
        $nuevo_estado_cuenta->credito = $req->input('TotalCuenta');
        $nuevo_estado_cuenta->saldo = $req->input('TotalCuenta');
        $nuevo_estado_cuenta->save();
    }

    public static function ContadorEstados($codigo, $id){
        $contador = EstadoCuenta::where('cuenta_id', $id)->count();

    }
}

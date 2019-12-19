<?php


namespace SurtidoraLainez\Http\Controllers\Funciones;


use SurtidoraLainez\Cuenta;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\Http\Controllers\FuncionesCuenta;
use SurtidoraLainez\PagosCuenta;
use SurtidoraLainez\Salida;

class PlacasCuentas
{
    public static function ObterneCodigoSalidaId($moto_id){
        $salidas = Salida::where('moto_id', $moto_id)->get();
        foreach ($salidas as $salida){
            $salida_id = $salida->id;
            break;
        }

        return $salida_id;
    }
    public static function Cuenta($salida_id, $total, $placa){
        $nueva_cuenta = new Cuenta();
        $nueva_cuenta->salida_id = $salida_id;
        $nueva_cuenta->plazo = 0;
        $nueva_cuenta->intervalo_pago = 0;
        $nueva_cuenta->dias_gracia = 0;
        $nueva_cuenta->cod_cuenta = FuncionesCuenta::CrearCodigo();
        $nueva_cuenta->saldo_financiar = $total;
        $nueva_cuenta->total_inicial_cuenta = $total;
        $nueva_cuenta->saldo_actual = $total;
        $nueva_cuenta->fecha_vencimiento = date('Y-m-d');
        $nueva_cuenta->prima = 0;
        $nueva_cuenta->total_pagos = 0;
        $nueva_cuenta->estado_interes = 1;
        $nueva_cuenta->total_intereses = 0;
        $nueva_cuenta->estado_cuenta = 1;
        $nueva_cuenta->descripcion = "Pago Matricula".$placa;
        $nueva_cuenta->mora = 0.05;
        $nueva_cuenta->saldo_con_interes = $total;
        $nueva_cuenta->tipo_cuenta = 2;
        $nueva_cuenta->save();

        $nuevo_pago = new PagosCuenta();
        $nuevo_pago->cuenta_id = $nueva_cuenta->id;
        $nuevo_pago->dia_pago = date('Y-m-d');
        $nuevo_pago->dia_limite_pago = date('Y-m-d');
        $nuevo_pago->cuota = $total;
        $nuevo_pago->estado_mora = 1;
        $nuevo_pago->estado = 1;
        $nuevo_pago->descripcion ="Pago matricula";
        $nuevo_pago->cuota_inicial = $total;
        $nuevo_pago->save();

        $nuevo_estado = new EstadoCuenta();
        $nuevo_estado->cuenta_id = $nueva_cuenta->id;
        $nuevo_estado->fecha_posteo = date('Y-m-d');
        $nuevo_estado->descripcion = "Pago de matricula placa # ".$placa;
        $nuevo_estado->cod_posteo = $nueva_cuenta->cod_cuenta;
        $nuevo_estado->debito = 0;
        $nuevo_estado->credito = $total;
        $nuevo_estado->saldo= $total;
        $nuevo_estado->save();

    }

}

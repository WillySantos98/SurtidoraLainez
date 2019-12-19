<?php


namespace SurtidoraLainez\Console\Commands;


use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use SurtidoraLainez\BitacoraTarea;
use SurtidoraLainez\Console\Commands\Moras\NuevaMora;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\Http\Controllers\PruebasController;
use SurtidoraLainez\Mora;
use SurtidoraLainez\PagosCuenta;

class CuentasCommands
{
    public static function RevisarCuentas(){
        $cuetas = Cuenta::where('tipo_cuenta', 1)->where('estado_cuenta',1)->get();
        $bandera_NuevaMora = false;
        $bandera_Suma =  false;
        $nombre_archivo = date('Y-m-j')."-Nueva Mora-".time().".txt";
        $nombre_archivo2 = date('Y-m-j')."-Sumar Mora-".time().".txt";
        $txt_nuevamora = fopen(public_path().'/TXT/'.$nombre_archivo, "w");
        $txt_sumarmora = fopen(public_path().'/TXT/'.$nombre_archivo2, "w");
        fwrite($txt_nuevamora, "##### Fecha ".date('Y-m-d'). PHP_EOL);
        fwrite($txt_sumarmora, "##### Fecha ".date('Y-m-d'). PHP_EOL);

        foreach ($cuetas as $cueta){
            $pagos = PagosCuenta::where('cuenta_id', $cueta->id)->where('dia_limite_pago', '<', date('Y-m-d'))
                ->where('estado', 1)->get();
            if (count($pagos) > 0){
                foreach ($pagos as $pago):
                    if ($pago->estado_mora == 1):
                        fwrite($txt_nuevamora, "#####".$cueta->cod_cuenta.PHP_EOL);
                        NuevaMora::CrearNuevaMora($cueta->id, $pago->id, $pago->dia_limite_pago, $pago->cuota, $cueta->mora,
                            $cueta->cod_cuenta, $txt_nuevamora, $pago->descripcion);
                        $bandera_NuevaMora = true;
                    elseif ($pago->estado_mora == 2):
                        self::SumarMora($cueta->mora, $pago->id, $pago->cuota, $cueta->id, $cueta->cod_cuenta, $cueta->saldo_con_interes, $txt_sumarmora);
                        $bandera_Suma = true;
                        $bandera_NuevaMora = true;
                    endif;
                endforeach;
            }else{
                $bandera_NuevaMora =  false;
                $bandera_Suma = false;
            }

            if ($bandera_NuevaMora == true){
                self::SM($cueta->id, $txt_nuevamora, $cueta->cod_cuenta, $cueta->saldo_con_interes, $cueta->total_intereses);
            }

        }
        $nueva_bitacora = new BitacoraTarea();
        $nueva_bitacora->descripcion = $nombre_archivo;
        $nueva_bitacora->cantidad = 1;
        $nueva_bitacora->save();

        fclose($txt_nuevamora);
    }

    public static function SM($cuenta_id, $txt, $cuenta, $saldo_ant, $interes_anterior){
        $moras = Mora::where('cuenta_id', $cuenta_id)->get();
        $total = 0;
        foreach ($moras as $m){
            $total = $total + $m->interes;
        }
        $total = round($total, 2);
        Cuenta::where('id', $cuenta_id)->update(['estado_interes'=>2,'total_intereses'=>round($total , 2),'saldo_con_interes'=>round($saldo_ant + $total, 2)]);
        $descipcion = "Actualizo el total de mora en la cuenta #".$cuenta." a un saldo de L.".$total." a un saldo anterior de L.".$saldo_ant;
        fwrite($txt, $descipcion.PHP_EOL);
    }

    public static function SumarMora($porcentaje_mora, $pago_id, $cuota, $cuenta_id, $cod_cuenta, $saldo_con_interes, $txt){
        $moras = Mora::join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
        ->where('pago_id', $pago_id)->get();
        $dias = 0;
        $revision = date('Y-m-d');
        $mora_vieja = 0;
        $descripcion = 0;
        $cod_mora = 0;
        foreach ($moras as $mo){
            $dias = $mo->dias_mora;//3
            $revision = $mo->revision;
            $mora_vieja = $mo->interes;//35
            $descripcion = $mo->descripcion;
            $cod_mora = $mo->codigo;
            break;
        }
        $bandera = false;
        if ($revision < date('Y-m-d')){
            try{
                $dias = $dias + 1;//4
                $total_mora = (($cuota * $porcentaje_mora) * 1)/30;//7000 * 0.05 = 350 * 1 = 1400 / 30 = 11.66
                $total_mora = round($total_mora, 2);
                $nueva_mora = $total_mora + $mora_vieja; // 11.66 + 35 = 46.66
                $nueva_mora = round($nueva_mora, 2);
                Mora::where('pago_id', $pago_id)
                    ->update(['dias_mora'=>$dias, 'interes'=>$nueva_mora,'revision'=>date('Y-m-d')]);
                $estados = EstadoCuenta::where('cuenta_id', $cuenta_id)->orderby('id','DESC')->take(1)->get();
                foreach ($estados as $estado){
                    $saldo_posteo = $estado->saldo;
                    break;
                }
                $nuevo_post = new EstadoCuenta();
                $nuevo_post->cuenta_id = $cuenta_id;
                $nuevo_post->fecha_posteo = date('Y-m-d');
                $nuevo_post->descripcion = 'Suma de Intereses por dia retrasado del pago '.$descripcion;
                $nuevo_post->cod_posteo = $cod_mora;
                $nuevo_post->debito = 0;
                $nuevo_post->credito = round($total_mora,2);
                $nuevo_post->saldo = round($total_mora + $saldo_posteo,2);
                $nuevo_post->save();
                $bandera = true;
                $cuenas = Cuenta::where('id', $cuenta_id)->get();

                $descripcion2 = "La cuenta #".$cod_cuenta." con pago id #".$pago_id." - ".$descripcion.". se suma L.".$total_mora." de interes al saldo de L.".$mora_vieja;
                fwrite($txt, $descripcion2.PHP_EOL);
            }catch (Exception $e){
                $bandera = false;
            }
        }

    }


}

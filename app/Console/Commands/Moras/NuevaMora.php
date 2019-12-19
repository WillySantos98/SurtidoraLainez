<?php


namespace SurtidoraLainez\Console\Commands\Moras;


use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use SurtidoraLainez\Console\Commands\CuentasCommands;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\Mora;

class NuevaMora
{
    public static function CrearNuevaMora($cuenta_id, $pago_id, $fecha_limite, $cuota, $mora, $cod_cuenta, $archivoNuevo, $nombre_pago){
        $errores = false;
        try{
            //se inicializa la variable para guardar la mora
            $nueva_mora = new Mora();
            //se cuenta cuentos pagos en mora tiene esta cuenta para sumarsela al codigo de la mora
            $contador = Mora::where('cuenta_id', $cuenta_id)->count();
            //se calculan los dias en que inicio la mora
            $dias = self::DiasDiferencia($fecha_limite);
            $fecha_inicio = strtotime('+ 1 day', strtotime($fecha_limite));
            $fecha_inicio = date('Y-m-d', $fecha_inicio);
            //aca se calcula el total de la mora
            $total_mora = (($cuota * $mora) * $dias)/30;
            $total_mora = round($total_mora, 2);

            $nueva_mora->cuenta_id = $cuenta_id;
            $nueva_mora->pago_id = $pago_id;
            $nueva_mora->dias_mora = $dias;
            $nueva_mora->interes = $total_mora;
            $nueva_mora->estado = 1;
            $nueva_mora->fecha_inicio = $fecha_inicio;
            $nueva_mora->revision = date('Y-m-d');
            $nueva_mora->codigo = $cod_cuenta.'-'.$contador;
            $nueva_mora->save();
            $errores = false;
        }catch (Exception $exception){
            $errores = true;
        }
        if ($errores == false){
            $descripcion = "-Se creo Mora correctamente en la cuenta #".$cod_cuenta.", con codigo de pago #".$pago_id.", con ";
            $descripcion2 = $dias." dias de retraso, un total de L.".$total_mora.", con referencia de mora . La cuota es de L.".$cuota;
            fwrite($archivoNuevo, $descripcion.$descripcion2.PHP_EOL);
            DB::table('pagos_cuentas')->where('id', $pago_id)
                ->update(['estado_mora'=>2]);
            $descripcion3 = "El estado de mora del pago #".$pago_id." cambio a 2";
            fwrite($archivoNuevo, $descripcion3.PHP_EOL);

            $estados = EstadoCuenta::where('cuenta_id', $cuenta_id)->orderby('id','DESC')->take(1)->get();
            foreach ($estados as $estado){
                $saldo_posteo = $estado->saldo;
                break;
            }
            $nuevo_estado = new EstadoCuenta();
            $nuevo_estado->cuenta_id = $cuenta_id;
            $nuevo_estado->fecha_posteo = date('Y-m-d');
            $nuevo_estado->descripcion = "Se inicio mora en el pago: ".$nombre_pago;
            $nuevo_estado->cod_posteo = $cod_cuenta.'-'.$contador;
            $nuevo_estado->debito = 0;
            $nuevo_estado->credito = $total_mora;
            $nuevo_estado->saldo = round($saldo_posteo + $total_mora,2);
            $nuevo_estado->save();
        }elseif ($errores == true){
            $descripcion = "-eror al crear mora en la cuenta #".$cod_cuenta.", con codigo de pago #".$pago_id.", con ".$dias." de retraso, un total de L.".$total_mora.", con referencia de mora";
            fwrite($archivoNuevo, $descripcion.PHP_EOL);
        }

    }

    public static function DiasDiferencia($fecha){
        $fecha = strtotime('+1 day',strtotime($fecha));
        $ano1 = date('Y', $fecha);
        $mes1 = date('m', $fecha);
        $dia1 = date('d', $fecha);

        $ano2 = date('Y');
        $mes2 = date('m');
        $dia2 = date('d');

        $fecha1= mktime(0,0,0,$mes1,$dia1,$ano1);
        $fecha2 = mktime(0,0,0,$mes2, $dia2, $ano2);

        $segundosDif = $fecha2 - $fecha1;
        $dias_diferencia = $segundosDif/(60*60*24);

        $dias_diferencia =  $dias_diferencia + 1;
        return $dias_diferencia;
    }

}

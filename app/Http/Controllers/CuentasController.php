<?php

namespace SurtidoraLainez\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;
use SurtidoraLainez\Abonos;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\CuerpoRecibo;
use SurtidoraLainez\EstadoCuenta;
use SurtidoraLainez\Http\Controllers\Funciones\PostearCuentas;
use SurtidoraLainez\infoRecibo;
use SurtidoraLainez\Mora;
use SurtidoraLainez\PagosCuenta;
use SurtidoraLainez\Recibo;
use SurtidoraLainez\Salida;

class CuentasController extends Controller
{
    public function cuentas(){

        return view('Cuentas.index');
    }

    public function index(){
        $cuentas = Cuenta::join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->get();
        return view('Cuentas.cuentas', compact('cuentas'));
    }

    public function cuenta($cod){
        $cuentas = Cuenta::join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->where('cuentas.cod_cuenta', $cod)
            ->get();
        $pagos = Cuenta::join('pagos_cuentas','pagos_cuentas.cuenta_id','=','cuentas.id')
            ->where('cuentas.cod_cuenta', $cod)->get();
        $recibos = Recibo::join('cuentas','cuentas.id','=','recibos.cuenta_id')
            ->select('recibos.id','recibos.cod_recibo','recibos.fecha')->where('cuentas.cod_cuenta', $cod)->get();
        return view('Cuentas.Cuenta.index', compact('cod', 'cuentas','pagos','recibos'));
    }
    public function historial_pago($cod){
        $historial = EstadoCuenta::join('cuentas','cuentas.id','=','estado_cuentas.cuenta_id')
            ->select('estado_cuentas.fecha_posteo','estado_cuentas.descripcion','estado_cuentas.cod_posteo',
                'estado_cuentas.debito','estado_cuentas.credito','estado_cuentas.saldo')
            ->where('cuentas.cod_cuenta', $cod)
            ->get();
        return $historial;
    }

    public function proximos_pagos($cod){
        $pagos = Cuenta::join('pagos_cuentas','pagos_cuentas.cuenta_id','=','cuentas.id')
            ->where('cuentas.cod_cuenta', $cod)
            ->where('pagos_cuentas.estado', 1)
            ->get();
        return $pagos;
    }

    public function pruebas(){

        $moras = Mora::join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->where('pago_id', 143)->get();

        return $moras;
    }

    public function moras($codigo){
        $moras = Mora::join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->join('cuentas','cuentas.id','=','moras.cuenta_id')
            ->select('cuentas.cod_cuenta','moras.fecha_inicio','pagos_cuentas.descripcion','moras.dias_mora',
                'moras.interes','moras.revision', 'pagos_cuentas.cuota','moras.estado')
            ->where('cuentas.cod_cuenta', $codigo)->get();

        return $moras;
    }

    public function calendario(){

        return view('Cuentas.CalendarioAbonos.index');
    }

    public function posteo(){
        $cuentas = Cuenta::join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->get();
        return view('Cuentas.PosteoCuentas.index',compact('cuentas'));
    }

    public function posteo_cuenta($cod){
        $info = Cuenta::join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->where('cuentas.cod_cuenta', $cod)->get();

        $pagos = PagosCuenta::join('cuentas','cuentas.id','pagos_cuentas.cuenta_id')
            ->select('pagos_cuentas.dia_pago','pagos_cuentas.dia_limite_pago','pagos_cuentas.descripcion','pagos_cuentas.cuota')
            ->where('pagos_cuentas.estado', 1)->where('cuentas.cod_cuenta', $cod)->where('pagos_cuentas.dia_pago','<', date('Y-m-d'))
            ->get();
        $moras = Mora::join('pagos_cuentas','pagos_cuentas.id','=','moras.pago_id')
            ->join('cuentas','cuentas.id','=','moras.cuenta_id')
            ->select('moras.dias_mora','moras.interes','pagos_cuentas.descripcion','moras.fecha_inicio','moras.codigo')
            ->where('cuentas.cod_cuenta', $cod)->where('moras.estado', 1)->where('pagos_cuentas.dia_limite_pago','<', date('Y-m-d'))
            ->get();
        return view('Cuentas.PosteoCuentas.cuentas', compact('cod','info','pagos','moras'));
    }

    public function info_posteo($codigo, $pago){
        $pagos = Cuenta::join('pagos_cuentas','pagos_cuentas.cuenta_id','=','cuentas.id')
            ->where('cuentas.cod_cuenta', $codigo)
            ->where('pagos_cuentas.estado', 1)
            ->get();
        $moras = Cuenta::join('moras','moras.cuenta_id','=','cuentas.id')
            ->where('cuentas.cod_cuenta', $codigo)
            ->where('moras.estado', 1)
            ->get();
        $total = $pago;
        $total_nuevo =0;
        $array = [];
        $array_pagos = [];
        $array_moras = [];
        $i = 0;
        $bandera = true;
        foreach ($pagos as $pa){
            $array_pagos[$i]['id'] = $pa->id;
            $array_pagos[$i]['debe'] = $pa->cuota;
            $array_pagos[$i]['descripcion'] = $pa->descripcion;
            $i += 1;
        }
        $i = 0;
        foreach ($moras as $mora){
            $array_moras[$i]['id'] = $mora->id;
            $array_moras[$i]['intereses'] = $mora->interes;
            $array_moras[$i]['descripcion'] = $mora->codigo;
            $i += 1;
        }
        $i = 0;

        while ($bandera == true){
            if ($total == 0){
                break;
            }else{
                if (count($array_moras) > 0){
                    if ($total == 0){
                        $bandera = false;
                    }elseif($i < count($array_moras)){
                        $total_nuevo = $array_moras[$i]['intereses'];
                        if ($total_nuevo < $total){
                            $array['moras'][$i]['id'] = $array_moras[$i]['id'];
                            $array['moras'][$i]['debe'] = $array_moras[$i]['intereses'];
                            $array['moras'][$i]['pagara'] = $array_moras[$i]['intereses'];
                            $array['moras'][$i]['actual'] = 0;
                            $array['moras'][$i]['descripcion'] = $array_moras[$i]['descripcion'];
                            $array['moras'][$i]['hay'] = round($total - $total_nuevo, 2);
                            $total = $total - $total_nuevo;
                        }elseif ($total_nuevo >= $total  && $total !=0){
                            $array['moras'][$i]['id'] = $array_moras[$i]['id'];
                            $array['moras'][$i]['debe'] = $total_nuevo;
                            $array['moras'][$i]['pagara'] = round($total, 2);
                            $array['moras'][$i]['actual'] = round($total_nuevo - $total, 2);
                            $array['moras'][$i]['descripcion'] = $array_moras[$i]['descripcion'];
                            $array['moras'][$i]['hay'] = 0;
                            $total = 0;
                        }
                        $bandera = true;
                    }else{
                        $bandera = false;
                    }
                }
                //
                $total = round($total, 2);
                $total_nuevo = $array_pagos[$i]['debe'];
                if ($total == 0){
                    $bandera = false;
                }else{
                    if ($total_nuevo < $total){
                        $array['cuota'][$i]['id'] = $array_pagos[$i]['id'];
                        $array['cuota'][$i]['debe'] = $total_nuevo;
                        $array['cuota'][$i]['pagara'] = $array_pagos[$i]['debe'];
                        $array['cuota'][$i]['actual'] = 0;
                        $array['cuota'][$i]['descripcion'] = $array_pagos[$i]['descripcion'];
                        $array['cuota'][$i]['hay'] = round($total - $total_nuevo, 2);
                        $total = $total - $total_nuevo;
                }elseif ($total_nuevo >= $total && $total !=0){
                        $array['cuota'][$i]['id'] = $array_pagos[$i]['id'];
                        $array['cuota'][$i]['debe'] = $total_nuevo;
                        $array['cuota'][$i]['pagara'] = round($total, 2);
                        $array['cuota'][$i]['actual'] = round($total_nuevo - $total, 2);
                        $array['cuota'][$i]['descripcion'] = $array_pagos[$i]['descripcion'];
                        $array['cuota'][$i]['hay'] = 0;
                        $total = 0;
                    }
                    $bandera = true;
                }
                $i +=1;
            }

        }
        return $array;

    }

    public function registrar_posteo(Request $request){
        $total_pagar = 0;
        if (($request->input('idCuotasPagara'))){
            $totales_cuotas = $request->input('idCuotasPagara');
            for($i = 0; $i < count($totales_cuotas); $i++){
                $total_pagar =$total_pagar + $totales_cuotas[$i];
            }
            $cuotas_id = $request->input('idCuotas');
            $cuotas_pagara = $request->input('idCuotasPagara');
            $cuotas_des = $request->input('idCuotasDescrion');
        }else{
            $cuotas_id = [];
            $cuotas_pagara = [];
            $cuotas_des = [];
        }

        if (($request->input('idMorasPagara'))){
            $totales_moras = $request->input('idMorasPagara');
            $moras_id = $request->input('idMoras');
            $moras_pagara = $request->input('idMorasPagara');
            $moras_des = $request->input('idMorasDescripcion');
            for($i = 0; $i < count($totales_moras); $i++){
                $total_pagar = $total_pagar + $totales_moras[$i];
            }
        }else{
            $moras_id = [];
            $moras_pagara = [];
            $moras_des = [];
        }

        $sucursal_id = Auth()->user()->sucursal_id;
        $usuario_id = Auth()->user()->id;
        $cuenta = Cuenta::where('cod_cuenta', $request->input('CodigoCuenta'))->get();
        $info = infoRecibo::where('sucursal_id', $sucursal_id)->where('estado', 1)->get();

        foreach ($info as $inf){
            $rango3 = $inf->dato4;
            $rango4 = $inf->dato8;
            $num_recibo = PostearCuentas::Rango($sucursal_id, $rango3, $rango4);
            break;
        }
        foreach ($cuenta as $cu){
            $saldo_interes = $cu->total_intereses;
            $saldo_normal = $cu->saldo_actual;
            $saldo_con_interes = $cu->saldo_con_interes;
            $cuenta_id = $cu->id;
            $tipo_cuenta = $cu->tipo_cuenta;
            $salida_id = $cu->salida_id;
        }
        $saldo_con_interes = $saldo_normal + $saldo_interes;


        $referencia_recibo = PostearCuentas::ReferenciaRecibo($sucursal_id);
        $recibo_id= PostearCuentas::CrearRecibo($num_recibo,$usuario_id,$cuenta_id,$saldo_normal,$saldo_interes, $total_pagar,$sucursal_id, $referencia_recibo);
        PostearCuentas::AntesCuerpoRecibo($moras_id, $cuotas_id, $moras_pagara, $cuotas_pagara, $moras_des, $cuotas_des, $recibo_id, $total_pagar,
            $request->input('CodigoCuenta'), $num_recibo, $cuenta_id, $saldo_con_interes, $referencia_recibo, $tipo_cuenta, $salida_id);
        PostearCuentas::IngresoCaja($recibo_id,$total_pagar,$sucursal_id);



        return redirect('/cuenta/posteo/'.$request->input('CodigoCuenta').'/revision/'.$num_recibo.'/'.$recibo_id)
            ->with('aprobado','Se ha posteado correctamente la cuenta '.$request->input('CodigoCuenta'));

    }

    public function revision($cuenta, $recibo, $recibo_id){

        return view('Cuentas.PosteoCuentas.Revision', compact('cuenta','recibo_id'));
    }

    public function recibo($cuenta, $id){
        $consulta = Recibo::join('sucursals','sucursals.id','=','recibos.sucursal_id')
            ->join('cuentas','cuentas.id','=','recibos.cuenta_id')
            ->join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('users','users.id','=','recibos.usuario_id')
            ->select('sucursals.direccion','clientes.nombres','clientes.apellidos','clientes.identidad','recibos.fecha',
                'recibos.saldo_anterior','recibos.saldo_actual','recibos.total_pagar','sucursals.telefono','users.name')
            ->where('recibos.id', $id)->get();
        $cuerpo = CuerpoRecibo::join('recibos','recibos.id','=','cuerpo_recibos.recibo_id')
            ->where('cuerpo_recibos.recibo_id', $id)->get();
        $pdf = new Dompdf();
        $pdf = \PDF::LoadView('PDFs.Recibo', compact('consulta','cuenta','cuerpo'));

        $pdf->setPaper('A7');
        return $pdf->stream();
    }

    public function cuotas($id){
        $pagos = Abonos::join('cuentas','cuentas.id','=','abonos.cuenta_id')
            ->select('abonos.fecha_posteo','abonos.descripcion','abonos.total_pagar','abonos.total_abonado',
                'abonos.referencia')
            ->where('cuentas.cod_cuenta', $id)->get();
        return$pagos;
    }

    public function otras(){
        $cuentas = Cuenta::join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('cuentas.cod_cuenta','clientes.nombres','clientes.apellidos','cuentas.saldo_con_interes',
                'cuentas.descripcion','modelos.nombre_mod')->where('cuentas.tipo_cuenta', '<>', 1)
            ->get();

        return view('Cuentas.OtrasCuentas.index', compact('cuentas'));
    }

    public function calendario_abonos($ano, $mes){
        $pagos = PagosCuenta::join('cuentas','cuentas.id','=','pagos_cuentas.cuenta_id')
            ->join('salidas','salidas.id','=','cuentas.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->select('clientes.nombres','clientes.apellidos','pagos_cuentas.dia_pago',
                'pagos_cuentas.dia_limite_pago','cuentas.cod_cuenta')
            ->where('cuentas.estado_cuenta', 1)->where('cuentas.tipo_cuenta', 1)->where('pagos_cuentas.estado',1)
            ->get();
        $i = 0;
        $p = [];
        $e = 1;
        $a = 2;
        foreach ($pagos as $pago){
            $fecha_antes = strtotime('-3 day', strtotime($pago->dia_pago));
            $fecha_antes = date('Y-m-d', $fecha_antes);
            $p[$i]['title'] = $pago->nombres.' '.$pago->apellidos;
            $p[$i]['start'] = $pago->dia_pago;
            $p[$i]['descripcion'] = 'Dia de pago.';
            $p[$i]['color'] = '#0BEC6A';
            $p[$i]['textColor'] = 'white';
            $p[$i]['cuenta'] = $pago->cod_cuenta;

            $p[$e]['title'] = $pago->nombres.' '.$pago->apellidos;
            $p[$e]['start'] = $fecha_antes;
            $p[$i]['descripcion'] = '3 dias antes del pago.';
            $p[$e]['color'] = '#F7A203';
            $p[$e]['textColor'] = 'white';
            $p[$e]['cuenta'] = $pago->cod_cuenta;

            $p[$a]['title'] = $pago->nombres.' '.$pago->apellidos;
            $p[$a]['start'] = $pago->dia_limite_pago;
            $p[$i]['descripcion'] = 'Dia limite de pago';
            $p[$a]['color'] = '#F70A03';
            $p[$a]['textColor'] = 'white';
            $p[$a]['cuenta'] = $pago->cod_cuenta;
            $i = $i + 3;
            $e = $e + 3;
            $a = $a + 3;
        }


        return $p;
    }



}

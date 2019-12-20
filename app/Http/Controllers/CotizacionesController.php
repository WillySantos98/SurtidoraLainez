<?php

namespace SurtidoraLainez\Http\Controllers;

use BaconQrCode\Common\Mode;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\AplicacionModelo;
use SurtidoraLainez\Cotizacione;
use SurtidoraLainez\Marca;
use SurtidoraLainez\Modelo;
use SurtidoraLainez\PreciosModelo;
use SurtidoraLainez\Sucursal;
use Auth;
use Dompdf\Dompdf;


class CotizacionesController extends Controller
{
    public function index(){
        $tipo_cotizacion = AplicacionModelo::all();
        $marcas = Marca::all();
        $sucursales = Sucursal::all();
        return view('Cotizaciones.index',compact('tipo_cotizacion','marcas','sucursales'));
    }
    public function precios($id){
        $precio = PreciosModelo::select('precio2','margen_anual','prima_minima')
            ->where('modelo_id', $id)
            ->get();

        return $precio;
    }
    public function save(Request $request){
        $fecha = date('Y-m-d');
        $nueva_fecha =strtotime('+30 day', strtotime($fecha));
        $contador = Cotizacione::count();
        if ($request->input('SelectTipoCotizacion') == 1){
            $nueva_cotizacion = new Cotizacione();
            $nueva_cotizacion->aplicacion_id = $request->input('SelectTipoCotizacion');
            $nueva_cotizacion->nombre_interesado = $request->input('Nombre');
            $nueva_cotizacion->apellido_interesado = $request->input('Apellido');
            $nueva_cotizacion->identificacion_interesado = $request->input('Identificacion');
            $nueva_cotizacion->telefono = $request->input('Telefono');
            $nueva_cotizacion->direccion = $request->input('Direccion');
            $nueva_cotizacion->cod_cotizacion = 'SL-COT-'.$contador;
            $nueva_cotizacion->estado = 3; //LA COTIZACION FUE UNA VENTA;
            $nueva_cotizacion->fecha_creacion = $fecha;
            $nueva_cotizacion->fecha_cierre = $fecha;
            $nueva_cotizacion->usuario_id = Auth::user()->id;
            $nueva_cotizacion->colaborador_id = $request->input('SelectEmpleado');
            $nueva_cotizacion->estado_condicion = 2; //es la decision que toma el de facturacion
            $nueva_cotizacion->modelo_id = $request->input('selectModelo');
            $nueva_cotizacion->veces_contactado = 0;
            $nueva_cotizacion->total_pagar = $request->input('PrecioVenta');
            $nueva_cotizacion->prima = $request->input('PrecioPrima');
            $nueva_cotizacion->meses = $request->input('PrecioMeses');
            $nueva_cotizacion->intervalo_tiempo_pago = $request->input('PrecioIntervalo');
            $nueva_cotizacion->cuota = $request->input('PrecioCuota');
            $nueva_cotizacion->precio_contado = $request->input('PrecioFinanciado');
            $nueva_cotizacion->save();
            return redirect()->route('cotizaciones.pendientes')->with('aprobado','Haz realizado la cotizacion exitosamente') ;

        }else if ($request->input('SelectTipoCotizacion') == 2){
            $nueva_cotizacion = new Cotizacione();
            $nueva_cotizacion->aplicacion_id = $request->input('SelectTipoCotizacion');
            $nueva_cotizacion->nombre_interesado = $request->input('Nombre');
            $nueva_cotizacion->apellido_interesado = $request->input('Apellido');
            $nueva_cotizacion->identificacion_interesado = $request->input('Identificacion');
            $nueva_cotizacion->telefono = $request->input('Telefono');
            $nueva_cotizacion->direccion = $request->input('Direccion');
            $nueva_cotizacion->cod_cotizacion = 'SL-COT-'.$contador;
            $nueva_cotizacion->estado = 1; //si la cotizacion esta disponible;
            $nueva_cotizacion->fecha_creacion = $fecha;
            $nueva_cotizacion->fecha_cierre = date('Y-m-d',$nueva_fecha);
            $nueva_cotizacion->usuario_id = Auth::user()->id;
            $nueva_cotizacion->colaborador_id = $request->input('SelectEmpleado');
            $nueva_cotizacion->estado_condicion = 1; //es la decision que toma el de facturacion
            $nueva_cotizacion->modelo_id = $request->input('selectModelo');
            $nueva_cotizacion->veces_contactado = 0;
            $nueva_cotizacion->total_pagar = $request->input('PrecioVenta');
            $nueva_cotizacion->prima = $request->input('PrecioPrima');
            $nueva_cotizacion->meses = $request->input('PrecioMeses');
            $nueva_cotizacion->intervalo_tiempo_pago = $request->input('PrecioIntervalo');
            $nueva_cotizacion->cuota = $request->input('PrecioCuota');
            $nueva_cotizacion->precio_contado = $request->input('PrecioFinanciado');
            $nueva_cotizacion->save();
            return redirect()->route('cotizaciones.abiertas')->with('aprobado','Haz realizado la cotizacion exitosamente') ;
        }
    }

    public function potenciales_abiertas(){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.cod_cotizacion')
            ->where('cotizaciones.estado', 1)->get();

        return view('Cotizaciones.CotizacionesAbiertas.index', compact('cotizaciones'));
    }

    public function potenciales_abiertas_cod($cod){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('colaboradors','colaboradors.id','=','cotizaciones.colaborador_id')
            ->join('tipo_colaboradors','tipo_colaboradors.id','=','colaboradors.tipocolaborador_id')
            ->join('sucursals','sucursals.id','=','colaboradors.sucursal_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.telefono','tipo_vehiculos.nombre_v','tipo_vehiculos.ruedas','colaboradors.nombre as nombre_col',
                'tipo_colaboradors.nombre as nombre_col_t','sucursals.nombre as nombre_suc','cotizaciones.fecha_cierre',
                'cotizaciones.estado','cotizaciones.total_pagar','cotizaciones.prima','cotizaciones.meses','cotizaciones.intervalo_tiempo_pago',
                'cotizaciones.cuota')
            ->where('cotizaciones.cod_cotizacion', $cod)->get();

        return view('Cotizaciones.CotizacionesAbiertas.cotizacion',compact('cotizaciones','cod'));
    }

    public function pdf($cod){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('colaboradors','colaboradors.id','=','cotizaciones.colaborador_id')
            ->join('tipo_colaboradors','tipo_colaboradors.id','=','colaboradors.tipocolaborador_id')
            ->join('sucursals','sucursals.id','=','colaboradors.sucursal_id')
            ->join('users','users.id','=','cotizaciones.usuario_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.telefono','tipo_vehiculos.nombre_v','tipo_vehiculos.ruedas','colaboradors.nombre as nombre_col',
                'tipo_colaboradors.nombre as nombre_col_t','sucursals.nombre as nombre_suc','cotizaciones.fecha_cierre',
                'cotizaciones.estado','cotizaciones.total_pagar','cotizaciones.prima','cotizaciones.meses','cotizaciones.intervalo_tiempo_pago',
                'cotizaciones.cuota','cotizaciones.direccion','modelos.cilindraje','users.usuario')
            ->where('cotizaciones.cod_cotizacion', $cod)->get();
        $options = new \Dompdf\Options();
        $options->setDpi(150);
        $pdf = new \Dompdf\Dompdf($options);
        $pdf = \PDF::loadView('PDFs.Cotizacion',compact('cotizaciones','cod'));

        return $pdf->stream();
    }

    public function pendientes(){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.cod_cotizacion')
            ->where('cotizaciones.estado', 3)->where('cotizaciones.estado_condicion',2)->get();

        return view('Cotizaciones.CotizacionesVentas.index', compact('cotizaciones'));
    }

    public function pendientes_cot($cod){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('colaboradors','colaboradors.id','=','cotizaciones.colaborador_id')
            ->join('tipo_colaboradors','tipo_colaboradors.id','=','colaboradors.tipocolaborador_id')
            ->join('sucursals','sucursals.id','=','colaboradors.sucursal_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.telefono','tipo_vehiculos.nombre_v','tipo_vehiculos.ruedas','colaboradors.nombre as nombre_col',
                'tipo_colaboradors.nombre as nombre_col_t','sucursals.nombre as nombre_suc','cotizaciones.fecha_cierre',
                'cotizaciones.estado','cotizaciones.total_pagar','cotizaciones.prima','cotizaciones.meses','cotizaciones.intervalo_tiempo_pago',
                'cotizaciones.cuota','cotizaciones.estado_condicion')
            ->where('cotizaciones.cod_cotizacion', $cod)->get();

        return view('Cotizaciones.CotizacionesVentas.pendientes',compact('cotizaciones','cod'));
    }

    public function aceptar(Request $request){
        if ($request->input('SelectDec') == 3){
            DB::table('cotizaciones')->where('cod_cotizacion', $request->input('cod'))
                ->update(['estado_condicion'=>$request->input('SelectDec')]);

            return redirect()->route('cotizaciones.ventas.aceptadas')->with('aprobado','Se ha aprobado la cotizacion '.$request->input('cod'));
        }elseif ($request->input('SelectDec') == 4){
            DB::table('cotizaciones')->where('cod_cotizacion', $request->input('cod'))
                ->update(['estado_condicion'=>$request->input('SelectDec')]);

            return redirect()->route('cotizaciones.declinadas')->with('error','Se ha declinado la cotizacion '.$request->input('cod'));
        }
    }
    public function ventas_aceptadas(){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.cod_cotizacion')
            ->where('cotizaciones.estado', 3)->where('cotizaciones.estado_condicion',3)->get();

        return view('Cotizaciones.CotizacionesVentas.aceptadasIndex', compact('cotizaciones'));
    }

    public function cotizacion_aceptadas($cod){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('colaboradors','colaboradors.id','=','cotizaciones.colaborador_id')
            ->join('tipo_colaboradors','tipo_colaboradors.id','=','colaboradors.tipocolaborador_id')
            ->join('sucursals','sucursals.id','=','colaboradors.sucursal_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.telefono','tipo_vehiculos.nombre_v','tipo_vehiculos.ruedas','colaboradors.nombre as nombre_col',
                'tipo_colaboradors.nombre as nombre_col_t','sucursals.nombre as nombre_suc','cotizaciones.fecha_cierre',
                'cotizaciones.estado','cotizaciones.total_pagar','cotizaciones.prima','cotizaciones.meses','cotizaciones.intervalo_tiempo_pago',
                'cotizaciones.cuota','cotizaciones.estado_condicion')
            ->where('cotizaciones.cod_cotizacion', $cod)->get();

        return view('Cotizaciones.CotizacionesVentas.aceptadas', compact('cotizaciones','cod'));
    }
    public function declinadas(){
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->join('marcas','marcas.id','=','modelos.marca_id')
            ->select('modelos.nombre_mod','cotizaciones.fecha_creacion','cotizaciones.nombre_interesado','cotizaciones.apellido_interesado',
                'cotizaciones.identificacion_interesado','cotizaciones.total_pagar','marcas.nombre','cotizaciones.veces_contactado',
                'cotizaciones.cod_cotizacion')
            ->where('cotizaciones.estado', 3)->where('cotizaciones.estado_condicion',4)->get();

        return view('Cotizaciones.CotizacionesVentas.declinadas', compact('cotizaciones'));
    }
}

<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Cliente;
use SurtidoraLainez\Colaborador;
use SurtidoraLainez\Cotizacione;
use SurtidoraLainez\Cuenta;
use SurtidoraLainez\DocumentosSalida;
use SurtidoraLainez\Notificacion;
use SurtidoraLainez\Http\Controllers\FuncionesCuenta;
use SurtidoraLainez\Salida;
use SurtidoraLainez\Sucursal;
use SurtidoraLainez\TipoVenta;

class SalidasMotocicletasController extends Controller
{

    public function salidas_venta(){
        $tipo_venta = TipoVenta::all();
        $colaborador = Colaborador::all();
        $sucursal = Sucursal::all();
        $cotizaciones = Cotizacione::join('modelos','modelos.id','=','cotizaciones.modelo_id')
            ->where('estado', 3)->where('estado_condicion', 3)->get();
        $motos = DB::table('entrada_motocicletas')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('marcas.nombre','modelos.nombre_mod','entrada_motocicletas.chasis','entrada_motocicletas.motor',
                'entrada_motocicletas.color','entrada_motocicletas.id','entrada_motocicletas.id_moto')
            ->where('entrada_motocicletas.estado', 1)
            ->get();
        $clientes = Cliente::all();
        return view('Inventario.Motocicletas.Salidas.salidaVenta', compact('clientes','motos',
            'tipo_venta','sucursal','colaborador','cotizaciones'));
    }


    public function salida_save(Request $request){
        $total_pagos = FuncionesCuenta::Pagos($request->input('Intervalo'), $request->input('Plazo'));
        $fecha_vencimiento = FuncionesCuenta::FechaVencimiento($request);
        $descripcion = FuncionesCuenta::Descripcion($request->input('SelectVenta'));

        $nuevaSalida = new Salida();
        $nuevaNotificacion = new Notificacion();
        $contadorSalida = Salida::all()->count();
        $contadorNotificacion = Notificacion::all()->count();
        $nueva_cuenta = new Cuenta();

        $nuevaSalida->cod_venta = 'sl-0'.$contadorSalida;
        $nuevaSalida->tipoventa_id = $request->input('SelectVenta');
        $nuevaSalida->cliente_id = $request->input('IdCliente');
        $nuevaSalida->moto_id = $request->input('IdMoto');
        $nuevaSalida->fecha_salida = $request->input('Fecha_Venta');
        $nuevaSalida->obsrvacion = $request->input('Observacion');
        $nuevaSalida->colaborador_id = $request->input('SelectColaborador');
        $nuevaSalida->sucrusal_id = $request->input('SelectSucursal');
        $nuevaSalida->usuario_id = $request->input('Usuario');
        $nuevaSalida->num_venta = $request->input('CodVenta');
        $nuevaSalida->contrato = 1;
        $nuevaSalida->cuenta = 1;
        $nuevaSalida->save();
//
        $nueva_cuenta->salida_id = $nuevaSalida->id;
        $nueva_cuenta->plazo = $request->input('Plazo');
        $nueva_cuenta->intervalo_pago = $request->input('Intervalo');
        $nueva_cuenta->dias_gracia = $request->input('DiasGracia');
        $nueva_cuenta->cod_cuenta = FuncionesCuenta::CrearCodigo();
        $nueva_cuenta->saldo_financiar = $request->input('SaldoFinanciado');
        $nueva_cuenta->total_inicial_cuenta = $request->input('TotalCuenta');
        $nueva_cuenta->saldo_actual = $request->input('TotalCuenta');
        $nueva_cuenta->fecha_vencimiento = $fecha_vencimiento;
        $nueva_cuenta->prima = $request->input('Prima');
        $nueva_cuenta->total_pagos = $total_pagos;
        $nueva_cuenta->estado_interes = 1;
        $nueva_cuenta->total_intereses = 0;
        $nueva_cuenta->estado_cuenta = 1;
        $nueva_cuenta->descripcion = $descripcion;
        $nueva_cuenta->mora = 0.05;
        $nueva_cuenta->saldo_con_interes = $request->input('TotalCuenta');
        $nueva_cuenta->tipo_cuenta = 1;
        $nueva_cuenta->save();

        FuncionesCuenta::PagosCuenta($nueva_cuenta->id, $request, $total_pagos);
        FuncionesCuenta::EstadoCuenta($request, $nueva_cuenta->id, $nueva_cuenta->cod_cuenta);

        $nuevaNotificacion->cod_notificacion = 'sl-nt-'.$contadorNotificacion;
        $nuevaNotificacion->fecha_generada = $request->input('Fecha_Venta');
        $nuevaNotificacion->salida_id = $nuevaSalida->id;
        $nuevaNotificacion->estado = 1;
        $nuevaNotificacion->save();


        DB::table('entrada_motocicletas')->where('id', $request->input('IdMoto'))
            ->update(['estado' => 2]);

        return redirect()->route('salidas.index');
    }

    public function index(){
        $salidas = DB::table('salidas')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('clientes.nombres','clientes.apellidos','salidas.id','salidas.cod_venta','salidas.num_venta',
                'entrada_motocicletas.id_moto','marcas.nombre','modelos.nombre_mod', 'salidas.fecha_salida')
            ->get();
        return view('Inventario.Motocicletas.Documentos.Salidas.index', compact('salidas'));
    }

    public function venta($codigo){

        $cliente = DB::table('salidas')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('tipo_ventas','tipo_ventas.id','=','salidas.tipoventa_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('notificacions','notificacions.salida_id','=','salidas.id')
            ->select('salidas.cod_venta','tipo_ventas.nombre as nombre_ven','salidas.num_venta','salidas.fecha_salida',
                'clientes.nombres','clientes.apellidos', 'clientes.identidad','clientes.rtn','entrada_motocicletas.chasis',
                'marcas.nombre','modelos.nombre_mod','salidas.id','entrada_motocicletas.motor','entrada_motocicletas.color',
                'entrada_motocicletas.ano','entrada_motocicletas.id_moto','clientes.id as id_c')
            ->where('salidas.cod_venta',$codigo)
            ->get();
        $doc = DB::table('salidas')
            ->join('documentos_salidas','documentos_salidas.salida_id','=','salidas.id')
            ->select('documentos_salidas.nombre','documentos_salidas.id')
            ->where('salidas.cod_venta', $codigo)->get();

        return view('Inventario.Motocicletas.Documentos.Salidas.venta', compact('cliente','doc'));
    }

    public function add_doc(Request $request){
        $files = $request->file('Documentos');
        $i = 0;
        if($request->hasFile('Documentos')){
            foreach ($request->file('Documentos') as $key => $value){
                $nuevo_Documento = new DocumentosSalida();
                $file = $files[$key];
                $nombre = time().'-'.$file->getClientOriginalName();
                $nuevo_Documento->nombre = $nombre;
                $nuevo_Documento->salida_id = $request->input('IdVenta');
                $file->move(public_path().'/documentos/ventas', $nombre);
                $nuevo_Documento->save();
                $i++;
            }
        DB::table('salidas')->where('id',$request->input('IdVenta'))
            ->update(['contrato'=>2]);
        }
        return redirect('/inventario/motocicletas/documentos/salidas/'.$request->input('CodVenta'))->with('status','Se agregaron '.$i.' correctamente');
    }
    public function edit_num_factura(Request $request){
        DB::table('salidas')->where('id', $request->input('InputId'))
            ->update(['num_venta'=>$request->input('Factura')]);

        return redirect('/inventario/motocicletas/documentos/salidas/'.$request->input('InputCod'))
            ->with('aprobado','Se ha cambiado el numero de factura a '.$request->input('Factura').', de la venta '.$request->input('Inputcod'));
    }

    public function contratos_pendientes(){
        $salidas = Salida::join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('sucursals','sucursals.id','=','salidas.sucrusal_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->where('salidas.contrato' ,1)->paginate(10);

        return view('Inventario.Motocicletas.Documentos.VentasSinContrato.index', compact('salidas'));
    }




}

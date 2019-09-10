<?php

namespace SurtidoraLainez\Http\Controllers;

use BaconQrCode\Encoder\QrCode;
//use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Salida;
use function MongoDB\BSON\toJSON;
use SurtidoraLainez\EntradaMotocicleta;
use SurtidoraLainez\Sucursal;



class MotocicletasController extends Controller
{
    public function index(){
        $totalMotos = EntradaMotocicleta::where('estado',1)->count();
        $motos = DB::table('entrada_motocicletas')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('sucursals','sucursals.id','=','entrada_motocicletas.sucursal_id')
            ->select('marcas.nombre as nombre_mar','modelos.nombre_mod','entrada_motocicletas.color','entrada_motocicletas.id_moto as codigo',
                'sucursals.nombre as nombre_su','entrada_motocicletas.id')
            ->where('entrada_motocicletas.estado',1)
            ->get();
        return view('Inventario.Motocicletas.index', compact('totalMotos','motos'));


    }

    public function ficha($codigo){
        $informacion_moto = DB::table('entrada_motocicletas')
            ->join('consignacions', 'consignacions.id','=','entrada_motocicletas.consignacion_id')
            ->join('marcas', 'marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos', 'modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('tipo_entradas', 'tipo_entradas.id','=','consignacions.tipo_entrada_id')
            ->join('colaboradors','colaboradors.id','=','consignacions.colaborador_id')
            ->join('sucursals','sucursals.id','=','consignacions.sucursal_id')
            ->select('consignacions.cod_entrada','marcas.nombre as nombre_mar','modelos.nombre_mod','entrada_motocicletas.id_moto as codigo',
                'consignacions.cod_entrada','consignacions.num_transferencia','tipo_entradas.nombre as nombre_ent',
                'consignacions.fecha_entrada','colaboradors.nombre as nombre_col','sucursals.nombre as nombre_suc')
            ->where('entrada_motocicletas.id_moto',$codigo)
            ->get();
        $info_modelo = DB::table('entrada_motocicletas')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('consignacions', 'consignacions.id','=','entrada_motocicletas.consignacion_id')
            ->join('proveedors','proveedors.id','=','consignacions.proveedor_id')
            ->select('tipo_vehiculos.nombre_v','modelos.nombre_mod','marcas.nombre as nombre_mar','modelos.cilindraje','tipo_vehiculos.ruedas',
                'proveedors.nombre as nombre_pro','entrada_motocicletas.id_moto')
            ->where('entrada_motocicletas.id_moto',$codigo)
            ->get();
        $info_fisico = DB::table('entrada_motocicletas')
            ->join('sucursals','sucursals.id','=','entrada_motocicletas.sucursal_id')
            ->select('sucursals.nombre as nombre_suc','entrada_motocicletas.chasis','entrada_motocicletas.motor','entrada_motocicletas.ano',
                'entrada_motocicletas.color','entrada_motocicletas.estado','entrada_motocicletas.observacion','entrada_motocicletas.id')
            ->where('entrada_motocicletas.id_moto',$codigo)
            ->get();
        $entrada_documentos = DB::table('documentos_consignacions')
            ->join('consignacions','consignacions.id','=','documentos_consignacions.consignacion_id')
            ->join('entrada_motocicletas','entrada_motocicletas.consignacion_id','=','consignacions.id')
            ->select('documentos_consignacions.nombre','consignacions.cod_entrada')
            ->where('entrada_motocicletas.id_moto',$codigo)->get();
        $contador_doc = DB::table('documentos_consignacions')
            ->join('consignacions','consignacions.id','=','documentos_consignacions.consignacion_id')
            ->join('entrada_motocicletas','entrada_motocicletas.consignacion_id','=','consignacions.id')
            ->where('entrada_motocicletas.id_moto',$codigo)->get()->count();
        $documentos_moto = DB::table('documentos_motocicletas')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','documentos_motocicletas.entrada_id')
            ->select('documentos_motocicletas.casco','documentos_motocicletas.hoja_garantia','documentos_motocicletas.llaves',
                'documentos_motocicletas.bateria','documentos_motocicletas.acido_bateria','entrada_motocicletas.id')
            ->where('entrada_motocicletas.id_moto', $codigo)->get();
        $fotos_moto = DB::table('fotos_motocicletas')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','fotos_motocicletas.moto_id')
            ->select('fotos_motocicletas.nombre','entrada_motocicletas.id_moto')->where('entrada_motocicletas.id_moto', $codigo)->get();



        return view('Inventario.Motocicletas.ficha', compact('informacion_moto','info_modelo','info_fisico','entrada_documentos',
            'contador_doc','documentos_moto','fotos_moto'));
    }

    public function inventario_sucursal(){
        $sucursales = Sucursal::all();
        return view('Inventario.Motocicletas.IndexInventarioSucursal',compact('sucursales'));
    }

    public function info_sucursal($id){
        $datos_sucursal = DB::table('sucursals')
            ->join('entrada_motocicletas','entrada_motocicletas.sucursal_id','=','sucursals.id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('entrada_motocicletas.motor', 'marcas.nombre as nombre_mar','modelos.nombre_mod','entrada_motocicletas.color',
                'entrada_motocicletas.ano','entrada_motocicletas.id_moto','entrada_motocicletas.chasis','entrada_motocicletas.motor',
                'sucursals.nombre','entrada_motocicletas.estado')
            ->where('entrada_motocicletas.sucursal_id',$id)->where('entrada_motocicletas.estado', 1)
            ->get();
        return $datos_sucursal;
    }

    public function transferencia(){
        $totalMotos = EntradaMotocicleta::where('estado',5)->count();
        $motos = DB::table('entrada_motocicletas')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('sucursals','sucursals.id','=','entrada_motocicletas.sucursal_id')
            ->select('marcas.nombre as nombre_mar','modelos.nombre_mod','entrada_motocicletas.color','entrada_motocicletas.id_moto as codigo',
                'sucursals.nombre as nombre_su','entrada_motocicletas.id')
            ->where('entrada_motocicletas.estado',5)
            ->get();

        return view('Inventario.Motocicletas.index', compact('totalMotos','motos'));
    }

    public function qr($codigo){
        $info_modelo = DB::table('entrada_motocicletas')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('consignacions', 'consignacions.id','=','entrada_motocicletas.consignacion_id')
            ->join('proveedors','proveedors.id','=','consignacions.proveedor_id')
            ->select('tipo_vehiculos.nombre_v','modelos.nombre_mod','marcas.nombre as nombre_mar','modelos.cilindraje','tipo_vehiculos.ruedas',
                'proveedors.nombre as nombre_pro','entrada_motocicletas.id_moto')
            ->where('entrada_motocicletas.id_moto',$codigo)
            ->get();
        $pdf = new Dompdf();
        $pdf = \PDF::LoadView('QR.InfoMotos', compact('info_modelo'));
        $pdf->setPaper('A7');
        return $pdf->stream();

//        return view('QR.InfoMotos', compact('info_modelo'))


    }

    public function vendidas(){
        $motos = Salida::join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('sucursals','sucursals.id','=','salidas.sucrusal_id')
            ->select('salidas.num_venta','sucursals.nombre as nombre_suc','modelos.nombre_mod',
                'entrada_motocicletas.chasis','clientes.nombres','clientes.apellidos','salidas.cod_venta')
            ->where('entrada_motocicletas.estado', 2)->get();

        return view('Inventario.Motocicletas.Vendidas.index',compact('motos'));
    }

}

<?php

namespace SurtidoraLainez\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use SurtidoraLainez\Cliente;
use SurtidoraLainez\EntradaMotocicleta;
use SurtidoraLainez\Salida;

class PermisosController extends Controller
{
    public function index(){
        $clientes = Cliente::all();

        return view('PermisosCirculacion.index', compact('clientes'));
    }

    public function compras($id){
        $motos = EntradaMotocicleta::join('salidas','salidas.moto_id','=','entrada_motocicletas.id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->select('marcas.nombre','modelos.nombre_mod','entrada_motocicletas.chasis','entrada_motocicletas.motor','entrada_motocicletas.color',
                'entrada_motocicletas.id','salidas.id as salida')
            ->where('clientes.id',$id)->get();

        return $motos;

    }

    public function generar_permiso($id){
        $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $fecha_actual = date("Y-m-j");
        $nueva_fecha =strtotime('+30 day', strtotime($fecha_actual));
        $dia =date('j', $nueva_fecha);
        $mes = date('m', $nueva_fecha);
        $mesString = '';
        for ($i = 0; $i <= count($meses); $i++){
            if ($mes == $i){
                $mesString = $meses[$i-1];
                break;
            }
        }
        $ano = date('Y', $nueva_fecha);
        $fecha_real = date('j/m/Y');
        $pdf = new Dompdf();
        $consulta = Salida::join('sucursals','sucursals.id','=','salidas.sucrusal_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('tipo_ventas','tipo_ventas.id','=','salidas.tipoventa_id')
            ->select('sucursals.direccion', 'sucursals.telefono', 'sucursals.email', 'clientes.nombres', 'clientes.apellidos','clientes.identidad',
                'entrada_motocicletas.motor','entrada_motocicletas.chasis','entrada_motocicletas.color','entrada_motocicletas.ano',
                'marcas.nombre as marca','modelos.nombre_mod','tipo_ventas.nombre as venta')
            ->where('salidas.id', $id)->get();
        $pdf = \PDF::loadView('PDFs.ConstanciaCirculacion', compact('consulta', 'dia','mesString','ano','fecha_real'));
        return $pdf->stream();
    }
}

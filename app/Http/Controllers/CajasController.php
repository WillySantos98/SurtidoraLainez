<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\Abonos;
use SurtidoraLainez\Caja;

class CajasController extends Controller
{
    public function index(){

        return view('Cuentas.Cajas.index');
    }

    public function cargar_abonos(){
        $abonos = Caja::join('recibos','recibos.id','=','cajas.recibo_id')
            ->select('recibos.cod_recibo','cajas.fecha')->get();

        $objeto = [];
        $i = 0;
        foreach ($abonos as $abono):
            $objeto[$i]['title'] = $abono->cod_recibo;
            $objeto[$i]['start'] = $abono->fecha;
            $objeto[$i]['color'] = '#0BEC6A';
            $objeto[$i]['textColor'] = 'white';
            $i = $i + 1;
        endforeach;
        return $objeto;
    }
}

<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\Salida;

class ReportesController extends Controller
{
    public function index(){

        return view('Graficas.index', compact('rMoto'));

    }

    public function v_marcas($num_peticion){
        if ($num_peticion == 1){
            $rMoto = Salida::join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
                ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
                ->select('marcas.nombre')
                ->get();
        }
        return $rMoto;
    }

    public function f_marcas($mes, $ano){
        $fec = $ano.'-'.$mes;
        $rMoto = Salida::join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->select('marcas.nombre')->where('salidas.fecha_salida','like','%'.$fec.'%')
            ->get();

        return $rMoto;
    }

    public function f_ano($ano){
        $rMoto = Salida::join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->select('marcas.nombre')->where('salidas.fecha_salida','like','%'.$ano.'%')
            ->get();
        return $rMoto;
    }

}

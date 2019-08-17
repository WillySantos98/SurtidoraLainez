<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\EntradaMotocicleta;
use SurtidoraLainez\Http\Requests\SavePlaca;
class PlacasController extends Controller
{
    public function ingreso(){
        $motos = EntradaMotocicleta::join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('marcas.nombre', 'modelos.nombre_mod','entrada_motocicletas.id','entrada_motocicletas.chasis',
                'entrada_motocicletas.motor','entrada_motocicletas.color', 'entrada_motocicletas.id_moto','entrada_motocicletas.ano',
                'modelos.cilindraje')
            ->get();

        return view('Placas.ingreso', compact('motos'));
    }

    public function save_ingreso(SavePlaca $request){


        return redirect()->route('placas.ingreso')->with('status','Se ha Guarado Correctamente');
    }
}

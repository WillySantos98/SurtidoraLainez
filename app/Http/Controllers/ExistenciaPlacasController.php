<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\EntradaMotocicleta;

class ExistenciaPlacasController extends Controller
{
    public function chasis($chasis){
        $res = 1;
        if (EntradaMotocicleta::where('entrada_motocicletas.chasis', $chasis)->exists()){
            $res = 2;
        }
        return $res;
    }

    public function motor($motor){
        $resultado = false;
        if (EntradaMotocicleta::where('chasis', $motor)->exists()){
            $res = true;
            return $res;
        }else{
            return $motor;
        }
    }
}

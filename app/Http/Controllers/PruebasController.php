<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function txt(){
        $error = [];
        try{
            $txt_nuevamora = fopen(public_path().'/TXT/NuevaMora.txt', "w");
            fwrite($txt_nuevamora, "##### Fecha 2".date('Y-m-d'). PHP_EOL);
            fclose($txt_nuevamora);

        }catch (\Exception $exception){
            $error = $exception;
        }

        return $error;
    }
}

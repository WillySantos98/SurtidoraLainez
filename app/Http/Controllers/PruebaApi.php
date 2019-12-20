<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\EntradaMotocicleta;

class PruebaApi extends Controller
{
    public function index(){
        $entradas = EntradaMotocicleta::all();

        return $entradas;
    }
}

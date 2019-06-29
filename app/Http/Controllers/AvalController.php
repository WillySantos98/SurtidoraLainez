<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;

class AvalController extends Controller
{
    public function cliente_formnuevo(){
        return view('Avales.FormAval');
    }
}

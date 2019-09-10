<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use SurtidoraLainez\TipoUsuario;

class InicioController extends Controller
{



    public function index(){


        return view('Index.base', compact('tipo'));
    }

    public function fallo(){
        return view('Index.FalloSesion');
    }





}

<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{



    public function index(){
        return view('Index.base');
    }


}

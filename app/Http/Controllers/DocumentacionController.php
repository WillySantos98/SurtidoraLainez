<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;

class DocumentacionController extends Controller
{
    public function index(){

        return view('Problemas.Documentacion.index');
    }

    public function procesos(){

        return view('Problemas.Procesos.index');
    }
}

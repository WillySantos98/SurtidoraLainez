<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\ReporteSistema;
use Auth;

class ProblemasController extends Controller
{
    public function index(){
        return view('Problemas.index');
    }

    public function reporte(){

        return view('Problemas.ProblemasSistema.form');
    }

    public function save_reporte(Request $request){
        $fecha = date("Y-m-j");
        $contador = ReporteSistema::all()->count();
        $nuevo_reporte = new ReporteSistema();
        $nuevo_reporte->codigo = 'rpt-'.$contador;
        $nuevo_reporte->url = $request->input('url');
        $nuevo_reporte->descripcion_error = $request->input('Descipcion');
        $nuevo_reporte->estado = 1;
        $nuevo_reporte->fecha_reporte = $fecha;
        $nuevo_reporte->usuario_id = Auth::user()->id;
        $nuevo_reporte->save();

        return redirect()->route('problemas.index')->with('aprobado','El reporte ha sido notificado. Se le notificara cuando el reporte tenga una solucion');
    }
}

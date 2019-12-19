<?php


namespace SurtidoraLainez\Console\Commands\Cobros;


use SurtidoraLainez\ReporteMora;

class Cobroscommands
{
    public static function RevisarReporte($cuenta_id, $txt){
        $reportes = ReporteMora::where('cuenta_id', $cuenta_id)->count();
        $contador = ReporteMora::count();
        if ($reportes == 0){
            $nuevo_reporte = new ReporteMora();
            $nuevo_reporte->cuenta_id = $cuenta_id;
            $nuevo_reporte->estado =  2;
            $nuevo_reporte->proximo_recordatorio =  date('Y-m-d');
            $nuevo_reporte->ultima_modificacion = date('Y-m-d');
            $nuevo_reporte->importancia = 1;
            $nuevo_reporte->codigo_reporte = 'sl-rep-'.($contador + 1);
            $nuevo_reporte->save();
        }
    }
}

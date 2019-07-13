<?php

namespace SurtidoraLainez\Http\Controllers;

use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use SurtidoraLainez\Sucursal;

class SalidasController extends Controller
{
    public function formulario (){
        $almacenes = Sucursal::all();
        return view('Inventario.Motocicletas.Transferencias.index', compact('almacenes'));
    }

    public function index_notificaciones(){
        $notificaciones = DB::table('notificacions')
            ->join('salidas','salidas.id','=','notificacions.salida_id')
            ->join('clientes','clientes.id','=','salidas.cliente_id')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('salidas.cod_venta','salidas.num_venta','clientes.nombres','clientes.apellidos','marcas.nombre','modelos.nombre_mod',
                'entrada_motocicletas.chasis','entrada_motocicletas.motor','notificacions.id')
            ->get();
        return view('Inventario.Motocicletas.Documentos.Notificaciones.index', compact('notificaciones'));
    }

    public function generacion_notificacion(Request $request)
    {
        $fecha = $request->input('Fecha');
        $consulta = DB::table('notificacions')
            ->join('salidas', 'salidas.id', '=', 'notificacions.salida_id')
            ->join('entrada_motocicletas', 'entrada_motocicletas.id', '=', 'salidas.moto_id')
            ->join('marcas', 'marcas.id', '=', 'entrada_motocicletas.marca_id')
            ->join('proveedors', 'proveedors.id', '=', 'marcas.proveedor_id')
            ->join('modelos', 'modelos.id', '=', 'entrada_motocicletas.modelo_id')
            ->join('consignacions', 'consignacions.id', '=', 'entrada_motocicletas.consignacion_id')
            ->join('clientes', 'clientes.id', '=', 'salidas.cliente_id')
            ->join('sucursals', 'sucursals.id', '=', 'salidas.sucrusal_id')
            ->join('colaboradors', 'colaboradors.id', '=', 'salidas.colaborador_id')
            ->join('users', 'users.id', '=', 'salidas.usuario_id')
            ->select('proveedors.nombre as nombre_proveedor', 'marcas.nombre as nombre_marca', 'modelos.nombre_mod',
                'entrada_motocicletas.chasis', 'entrada_motocicletas.motor', 'entrada_motocicletas.color', 'consignacions.num_transferencia',
                'consignacions.fecha_entrada', 'clientes.nombres', 'clientes.apellidos', 'clientes.identidad', 'clientes.rtn',
                'sucursals.nombre as nombre_sucursal', 'notificacions.cod_notificacion', 'colaboradors.nombre as nombre_colaborador',
                'users.name')
            ->where('notificacions.id', $request->input('Id'))
            ->get();

        $pdf = \PDF::loadView('notificacion', compact('consulta', 'fecha'));

        return $pdf->stream();
    }

    public function cargarMotos($id){
        $motos = DB::table('entrada_motocicletas')
            ->select('entrada_motocicletas.id_moto','entrada_motocicletas.motor','entrada_motocicletas.chasis','entrada_motocicletas.id',
                'entrada_motocicletas.color','sucursals.nombre as nombre_alm','marcas.nombre as nombre_mar','modelos.nombre_mod')
            ->join('sucursals','sucursals.id','=','entrada_motocicletas.sucursal_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->where('entrada_motocicletas.estado',1)->where('sucursals.id',$id)
            ->get();

        return $motos;
    }
}

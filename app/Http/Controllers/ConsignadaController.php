<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use SurtidoraLainez\Colaborador;
use SurtidoraLainez\Consignacion;
use SurtidoraLainez\DocumentosConsignacion;
use SurtidoraLainez\DocumentosMotocicleta;
use SurtidoraLainez\EntradaMotocicleta;
use SurtidoraLainez\Marca;
use SurtidoraLainez\Modelo;
use SurtidoraLainez\Proveedor;
use SurtidoraLainez\Sucursal;
use DB;
use SurtidoraLainez\TipoEntrada;

class ConsignadaController extends Controller
{
    public function indexForm(){
        $tipo_entradas = TipoEntrada::all();
        $proveedor = Proveedor::where('estado', 1)->get();
        $sucursales = Sucursal::where('estado', 1)->get();
        return view('Inventario.Motocicletas.Registro.Consignadas.index', compact('proveedor','sucursales', 'tipo_entradas'));
    }

    public function registro(Request $request){
    $contador = DB::table('consignacions')->select('id')->get()->count();

    $modelos = $request->input('Modelo');
    $marcas = $request->input('Marca');
    $chasis = $request->input('Chasis');
    $motor = $request->input('Motor');
    $color = $request->input('Color');
    $ano =$request->input('Ano');
    $observacion = $request->input('Observacion');

    $nueva_consignacion = new Consignacion();
    $cod_consignacion = 'sl-000-'.$contador;
    $nueva_consignacion->cod_entrada = $cod_consignacion;
    $nueva_consignacion->guia_remision = $request->input('Remision');
    $nueva_consignacion->num_transferencia = $request->input('Trasferencia');
    $nueva_consignacion->fecha_entrada = $request->input('FechaEntrada');
    $nueva_consignacion->proveedor_id = $request->input('SelectProveedor');
    $nueva_consignacion->usuario_id = $request->input('Usuario');
    $nueva_consignacion->colaborador_id = $request->input('SelectEmpleadoSucursal');
    $nueva_consignacion->sucursal_id = $request->input('SelectSucursal');
    $nueva_consignacion->tipo_entrada_id = $request->input('SelectEntrada');
    $nueva_consignacion->save();

    for ($i = 0; $i < count($request->input('Motor')); $i++){
        $entrada_moto = new EntradaMotocicleta();
        $entrada_moto->proveedor_id = $request->input('SelectProveedor');
        $entrada_moto->marca_id = $marcas[$i];
        $contador_modelo = EntradaMotocicleta::where('modelo_id', $modelos[$i])->get()->count();
        $entrada_moto->modelo_id = $modelos[$i];
        $entrada_moto->chasis = $chasis[$i];
        $entrada_moto->motor = $motor[$i];
        $entrada_moto->color = $color[$i];
        $entrada_moto->ano = $ano[$i];
        $entrada_moto->fecha_entrada = $request->input('FechaEntrada');
        $entrada_moto->observacion = $observacion[$i];
        $entrada_moto->consignacion_id = $nueva_consignacion->id;
        $entrada_moto->id_moto = $nueva_consignacion->cod_entrada.'--'.$request->input('SelectProveedor').'-'.$marcas[$i].'-'.$modelos[$i].'-'.($contador_modelo + 1);
        $entrada_moto->estado = 1;
        $entrada_moto->sucursal_id = $request->input('SelectSucursal');
        $entrada_moto->save();

    }

        return redirect('/inventario/motocicletas/registro/2/'.$nueva_consignacion->id);
    }
    public function cargar_empleados($id){
        $empleados = Colaborador::where('sucursal_id', $id)->where('estado', 1)->get();
        return $empleados->toJson();
    }

    public function cargar_modelos($id){
        $modelos = Modelo::where('marca_id', $id)->get();
        return $modelos->toJson();
    }
    public function cargar_datos_modelos($id){
        $datosmodelos = DB::table('modelos')
            ->join('tipo_vehiculos','tipo_vehiculos.id','=','modelos.tipovehiculo_id')
            ->join('marcas', 'marcas.id','=','modelos.marca_id')
            ->select('modelos.cilindraje','marcas.id as idm','modelos.id as idmod', 'tipo_vehiculos.nombre_v',
                'tipo_vehiculos.ruedas','marcas.nombre','modelos.nombre_mod')->where('modelos.id', $id)
            ->get();

        return $datosmodelos->toJson();
    }

    public function registro2($id){
        $consignacion = DB::table('consignacions')
            ->join('proveedors', 'proveedors.id','=','consignacions.proveedor_id')
            ->join('sucursals', 'sucursals.id','=','consignacions.sucursal_id')
            ->join('colaboradors', 'colaboradors.id','=','consignacions.colaborador_id')
            ->join('users', 'users.id', '=', 'consignacions.usuario_id')
            ->join('tipo_entradas', 'tipo_entradas.id', '=', 'consignacions.tipo_entrada_id')
            ->select('proveedors.nombre as nombre_pro', 'sucursals.nombre as nombre_su', 'colaboradors.nombre as nombre_col', 'consignacions.fecha_entrada',
            'users.usuario', 'consignacions.cod_entrada','tipo_entradas.nombre as nombre_ent', 'consignacions.id')
            ->where('consignacions.id',$id)
            ->get();
        $motos = DB::table('entrada_motocicletas')
            ->join('marcas', 'marcas.id', '=','entrada_motocicletas.marca_id')
            ->join('modelos', 'modelos.id', '=', 'entrada_motocicletas.modelo_id')
            ->select('entrada_motocicletas.id_moto','marcas.nombre as nombre_mar','modelos.nombre_mod','entrada_motocicletas.color',
                'entrada_motocicletas.chasis','entrada_motocicletas.id')
            ->where('entrada_motocicletas.consignacion_id', $id)
            ->get();

        return view('Inventario.Motocicletas.Registro.Consignadas.2Registro', compact('consignacion', 'motos'));
    }

    public function save_registro2(Request $request){
        $id_c = $request->input('EntradaId');
        $id_m = $request->input('MotodId');

        $files = $request->file('Documentos');

        if($request->hasFile('Documentos')){
            foreach ($request->file('Documentos') as $key => $value){
                $nuevo_DocumentoConsignacion = new DocumentosConsignacion();
                $file = $files[$key];
                $nombre = time().'-'.$file->getClientOriginalName();
                $nuevo_DocumentoConsignacion->nombre = $nombre;
                $nuevo_DocumentoConsignacion->consignacion_id = $id_c;
                $file->move(public_path().'/documentos/entradas', $nombre);
                $nuevo_DocumentoConsignacion->save();
            }
        }

        $hojas = $request->input('SelectGarantia');
        $acido = $request->input('SelectAcido');
        $bateria = $request->input('SelectBateria');
        $casco = $request->input('SelectCasco');
        $llaves = $request->input('SelectLlaves');

        for($i = 0 ; $i < count($id_m) ; $i ++){
            $nuevo_documentoMoto =  new DocumentosMotocicleta();
            $nuevo_documentoMoto->casco = $casco[$i];
            $nuevo_documentoMoto->hoja_garantia = $hojas[$i];
            $nuevo_documentoMoto->llaves = $llaves[$i];
            $nuevo_documentoMoto->bateria = $bateria[$i];
            $nuevo_documentoMoto->acido_bateria = $acido[$i];
            $nuevo_documentoMoto->entrada_id = $id_m[$i];
            $nuevo_documentoMoto->save();
        }

        return redirect()->route('motocicletas.index');

    }
}
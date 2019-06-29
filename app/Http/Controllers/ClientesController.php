<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Cliente;
use SurtidoraLainez\DireccionCliente;
use SurtidoraLainez\DocumentosCliente;
use SurtidoraLainez\TelefonoCliente;
use SurtidoraLainez\Http\Requests\SaveDatosCliente;

class ClientesController extends Controller
{
    public function cliente_formnuevo(){

        return view('Clientes.FormClienteNuevo');
    }

    public function cliente_save(SaveDatosCliente $request){
        $nuevo_cliente = new Cliente();
        $telefonos = $request->input('TelefonosClientes');
        $direcciones = $request->input('DireccionesClientes');
        $nombreCliente = ' '.$request->input('NombresCliente').' '.$request->input('ApellidosCliente');

        $nuevo_cliente->nombres = $request->input('NombresCliente');
        $nuevo_cliente->apellidos = $request->input('ApellidosCliente');
        $nuevo_cliente->identidad = $request->input('IdentidadCliente');
        $nuevo_cliente->rtn =  $request->input('RtnCliente');
        $nuevo_cliente->save();

        foreach ($request->input('TelefonosClientes') as $key => $value){
            $nuevo_telefono = new TelefonoCliente();
            $nuevo_telefono->numero = $telefonos[$key];
            $nuevo_telefono->cliente_id = $nuevo_cliente->id;
            $nuevo_telefono->estado = 1;
            $nuevo_telefono->save();
        }

        foreach ($request->input('DireccionesClientes') as $key => $value){
            $nueva_direccion = new DireccionCliente();
            $nueva_direccion->direccion = $direcciones[$key];
            $nueva_direccion->estado = 1;
            $nueva_direccion->cliente_id = $nuevo_cliente->id;
            $nueva_direccion->save();
        }

        $files = $request->file('Documentos');

        if($request->hasFile('Documentos')){
            foreach ($request->file('Documentos') as $key => $value){
                $nuevo_documento = new DocumentosCliente();
                $file = $files[$key];
                $nombre = time().'-'.$file->getClientOriginalName();
                $nuevo_documento->nombre = $nombre;
                $nuevo_documento->cliente_id = $nuevo_cliente->id;
                $nuevo_documento->save();
                $file->move(public_path().'/documentos/clientes', $nombre);
            }
        }

        return redirect()->route('cliente.index')->with('status','El cliente '.$nombreCliente.' se ha guardado correctamente');
    }

    public function clientes(){
        $clientes = Cliente::all();

        return view('Clientes.index', compact('clientes'));
    }

    public function perfil($id){{
        $cliente = Cliente::where('id', $id)->get();
        $datosDireccion = DB::table('clientes')
            ->join('direccion_clientes','direccion_clientes.cliente_id','=','clientes.id')
            ->select('direccion_clientes.direccion','direccion_clientes.id','direccion_clientes.estado')
            ->where('clientes.id',$id)
            ->get();
        $datosTelefono = DB::table('clientes')
            ->join('telefono_clientes', 'telefono_clientes.cliente_id','=','clientes.id')
            ->select('telefono_clientes.numero','telefono_clientes.estado','telefono_clientes.id')
            ->where('clientes.id',$id)
            ->get();
        $datosDocumentos = DB::table('clientes')
            ->join('documentos_clientes','documentos_clientes.cliente_id','=','clientes.id')
            ->select('documentos_clientes.nombre', 'documentos_clientes.id','documentos_clientes.id','clientes.nombres','clientes.apellidos')
            ->where('clientes.id',$id)
            ->get();
        $i=0;
        $articulos_solicitados = DB::table('salidas')
            ->join('entrada_motocicletas','entrada_motocicletas.id','=','salidas.moto_id')
            ->join('marcas','marcas.id','=','entrada_motocicletas.marca_id')
            ->join('modelos','modelos.id','=','entrada_motocicletas.modelo_id')
            ->select('marcas.nombre', 'modelos.nombre_mod','entrada_motocicletas.id_moto','salidas.fecha_salida','salidas.cod_venta')
            ->where('salidas.cliente_id', $id)->get();
        return view('Clientes.perfil', compact('datosDireccion', 'cliente','datosTelefono', 'datosDocumentos','i','articulos_solicitados'));
    }}

    public function savertn(Request $request){
        $id = $request->input('Id');
        DB::table('clientes')->where('id', $request->Id)
            ->update(['rtn'=>$request->Rtn]);

        return redirect('clientes/perfil/'.$id);
    }



}

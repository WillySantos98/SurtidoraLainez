<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\Colaborador;
use SurtidoraLainez\Http\Requests\SaveSucursal;
use SurtidoraLainez\Http\Requests\SaveColaborador;
use SurtidoraLainez\PermisoUsuario;
use SurtidoraLainez\Sucursal;
use SurtidoraLainez\TipoColaborador;

class SucursalController extends Controller
{
    public function index(){

        $Sucursal = Sucursal::get();
        return view('Sucursales.index', compact('Sucursal'));
    }

    public function save_sucursal(SaveSucursal $request){
        $nueva_sucursal = new Sucursal();

        $nueva_sucursal->nombre = $request->input('NombreSucursal');
        $nueva_sucursal->slug = $request->input('Slug');
        $nueva_sucursal->email = $request->input('Correo');
        $nueva_sucursal->telefono = $request->input('Telefono');
        $nueva_sucursal->direccion = $request->input('Direccion');
        $nueva_sucursal->estado = 1;
        $nueva_sucursal->save();

        return redirect()->route('sucursal.index')->with('status','La sucursal se ha guardado correctamente');
    }

    public function ficha_sucursal($slug){
        $Sucursal = Sucursal::where('slug', $slug)->get();
        $ConsultaSucursalCol = DB::table('colaboradors')
            ->join('sucursals', 'sucursals.id','=','colaboradors.sucursal_id')
            ->join('tipo_colaboradors', 'tipo_colaboradors.id','=','colaboradors.tipocolaborador_id')
            ->select('colaboradors.nombre','colaboradors.telefono','colaboradors.email','tipo_colaboradors.nombre as nombre_tc',
                'colaboradors.estado', 'colaboradors.id')
            ->where('sucursals.slug', $slug)
            ->get();

        return view('Sucursales.fichas.ficha', compact('Sucursal', 'ConsultaSucursalCol'));
    }
//----------------------------------------------------------------------------------------------------------------------
//*****Colaboradores
    public function colaboradores(){
        $TColaboradores = TipoColaborador::all();
        $Sucursales = Sucursal::all();
        $Colaboradores = Colaborador::all();
        return view('Sucursales.colaboradores.index', compact('TColaboradores','Sucursales', 'Colaboradores'));
    }

    public function save_tipocolaborador(Request $request){

        $nuevoTipoColaborador = new TipoColaborador();
        $nuevoTipoColaborador->nombre = $request->input('Nombre');
        $nuevoTipoColaborador->save();
        $nombre = $request->input('Nombre');
        return redirect()->route('colaboradores.index')->with('status','El tipo de colaborador '.$nombre.' se ha guardado correctamente');
    }

    public function save_newcolaborador(SaveColaborador $request){
        $nombre = $request->input('Nombre');
        $nuevoColaboraddor = new Colaborador();

        $nuevoColaboraddor->nombre = $request->input('Nombre');
        $nuevoColaboraddor->estado = 1;
        $nuevoColaboraddor->telefono = $request->input('Telefono');
        $nuevoColaboraddor->email = $request->input('Correo');
        $nuevoColaboraddor->fecha_inicio = $request->input('FechaInicio');
        $nuevoColaboraddor->fecha_nacimiento = $request->input('FechaNacimiento');
        $nuevoColaboraddor->sucursal_id = $request->input('SelectSucursal');
        $nuevoColaboraddor->tipocolaborador_id = $request->input('SelectTipoColaborador');
        $nuevoColaboraddor->save();

        return redirect()->route('colaboradores.index')->with('status','El colaborador '.$nombre.' se ha guardado correctamente');
    }

    public function ficha_colaborador($id){

        $ConsultaColaborador = DB::table('colaboradors')
            ->join('tipo_colaboradors', 'tipo_colaboradors.id','=','colaboradors.tipocolaborador_id')
            ->join('sucursals', 'sucursals.id','=','colaboradors.sucursal_id')
            ->select('colaboradors.nombre','colaboradors.estado', 'colaboradors.id','colaboradors.fecha_nacimiento',
                'colaboradors.telefono','colaboradors.email', 'colaboradors.fecha_inicio', 'tipo_colaboradors.nombre as nombre_colaborador',
                'sucursals.nombre as nombre_sucursal')
            ->where('colaboradors.id', $id)
            ->get();

        return view('Sucursales.colaboradores.ficha', compact('ConsultaColaborador'));
    }

    public function save_colaborador_edit(Request $request){
        $id = $request->Id;
        $nombre = $request->Nombre;
        DB::table('colaboradors')->where('id', $request->Id)
            ->update(['nombre'=>$request->Nombre,'telefono'=>$request->Telefono,'email'=>$request->Correo,'estado'=>$request->SelectEstado]);
        return redirect('colaborador/'.$id)->with('status','El colaborador '.$nombre.' se edito correctamente');
    }


}

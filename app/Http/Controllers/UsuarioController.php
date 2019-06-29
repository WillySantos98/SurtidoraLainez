<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\TipoUsuario;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = DB::table('users')
            ->join('tipo_usuarios','tipo_usuarios.id','=','users.tipousuario_id')
            ->select('users.name','users.usuario','users.password','users.email','tipo_usuarios.nombre','users.estado','users.id',
                'tipo_usuarios.id as id_t')
            ->get();
        return view('Usuarios.index', compact('usuarios'));
    }

    public function crear_usuario(){
        $tipo = TipoUsuario::all();
        return view('Usuarios.crear', compact('tipo'));
    }

    public function save_usuario(Request $request){
        $nuevo_usuario = new User();
        $nuevo_usuario->name = $request->input('Nombre');
        $nuevo_usuario->usuario = $request->input('Usuario');
        $nuevo_usuario->password = bcrypt($request->input('Contra'));
        $nuevo_usuario->email = $request->input('Correo');
        $nuevo_usuario->tipousuario_id = $request->input('SelectUsuario');
        $nuevo_usuario->estado = 1;
        $nuevo_usuario->save();

        return redirect()->route('usuario.index');
    }
}

<?php

namespace SurtidoraLainez\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\MenuSecciones;
use SurtidoraLainez\MenuSubsecciones;
use SurtidoraLainez\PermisosUser;
use SurtidoraLainez\TipoUsuario;
use Auth;

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

    public function secciones(){
        $tipos = TipoUsuario::all();
        $subsecciones = MenuSubsecciones::all();
        $secciones = MenuSecciones::all();


        return view('Usuarios.secciones', compact('tipos','secciones','subsecciones'));
    }

    public function save_secciones(Request $request){
        $nueva_seccion =  new MenuSecciones();
        $nueva_seccion->nombre = $request->input('NombreSeccion');
        $nueva_seccion->estado = 1;
        $nueva_seccion->save();

        return redirect()->route('usuario.secciones')->with('aprobado','La seccion del menu con nombre '.$request->input('NombreSeccion').' se creo correctamente');
    }

    public function save_sub_secciones(Request $request){
        $contador = MenuSecciones::join('menu_subsecciones','menu_subsecciones.seccion_id','=','menu_secciones.id')
            ->where('menu_subsecciones.seccion_id', $request->input('SelectTipoSeccion'))->count();
        $nueva_sub = new MenuSubsecciones();
        $nueva_sub->codigo = $request->input('SelectTipoSeccion').'-'.$contador;
        $nueva_sub->nombre = $request->input('NombreSubSeccion');
        $nueva_sub->seccion_id = $request->input('SelectTipoSeccion');
        $nueva_sub->save();

        return redirect()->route('usuario.secciones')->with('aprobado','La sub-seccion '.$request->input('NombreSubSeccion').' se ha creado correctamente');
    }

    public function permisos(Request $request){
        $secciones = MenuSecciones::all();
        $sub = MenuSubsecciones::all();
        $id = $request->input('Id');
        foreach ($secciones as $seccion){
            if ($request->input('select-'.$seccion->nombre) > 0){
                $nuevo_permiso = new PermisosUser();
                $nuevo_permiso->codigo = $request->input('select-'.$seccion->nombre);
                $nuevo_permiso->tipo_user_id = $id;
                $nuevo_permiso->save();
            }
        }

        foreach ($sub as $s){
            if ($request->input('select-sub-'.$s->codigo) != 0){
                $new_permiso = new PermisosUser();
                $new_permiso->codigo = $request->input('select-sub-'.$s->codigo);
                $new_permiso->tipo_user_id = $id;
                $new_permiso->save();
            }
        }

        return redirect()->route('usuario.secciones')->with('aprobado','Se han asignados los permisos correctamente');

//        return Auth::user()->id;

    }

    public function menu($id){
        $tipo = TipoUsuario::join('permisos_users','permisos_users.tipo_user_id','=','tipo_usuarios.id')
            ->join('users','users.tipousuario_id','=','tipo_usuarios.id')
            ->select('permisos_users.codigo')
            ->where('users.id', $id)->get();

        return $tipo;
    }


}

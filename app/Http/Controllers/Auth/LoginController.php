<?php

namespace SurtidoraLainez\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SurtidoraLainez\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use SurtidoraLainez\User;

class LoginController extends Controller
{
    public function enter(Request $request){
        if(Auth::attempt(['email'=>$request->correo, 'password'=>$request->contrasena, 'estado'=>'1'])){
            return redirect()->route('index');

        }else{
            return "no existe el usuario";
        }
    }


    public function index(){
        return view('login');
    }

        public function meter(Request $request){

        $nuevo_usuario = new User();
        $nuevo_usuario->name = 'Williams Daniel Santos Lainez';
        $nuevo_usuario->email = 'willydasanez@gmail.com';
        $nuevo_usuario->usuario = 'WillySantos';
        $nuevo_usuario->password = bcrypt('conectar');
        $nuevo_usuario->tipousuario_id = '1';
        $nuevo_usuario->estado = '1';
        $nuevo_usuario->save();
    }
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
}

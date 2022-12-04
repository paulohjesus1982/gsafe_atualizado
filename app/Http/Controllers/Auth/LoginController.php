<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    public function index(Request $r){

        $msg_erro = '';
        $r->get('erro') ? $msg_erro = "Usuário não encontrado." : '';

        return view('Auth/login', ['erro' => $msg_erro]);
    }

    public function autenticar(Request $r){

        
        $regras = [
            'usu_email' => 'email',
            'usu_senha' => 'required'
        ];
        
        $feedback = [
            'usu_email.email' => 'O campo e-mail é obrigatório.',
            'usu_senha.required' => 'O campo senha é obrigatório.'
        ];
        
        $r->validate($regras, $feedback);
        
        $usu_email = $r->get('usu_email');
        $usu_senha = $r->get('usu_senha');

        $usuario = new Usuario;

        $usuario = $usuario->where('usu_email', $usu_email)->where('usu_senha', $usu_senha)->get()->first();

        if(isset($usuario->usu_nome)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login', ['erro' => true]);
        }
    }
}

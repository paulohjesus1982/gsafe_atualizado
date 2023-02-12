<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {
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
    public function __construct() {
        //
    }

    public function index(Request $r) {

        $msg_erro = '';
        $r->get('erro') ? $msg_erro = "Usuário não encontrado." : '';

        return view('auth/login', ['erro' => $msg_erro]);
    }

    public function autenticar(Request $r) {
        $regras = [
            'email' => 'required',
            'password' => 'required'
        ];

        $feedback = [
            'email.required' => 'O campo e-mail é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.'
        ];

        $r->validate($regras, $feedback);

        $usu_email = $_POST['email'];
        $usu_senha = $_POST['password'];

        $usuario = new Usuario;

        $usuario = $usuario->where('usu_email', $usu_email)->where('usu_senha', $usu_senha)->get()->first();
        if (isset($usuario->usu_nome)) {

            // session_start();
            $usuario_logado = array(
                'usu_nome' => $usuario->usu_nome,
                'usu_email' => $usuario->usu_email,
                'usu_tipo_usuario' => $usuario->usu_tipo_usuario
                );
            Session::put($usuario_logado);

            return redirect()->route('home');
        } else {
            return redirect()->route('login', ['erro' => true]);
        }
    }

    public function deslogar() {

        Session::forget(['usu_nome', 'usu_email', 'usu_tipo_usuario']);
        Auth::logout();
        return redirect()->route('login');
    }
}

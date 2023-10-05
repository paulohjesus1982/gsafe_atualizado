<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    //acabei nao usando
    protected function validator(array $data) {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    //acabei nao usando
    protected function create(array $data) {
        return Usuario::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function index(Request $r) {

        // $msg_erro = '';
        // $r->get('erro') ? $msg_erro = "Usuário não encontrado." : '';

        return view('auth/register', []);
    }

    public function autenticar(Request $r) {

        $regras = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ];

        $feedback = [
            'name.required' => 'Preencha o nome',
            'email.required' => 'Preencha o email',
            'password.required' => 'Preencha a senha',
            'password.confirmed' => 'Senhas digitadas diferentes',
        ];

        $r->validate($regras, $feedback);

        $inserir_usuario = array();
        $inserir_usuario['usu_nome'] = $_POST['name'];
        $inserir_usuario['usu_email'] = $_POST['email'];
        $inserir_usuario['usu_senha'] = $_POST['password'];
        $inserir_usuario['usu_criado_em'] = 'NOW()';
        $inserir_usuario['usu_atualizado_em'] = NULL;
        $inserir_usuario['usu_tipo_usuario'] = 2;

        $result = Usuario::create($inserir_usuario);

        return redirect('/');
    }
}

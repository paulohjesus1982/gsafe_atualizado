<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usuario;

class UsuarioController extends Controller {
    //
    public function __construct() {
        //ativo
    }

    public function index() {
        $usuario = User::paginate('20');

        return view('usuario/listar')
            ->with('usuario', $usuario)
            ->with('title', $usuario);
    }

    public function Cadastrar() {
        return view('usuario/cadastrar')
            ->with('title', 'Cadastrar Usuário');
    }

    public function save(Request $request) {
        $this->_validate($request);

        $request->merge(['usuario_id' => session('user_logged')['id']]);

        $result = User::create($request->all());

        if ($result) {
            session()->flash(
                'mensagem_sucesso',
                'Usuario cadastrado com sucesso.'
            );
        } else {
            session()->flash(
                'mensagem_erro',
                'Erro ao cadastrar Usuario.'
            );
        }

        return redirect('/Usuario');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $usuario = Usuario::find($id);

        return view('usuario.editar')->with([
            'usuario' => $usuario,
            'title' => 'Editar usuario',
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_usuario = $request->all();
        $usuario = Usuario::find($atualizar_usuario['codigo_usuario']);
        $usuario['usu_nome'] = $atualizar_usuario['nome_usuario'];
        $usuario['usu_email'] = $atualizar_usuario['email_usuario'];
        $usuario['usu_senha'] = $atualizar_usuario['senha_usuario'];
        $usuario['usu_tipo_usuario'] = $atualizar_usuario['tipo_usuario'];
        $usuario['usu_atualizado_em'] = 'NOW()';

        $result = $usuario->save();

        if ($result) {
            //Tentando usar sweetalert
            //Alert::success('Usuário atualizado', 'Usuário atualizado com sucesso.');

            return redirect()->route('usuario.listar');
        }else{
            //Tratar Erro
        }
    }

    public function Listar(Request $r) {

        $usuario = Usuario::all();

        return view('usuario.listar', [
            'usuarios' => $usuario
        ]);
    }
}

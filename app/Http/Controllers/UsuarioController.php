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
        $usuarios = User::paginate('20');

        return view('usuario/listar')
            ->with('usuarios', $usuarios)
            ->with('title', $usuarios);
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
        $equipe = Usuario::find($atualizar_usuario['codigo_usuario']);
        
        $equipe['usu_nome'] = $atualizar_equipe['nome_usuario'];
        $equipe['usu_email'] = $atualizar_equipe['email_usuario'];
        $equipe['usu_senha'] = $atualizar_equipe['senha_usuario'];
        $equipe['usu_tipo_usuario'] = $atualizar_equipe['tipo_usuario'];
        $equipe['usu_atualizado_em'] = 'NOW()';
        
        $result = $equipe->save();

        if ($result) {
            //Tentando usar sweetalert
            Alert::success('Usuário atualizado', 'Usuário atualizado com sucesso.');
            
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

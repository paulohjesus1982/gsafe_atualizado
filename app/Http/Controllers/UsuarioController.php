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

    public function edit(User $usuario) {
        return view('usuario/casdastrar')->with([
            'usuario' => $usuario,
            'title' => 'Editar usuario'
        ]);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $usuario = User::find($id);

        $this->_validate($request);

        $usuario->update($request->all());

        $result = $usuario->save();
        if ($result) {
            session()->flash(
                'mensagem_sucesso',
                'usuario editada com sucesso!'
            );
        } else {
            session()->flash('mensagem_erro', 'Erro ao editar usuario!');
        }

        return redirect('/usuario');
    }

    public function Listar(Request $r) {

        $usuario = Usuario::all();

        return view('usuario.listar', [
            'usuarios' => $usuario
        ]);
    }
}

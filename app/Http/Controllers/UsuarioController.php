<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usuario;
use App\Models\UsuariosDado;

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

    public function Salvar(Request $request) {
        // $this->_validate($request);
        // $request->merge(['usuario_id' => session('user_logged')['id']]);
        $data = $request->all();

        $inserir_usuario = array();

        $inserir_usuario['usu_nome'] = $data['nome'];
        $inserir_usuario['usu_email'] = $data['email'];
        $inserir_usuario['usu_senha'] = $data['senha'];
        $inserir_usuario['usu_criado_em'] = 'NOW()';
        $inserir_usuario['usu_tipo_usuario'] = $data['tipo_usuario'];

        $result = Usuario::create($inserir_usuario);
        if ($result) {
            $usu_id = $result->usu_id;
            $inserir_usuario_dados = array();

            $inserir_usuario_dados['udad_nome_completo'] = $data['nome_completo'];
            $inserir_usuario_dados['udad_numero'] = $data['numero_endereco'];
            $inserir_usuario_dados['udad_endereco'] = $data['endereco'];
            $inserir_usuario_dados['udad_bairro'] = $data['bairro'];
            $inserir_usuario_dados['udad_cep'] = $data['cep'];
            $inserir_usuario_dados['udad_cidade'] = $data['cidade'];
            $inserir_usuario_dados['udad_estado'] = $data['estado'];
            $inserir_usuario_dados['udad_telefone_principal'] = $data['numero_principal'];
            $inserir_usuario_dados['udad_telefone_contato'] = $data['numero_contato'];
            $inserir_usuario_dados['udad_registro_profissao'] = $data['registro_profissao'];
            $inserir_usuario_dados['udad_criado_em'] = 'NOW()';
            $inserir_usuario_dados['udad_fk_usu_id'] = $usu_id;

            $result2 = UsuariosDado::create($inserir_usuario_dados);

            if ($result2) {
                return redirect('usuario/listar');
            } else {
                return redirect('usuario/cadastrar');
            }
        } else {
            return redirect('usuario/cadastrar');
        }
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $usuario = Usuario::find($id);
        $usuario['usuario_dados'] = $usuario->DadosDoUsuario;

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
            $usuario_dados = UsuariosDado::find($atualizar_usuario['codigo_dados_usuario']);
            $usu_dados_vazio = is_null($usuario_dados);

            $usuario_dados['udad_nome_completo'] = $atualizar_usuario['nome_completo'];
            $usuario_dados['udad_endereco'] = $atualizar_usuario['endereco'];
            $usuario_dados['udad_numero'] = $atualizar_usuario['numero_endereco'];
            $usuario_dados['udad_cep'] = $atualizar_usuario['cep'];
            $usuario_dados['udad_cidade'] = $atualizar_usuario['cidade'];
            $usuario_dados['udad_bairro'] = $atualizar_usuario['bairro'];
            $usuario_dados['udad_estado'] = $atualizar_usuario['estado'];
            $usuario_dados['udad_telefone_principal'] = $atualizar_usuario['numero_principal'];
            $usuario_dados['udad_telefone_contato'] = $atualizar_usuario['numero_contato'];
            $usuario_dados['udad_registro_profissao'] = $atualizar_usuario['registro_profissao'];
            $usuario_dados['udad_atualizado_em'] = 'NOW()';

            if ($usu_dados_vazio) {
                $usuario_dados['udad_atualizado_em'] = NULL;
                $usuario_dados['udad_criado_em'] = 'NOW()';
                $usuario_dados['udad_fk_usu_id'] = $atualizar_usuario['codigo_usuario'];

                $result2 = UsuariosDado::create($usuario_dados);
            } else {
                $result2 = $usuario_dados->save();
            }

            if ($result2) {
                return redirect()->route('usuario.listar');
            } else {
                return redirect()->route('usuario.editar');
            }
        } else {
            return redirect()->route('usuario.editar');
        }
    }

    public function Listar(Request $r) {

        $usuario = Usuario::all()->sortBy('usu_id');

        return view('usuario.listar', [
            'usuarios' => $usuario
        ]);
    }
}

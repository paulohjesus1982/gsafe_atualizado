<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usuario;
use App\Models\UsuarioDados;

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
        $inserir_usuario_dados = new Usuario();

        /*************************** Usuario Dados  ***************************/

        $inserir_usuario_dados['udad_nome_completo'     ] = $data['nome_completo'];
        $inserir_usuario_dados['udad_numero'            ] = $data['numero_endereco'];
        $inserir_usuario_dados['udad_endereco'          ] = $data['endereco'];
        $inserir_usuario_dados['udad_bairro'            ] = $data['bairro'];
        $inserir_usuario_dados['udad_cep'               ] = $data['cep'];
        $inserir_usuario_dados['udad_cidade'            ] = $data['cidade'];
        $inserir_usuario_dados['udad_estado'            ] = $data['estado'];
        $inserir_usuario_dados['udad_telefone_principal'] = $data['numero_principal'];
        $inserir_usuario_dados['udad_telefone_contato'  ] = $data['numero_contato'];

        /*************************** Usuario        ***************************/
        $inserir_usuario['usu_nome'             ] = $data['nome'];
        $inserir_usuario['usu_email'            ] = $data['email'];
        $inserir_usuario['usu_senha'            ] = $data['senha'];
        $inserir_usuario['usu_criado_em'        ] = 'NOW()';
        $inserir_usuario['usu_atualizado_em'    ] = 'NOW()';
        $inserir_usuario['usu_tipo_usuario'] = $data['tipo_usuario'];
        
        // dd($inserir_usuario);
        $result = Usuario::create($inserir_usuario);
        // $result2 = UsuarioDados::create($inserir_usuario_dados);


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

        return redirect('usuario/listar');
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
            // Alert::success('Usuário atualizado', 'Usuário atualizado com sucesso.');
            
            return redirect()->route('usuario.listar');
        }else{
            //Tratar Erro
        }
    }

    public function Listar(Request $r) {

        $usuario = Usuario::all()->sortBy('usu_id');

        return view('usuario.listar', [
            'usuarios' => $usuario
        ]);
    }
}

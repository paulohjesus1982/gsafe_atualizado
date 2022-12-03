<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissao;

class PermissaoController extends Controller
{
    public function __construct() {
    }

    public function Listar(Request $r) {

        $permissoes = Permissao::all()->sortBy("per_id");;

        return view('permissao.listar', [
            'permissoes' => $permissoes
        ]);
    }

    public function Cadastrar(Request $r) {

        $permissoes = Permissao::all();
        return view('permissao.cadastrar', ['permissoes' => $permissoes]);
    }

    public function Salvar(Request $request) {

        $result = Permissao::create([
            'per_nome' => $request->input('nome_permissao'),
            'per_rgb'  => $request->input('rgb_permissao')
        ]);

        return redirect()->route('permissao.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $permissao = Permissao::find($id);

        return view('permissao.editar')->with([
            'permissao' => $permissao,
            'title' => 'Editar permissao'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_permissao = $request->all();
        $permissao = Permissao::find($atualizar_permissao['codigo_permissao']);
        
        $permissao['per_nome'] = $atualizar_permissao['nome_permissao'];
        $permissao['per_rgb'] = $atualizar_permissao['rgb_permissao'];
        
        $result = $permissao->save();

        if ($result) {
            //Tentando usar sweetalert
            // Alert::success('Equipe Atualizada', 'Equipe foi atualizada com sucesso.');
            
            return redirect()->route('permissao.listar');
        }else{
            //Tratar Erro
        }
    }
}

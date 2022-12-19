<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paralizacao;
use App\Models\Permissao;
use App\Models\Empresa;
use Illuminate\Support\File;

class ParalizacaoController extends Controller
{
    public function __construct() {
    }

    public function Listar(Request $r) {

        $paralizacoes = Paralizacao::all()->sortBy("con_id");
        // $emp = Contrato::all()->Vinculo();

        return view('paralizacao.listar', [
            'paralizacoes' => $paralizacoes
        ]);
    }

    public function Cadastrar(Request $r) {

        $permissao = Permissao::all();
        $paralizacoes = Paralizacao::all()->sortBy("par_id");
        $empresa = Empresa::all()->sortBy("emp_id");

        return view('paralizacao.cadastrar', [
            'empresas' => $empresa,
            'paralizacoes' => $paralizacoes,
            'permissoes' => $permissao
        ]);
    }

    public function Salvar(Request $request) {

        $nova_paralizacao = $request->all();
        $paralizacao['par_justificativa'] = $nova_paralizacao['par_justificativa'];
        $paralizacao['par_observacao'] = $nova_paralizacao['par_observacao'];
        $paralizacao['par_enum_estado_paralizacao'] = $nova_paralizacao['par_enum_estado_paralizacao'];
        $paralizacao['par_fk_emp_id'] = $nova_paralizacao['par_fk_emp_id'];
        $paralizacao['par_art'] = $nova_paralizacao['par_art'];
        $paralizacao['par_pet'] = $nova_paralizacao['par_pet'];
        $paralizacao['par_fk_per_id'] = $nova_paralizacao['par_fk_per_id'];
        $paralizacao['par_caminho_anexo'] = 'NULL';
        // $paralizacao['par_caminho_anexo'] = $nova_paralizacao['par_caminho_anexo']->store("img",'public');;

        $result = Paralizacao::create($paralizacao);

        return redirect()->route('paralizacao.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;

        $paralizacao = Paralizacao::find($id);
        $permissao = Permissao::all();
        $empresa = Empresa::all()->sortBy("emp_id");
// dd($empresa->emp_id);
        return view('paralizacao.editar')->with([
            'paralizacao' => $paralizacao,
            'empresas' => $empresa,
            'permissoes' => $permissao,
            'title' => 'Editar Paralizacao'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_paralizacao = $request->all();

        $paralizacao = Paralizacao::find($atualizar_paralizacao['par_id']);
        $paralizacao['par_justificativa'] = $atualizar_paralizacao['par_justificativa'];
        $paralizacao['par_observacao'] = $atualizar_paralizacao['par_observacao'];
        $paralizacao['par_enum_estado_paralizacao'] = $atualizar_paralizacao['par_enum_estado_paralizacao'];
        $paralizacao['par_fk_emp_id'] = $atualizar_paralizacao['par_fk_emp_id'];
        $paralizacao['par_art'] = $atualizar_paralizacao['par_art'];
        $paralizacao['par_pet'] = $atualizar_paralizacao['par_pet'];
        $paralizacao['par_caminho_anexo'] = 'NULL';
        // $paralizacao['par_caminho_anexo'] = $atualizar_paralizacao['par_caminho_anexo'];
        $paralizacao['par_fk_per_id'] = $atualizar_paralizacao['par_fk_per_id'];


        $result = $paralizacao->save();

        if ($result) {
            //Tentando usar sweetalert
            // Alert::success('Equipe Atualizada', 'Equipe foi atualizada com sucesso.');

            return redirect()->route('paralizacao.listar');
        }else{
            //Tratar Erro
        }
    }

    public function Mostrar(Request $request) {

        return view('paralizacao.mostrar');
    }
}

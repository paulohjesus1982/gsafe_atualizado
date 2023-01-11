<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paralizacao;
use App\Models\Permissao;
use App\Models\Empresa;
use App\Models\Equipe;
use Illuminate\Support\File;

class ParalizacaoController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $paralizacoes = Paralizacao::all()->sortBy("par_id");

        return view('paralizacao.listar', [
            'paralizacoes' => $paralizacoes
        ]);
    }

    public function Cadastrar(Request $r) {

        $empresa = Empresa::all()->sortBy("emp_id");
        $equipe = Equipe::all()->sortBy("equ_id");

        return view('paralizacao.cadastrar', [
            'empresas' => $empresa,
            'equipes' => $equipe,
        ]);
    }

    public function Salvar(Request $request) {

        $nova_paralizacao = $request->all();
        $paralizacao['par_justificativa'] = $nova_paralizacao['par_justificativa'];
        $paralizacao['par_observacao'] = $nova_paralizacao['par_observacao'];
        $paralizacao['par_enum_estado_paralizacao'] = $nova_paralizacao['par_enum_estado_paralizacao'];
        $paralizacao['par_fk_emp_id'] = $nova_paralizacao['par_fk_emp_id'];
        $paralizacao['par_fk_equ_id'] = $nova_paralizacao['par_fk_equ_id'];
        $paralizacao['par_art'] = $nova_paralizacao['par_art'];
        $paralizacao['par_pet'] = $nova_paralizacao['par_pet'];
        $paralizacao['par_criado_em'] = 'NOW()';

        $result = Paralizacao::create($paralizacao);

        return redirect()->route('paralizacao.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;

        $paralizacao = Paralizacao::find($id);
        $paralizacao['empresas'] = $paralizacao->Empresas;
        $paralizacao['equipes'] = $paralizacao->Equipes;

        $empresa = Empresa::all()->sortBy("emp_id");
        $equipe = Equipe::all()->sortBy("equ_id");

        $estados_paralizacao = [
            1 => 'Em Andamento',
            2 => 'Liberacao'
        ];

        return view('paralizacao.editar')->with([
            'paralizacao' => $paralizacao,
            'empresas' => $empresa,
            'equipes' => $equipe,
            'estados_paralizacao' => $estados_paralizacao,
            'selected_empresa' => '',
            'selected_equipe' => '',
            'selected_estado_paralizacao' => '',
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
        $paralizacao['par_fk_emp_id'] = $atualizar_paralizacao['par_fk_emp_id'];
        $paralizacao['par_fk_equ_id'] = $atualizar_paralizacao['par_fk_equ_id'];
        $paralizacao['par_atualizado_em'] = 'NOW()';

        $result = $paralizacao->save();

        if ($result) {
            return redirect()->route('paralizacao.listar');
        } else {
            return redirect()->route('paralizacao.listar');
        }
    }

    public function Mostrar(Request $request) {

        return view('paralizacao.mostrar');
    }
}

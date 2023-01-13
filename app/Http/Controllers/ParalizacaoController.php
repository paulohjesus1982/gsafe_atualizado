<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paralizacao;
use App\Models\Permissao;
use App\Models\PermissoesPremissa;
use App\Models\Premissa;
use App\Models\PermissoesParalizacao;
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

    public function VerImagemPremissa(Request $r) {

        $paralizacoes = Paralizacao::all()->sortBy("par_id");

        return view('paralizacao.ver_imagem_premissa', [
            'paralizacoes' => $paralizacoes
        ]);
    }

    public function FecharPremissa(Request $r) {

        $premissa = Premissa::find($r->id);

        return view('paralizacao.fechar_premissa', [
            'premissa' => $premissa
        ]);
    }

    public function ListarPermissao(Request $r) {

        $paralizacao = Paralizacao::find($r->id);
        $permissoes_paralizacao = $paralizacao->Permissoes;
        $per = new Permissao;
        $permissao = array();
        $permissoes = array();
        $premissas = array();

        foreach ($permissoes_paralizacao as $key => $permissoes_) {
            $permissao = $per->where('per_id', $permissoes_->ppar_fk_per_id)->get();
            $permissoes[$key] = $permissao[0];
        }

        foreach ($permissoes as $key => $permissao) {
            $j = 0;
            $permissao_premissas = PermissoesPremissa::where('ppre_fk_per_id', $permissao->per_id)->get();
            foreach ($permissao_premissas as $key => $premissa) {
                $premissa_busca = Premissa::where('pre_id', $premissa->ppre_fk_pre_id)->get();
                $premissas[$premissa->ppre_fk_per_id][$j] = $premissa_busca[0];
                $j++;
            }
        }

        return view('paralizacao.listar_permissao', [
            'paralizacao' => $paralizacao,
            'permissoes' => $permissoes,
            'premissas' => $premissas,
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

    public function CadastrarPermissao(Request $r) {

        $id = $r->id;

        $paralizacao = Paralizacao::find($id);
        $permissoes = Permissao::all();

        return view('paralizacao.cadastrar_permissao', [
            'paralizacao' => $paralizacao,
            'permissoes' => $permissoes,
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

    public function CadastrarFechamentoPremissa(Request $request) {

        $nova_paralizacao = $request->all();

        // Handle File Upload
        if ($request->hasFile('img_premissa')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img_premissa')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img_premissa')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('img_premissa')->storeAs('public/img_premissa', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        return redirect()->route('paralizacao.listar');
    }

    public function SalvarPermissao(Request $request) {

        $paralizacao = $request->all();

        $par_id = $paralizacao['par_id'];

        foreach ($paralizacao['permissoes'] as $key => $permissao) {
            $permissoes_paralizacao['ppar_fk_par_id'] = $par_id;
            $permissoes_paralizacao['ppar_fk_per_id'] = $permissao;

            $result = PermissoesParalizacao::create($permissoes_paralizacao);
        }

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

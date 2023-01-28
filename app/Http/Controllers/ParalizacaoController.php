<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paralizacao;
use App\Models\Permissao;
use App\Models\PermissoesPremissa;
use App\Models\Premissa;
use App\Models\PermissoesParalizacao;
use App\Models\ParalizacoesPremissa;
use App\Models\Empresa;
use App\Models\Equipe;
use Illuminate\Support\File;

class ParalizacaoController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $paralizacoes = Paralizacao::all()->sortBy("par_id");

        $par = new Paralizacao();

        return view('paralizacao.listar', [
            'paralizacoes' => $paralizacoes,
            'par' => $par,
        ]);
    }

    public function VerImagemPremissa(Request $r) {

        $premissa = Premissa::find($r->id_pre);
        $paralizacoes_premissa = array();
        $paralizacoes_premissa = ParalizacoesPremissa::where('ppre_fk_pre_id', $r->id_pre)->where('ppre_fk_par_id', $r->id_par)->get();

        return view('paralizacao.ver_imagem_premissa', [
            'premissa' => $premissa,
            'paralizacoes_premissa' => $paralizacoes_premissa,
        ]);
    }

    public function FecharPremissa(Request $r) {

        $premissa = Premissa::find($r->id_pre);

        return view('paralizacao.fechar_premissa', [
            'premissa' => $premissa,
            'par_id' => $r->id_par,
            'per_id' => $r->id_per,
            'pre_id' => $r->id_pre,
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

        // $empresa = Empresa::all()->sortBy("emp_id");
        $empresa = Empresa::where('emp_enum_tipo_empresa', 2)->get();

        return view('paralizacao.cadastrar', [
            'empresas' => $empresa,
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
        $paralizacao['par_enum_estado_paralizacao'] = $nova_paralizacao['par_enum_estado_paralizacao'];
        $paralizacao['par_fk_emp_id'] = $nova_paralizacao['par_fk_emp_id'];
        $paralizacao['par_art'] = $nova_paralizacao['par_art'];
        $paralizacao['par_pet'] = $nova_paralizacao['par_pet'];
        $paralizacao['par_criado_em'] = 'NOW()';

        $result = Paralizacao::create($paralizacao);

        return redirect()->route('paralizacao.listar');
    }

    public function CadastrarFechamentoPremissa(Request $request) {

        $dados = $request->all();
        // $premissa = Premissa::find($dados['id_pre']);
        //url_arquivo = storage/img_premissa/nomearquivo.extensao

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

            if ($path) {
                $paralizacoes_premissas = array();

                $paralizacoes_premissas['ppre_fk_par_id'] = $dados['id_par'];
                $paralizacoes_premissas['ppre_fk_pre_id'] = $dados['id_pre'];
                $paralizacoes_premissas['ppre_caminho_anexo'] = "storage/img_premissa/" . $fileNameToStore;

                $result = ParalizacoesPremissa::create($paralizacoes_premissas);
            }
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

        // $empresa = Empresa::all()->sortBy("emp_id");
        $empresa = Empresa::where('emp_enum_tipo_empresa', 2)->get();

        $estados_paralizacao = [
            1 => 'Em Andamento',
            2 => 'Liberacao'
        ];

        return view('paralizacao.editar')->with([
            'paralizacao' => $paralizacao,
            'empresas' => $empresa,
            'estados_paralizacao' => $estados_paralizacao,
            'selected_empresa' => '',
            'selected_estado_paralizacao' => '',
            'title' => 'Editar Paralizacao'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_paralizacao = $request->all();

        $paralizacao = Paralizacao::find($atualizar_paralizacao['par_id']);
        $paralizacao['par_enum_estado_paralizacao'] = $atualizar_paralizacao['par_enum_estado_paralizacao'];
        $paralizacao['par_fk_emp_id'] = $atualizar_paralizacao['par_fk_emp_id'];
        $paralizacao['par_art'] = $atualizar_paralizacao['par_art'];
        $paralizacao['par_pet'] = $atualizar_paralizacao['par_pet'];
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

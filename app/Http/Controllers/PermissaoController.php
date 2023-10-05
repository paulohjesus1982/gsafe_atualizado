<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissao;
use App\Models\Premissa;
use App\Models\PermissoesPremissa;

class PermissaoController extends Controller
{
    public function __construct()
    {
    }

    public function Listar(Request $r)
    {

        $permissoes = Permissao::all()->sortBy("per_id");;

        return view('permissao.listar', [
            'permissoes' => $permissoes
        ]);
    }

    public function DesvioListar(Request $r)
    {

        return view('desvio.listar');
    }

    public function Cadastrar(Request $r)
    {

        $premissa = Premissa::all();
        return view('permissao.cadastrar', ['premissas' => $premissa]);
    }

    public function Salvar(Request $request)
    {

        $dados = $request->all();

        $result = Permissao::create([
            'per_nome' => $request->input('nome_permissao'),
            'per_rgb'  => $request->input('rgb_permissao'),
            'per_criado_em'  => 'NOW()',
        ]);

        $id_permissao = $result->per_id;

        foreach ($dados['premissas'] as $key => $premissa) {
            $permissoes_premissas = array();

            $permissoes_premissas['ppre_fk_per_id'] = $id_permissao;
            $permissoes_premissas['ppre_fk_pre_id'] = $premissa;

            $result = PermissoesPremissa::create($permissoes_premissas);
        }
        return redirect()->route('permissao.listar');
    }

    public function Editar(Request $request)
    {

        $id = $request->id;
        $permissao = Permissao::find($id);
        $permissoes_premissas = $permissao->Premissas;
        $todas_premissas = Premissa::all();
        $premissas = array();
        $selected = '';

        foreach ($permissoes_premissas as $key => $permissao_premissa) {
            $premissa = Premissa::where('pre_id', $permissao_premissa->ppre_fk_pre_id)->get();
            $premissas[$key] = $premissa;
        }

        return view('permissao.editar')->with([
            'permissao' => $permissao,
            'premissas' => $premissas,
            'todas_premissas' => $todas_premissas,
            'selected' => $selected,
            'title' => 'Editar permissao'
        ]);
    }

    public function Atualizar(Request $request)
    {

        $atualizar_permissao = $request->all();
        $permissao = Permissao::find($atualizar_permissao['codigo_permissao']);

        $permissao['per_nome'] = $atualizar_permissao['nome_permissao'];
        $permissao['per_rgb'] = $atualizar_permissao['rgb_permissao'];
        $permissao['per_atualizado_em'] = 'NOW()';

        $result = $permissao->save();

        if ($result) {
            if (isset($atualizar_permissao['premissas'])) {
                $array_coringa = array();
                $array_coringa = $atualizar_permissao['premissas'];

                //remover o que n�o veio na equipe
                $premissas_da_permissao_atual = PermissoesPremissa::where('ppre_fk_per_id', $atualizar_permissao['codigo_permissao'])->get();
                foreach ($premissas_da_permissao_atual as $key => $premissa_atual) {
                    $ppre_id = $premissa_atual->ppre_id;
                    if (!in_array($ppre_id, $array_coringa)) {
                        $deleted = PermissoesPremissa::where('ppre_id', $ppre_id)->delete();
                    }
                }

                //inserir o que veio na equipe e n�o existia antes
                foreach ($atualizar_permissao['premissas'] as $key => $premissa) {
                    $premissas_da_permissao_atual = PermissoesPremissa::where([
                        ['ppre_fk_per_id', '=', $atualizar_permissao['codigo_permissao']],
                        ['ppre_fk_pre_id', '=', $premissa],
                    ])->get();

                    if (!isset($premissas_da_permissao_atual[0])) {

                        $permissoes_premissa = array();

                        $permissoes_premissa['ppre_fk_per_id'] = $atualizar_permissao['codigo_permissao'];
                        $permissoes_premissa['ppre_fk_pre_id'] = $premissa;

                        $result = PermissoesPremissa::create($permissoes_premissa);
                    }
                }
            }
        }

        if ($result) {
            return redirect()->route('permissao.listar');
        } else {
            return redirect()->route('permissao.listar');
        }
    }
}

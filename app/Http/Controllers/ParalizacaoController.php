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
use App\Models\Servico;
use App\Models\ServicoParalizacaoPermissaoPremissa;
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

    public function Mostrar(Request $r) {
        return view('paralizacao.mostrar');
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
            'request' => $r,
        ]);
    }

    public function ListarPermissao(Request $r) {

        $paralizacao = Paralizacao::find($r->id);
        $permissoes_paralizacao = $paralizacao->Permissoes;
        $per = new Permissao;
        $permissao = array();
        $permissoes = array();
        $premissas = array();
        $par = new Paralizacao();

        $servico_paralizacao_permissao_premissa = ServicoParalizacaoPermissaoPremissa::where("spppre_fk_par_id", $paralizacao->par_id)->get();
        $servico = Servico::find($servico_paralizacao_permissao_premissa[0]->spppre_fk_ser_id);

        foreach ($permissoes_paralizacao as $key => $permissoes_) {
            $permissao = $per->where('per_id', $permissoes_->ppar_fk_per_id)->get();
            $permissoes[$key] = $permissao[0];
        }

        foreach ($permissoes as $key => $permissao) {
            $j = 0;
            $permissao_premissas = PermissoesPremissa::where('ppre_fk_per_id', $permissao->per_id)->get();
            foreach ($permissao_premissas as $key => $premissa) {
                $premissa_busca = Premissa::where('pre_id', $premissa->ppre_fk_pre_id)->get();

                $verifica_se_pertence = ServicoParalizacaoPermissaoPremissa::where("spppre_fk_par_id", $paralizacao->par_id)->where("spppre_fk_pre_id", $premissa_busca[0]->pre_id)->where("spppre_fk_per_id", $permissao->per_id)->get();

                if (count($verifica_se_pertence) > 0) {
                    $premissas[$premissa->ppre_fk_per_id][$j] = $premissa_busca[0];
                    $j++;
                }
            }
        }

        return view('paralizacao.listar_permissao', [
            'par' => $par,
            'paralizacao' => $paralizacao,
            'permissoes' => $permissoes,
            'premissas' => $premissas,
            'servico' => $servico,
        ]);
    }

    public function ListarPermissaoPremissa(Request $r) {

        $paralizacao = Paralizacao::find($r->id);
        $permissoes_paralizacao = $paralizacao->Permissoes;
        $per = new Permissao;

        $permissao = $per->where('per_id', $permissoes_paralizacao->ppar_fk_per_id)->get();

        $permissao_premissas = PermissoesPremissa::where('ppre_fk_per_id', $permissao[0]->per_id)->get();

        $j = 0;
        foreach ($permissao_premissas as $key => $premissa) {
            $premissa_busca = Premissa::where('pre_id', $premissa->ppre_fk_pre_id)->get();
            $premissas[$j] = $premissa_busca[0];
            $j++;
        }

        return [
            'paralizacao' => $paralizacao,
            'permissao' => $permissao[0],
            'premissas' => $premissas,
        ];
    }

    public function Cadastrar(Request $r) {

        $empresa = Empresa::all();
        $servicos = Servico::all();
        $permissoes = Permissao::all();

        return view('paralizacao.cadastrar', [
            'empresas' => $empresa,
            'servicos' => $servicos,
            'permissoes' => $permissoes,
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
        $paralizacao['par_art_img'] = $request->hasFile('img_art') ? $this->CadastrarImgART($request) : '';
        $paralizacao['par_pet'] = $nova_paralizacao['par_pet'];
        $paralizacao['par_pet_img'] = $request->hasFile('img_pet') ? $this->CadastrarImgPET($request) : '';
        $paralizacao['par_criado_em'] = 'NOW()';

        $result = Paralizacao::create($paralizacao);

        if (count($nova_paralizacao['premissas']) > 0) {

            foreach ($nova_paralizacao['premissas'] as $key => $premissa) {

                $premissa_permissao = explode("_", $premissa);

                $servico_paralizacao_permissao_premissa['spppre_fk_par_id'] = $result->par_id;
                $servico_paralizacao_permissao_premissa['spppre_fk_ser_id'] = $nova_paralizacao['servico'];
                $servico_paralizacao_permissao_premissa['spppre_fk_pre_id'] = $premissa_permissao[0];
                $servico_paralizacao_permissao_premissa['spppre_fk_per_id'] = $premissa_permissao[1];

                $result2 = ServicoParalizacaoPermissaoPremissa::create($servico_paralizacao_permissao_premissa);

                $verifica_duplicidade_permissoes_paralizacao = PermissoesParalizacao::where("ppar_fk_par_id", $result->par_id)->where("ppar_fk_per_id", $premissa_permissao[1])->get();

                if (count($verifica_duplicidade_permissoes_paralizacao) == 0) {
                    $permissoes_paralizacao['ppar_fk_par_id'] = $result->par_id;
                    $permissoes_paralizacao['ppar_fk_per_id'] = $premissa_permissao[1];
                    $result3 = PermissoesParalizacao::create($permissoes_paralizacao);
                }

                $verifica_duplicidade_premissas_paralizacao = ParalizacoesPremissa::where("ppre_fk_par_id", $result->par_id)->where("ppre_fk_pre_id", $premissa_permissao[0])->get();

                if (count($verifica_duplicidade_premissas_paralizacao) == 0) {
                    $paralizacoes_premissas['ppre_fk_par_id'] = $result->par_id;
                    $paralizacoes_premissas['ppre_fk_pre_id'] = $premissa_permissao[0];
                    $result4 = ParalizacoesPremissa::create($paralizacoes_premissas);
                }
            }
        }

        return redirect()->route('paralizacao.listar');
    }

    public function CadastrarFechamentoPremissa(Request $request) {

        $dados = $request->all();
        // $premissa = Premissa::find($dados['id_pre']);
        //url_arquivo = storage/img_premissa/nomearquivo.extensao
        // echo "<pre>";
        // print_r($dados);
        // echo "</pre>";
        // die();
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

                $encontra_paralizacoes_premissas = new ParalizacoesPremissa();
                $encontra_paralizacoes_premissas = ParalizacoesPremissa::where("ppre_fk_par_id", $dados['id_par'])->where("ppre_fk_pre_id", $dados['id_pre'])->get();

                if (count($encontra_paralizacoes_premissas) > 0) {
                    $encontra_paralizacoes_premissas[0]['ppre_caminho_anexo'] = "storage/img_premissa/" . $fileNameToStore;
                    $encontra_paralizacoes_premissas[0]['ppre_status'] = 0;
                    $encontra_paralizacoes_premissas[0]['ppre_finalizado_em'] = 'NOW()';

                    $result = $encontra_paralizacoes_premissas[0]->save();
                } else {
                    $paralizacoes_premissas['ppre_fk_par_id'] = $dados['id_par'];
                    $paralizacoes_premissas['ppre_fk_pre_id'] = $dados['id_pre'];
                    $paralizacoes_premissas['ppre_caminho_anexo'] = "storage/img_premissa/" . $fileNameToStore;
                    $paralizacoes_premissas['ppre_status'] = 0;

                    $result = ParalizacoesPremissa::create($paralizacoes_premissas);
                }

                $consulta_todas_paralizacoes_premissa = ParalizacoesPremissa::where("ppre_fk_par_id", $dados['id_par'])->where("ppre_status", 1)->get();

                if (count($consulta_todas_paralizacoes_premissa) == 0) {
                    $paralizacao_fecha = Paralizacao::find($dados['id_par']);

                    $paralizacao_fecha['par_enum_estado_paralizacao'] = 1;

                    $paralizacao_fecha->save();
                }
            }
        } else {
            $fileNameToStore = 'noimage.png';
        }


        return redirect()->route('paralizacao.listar');
    }

    public function CadastrarImgART(Request $request) {

        // Handle File Upload
        if ($request->hasFile('img_art')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img_art')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img_art')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('img_art')->storeAs('public/img_art', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        if ($fileNameToStore == "noimage.png") {
            return null;
        } else {
            return "storage/img_art/" . $fileNameToStore;
        }
    }

    public function CadastrarImgPET(Request $request) {

        // Handle File Upload
        if ($request->hasFile('img_pet')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img_pet')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img_pet')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('img_pet')->storeAs('public/img_pet', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        if ($fileNameToStore == "noimage.png") {
            return null;
        } else {
            return "storage/img_pet/" . $fileNameToStore;
        }
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
        $par = new Paralizacao();
        $todas_permissoes = Permissao::all();
        $todas_premissas = Premissa::all();

        // echo '<pre>';
        // print_r($paralizacao);
        // echo '</pre>';
        // die();

        $servico_paralizacao_permissao_premissa = ServicoParalizacaoPermissaoPremissa::where("spppre_fk_par_id", $paralizacao->par_id)->get();
        $servico = Servico::find($servico_paralizacao_permissao_premissa[0]->spppre_fk_ser_id);

        $i = $j = 0;
        foreach ($servico_paralizacao_permissao_premissa as $key => $spppre) {
            $j = 0;
            $permissao = Permissao::find($spppre->spppre_fk_per_id);
            $premissa = Premissa::find($spppre->spppre_fk_pre_id);
            $permissoes[$i] = $permissao;
            $j++;
            $premissas[$spppre->spppre_fk_per_id][$i] = $premissa;
            $i++;
        }

        $estados_paralizacao = [
            1 => 'Em Andamento',
            2 => 'Liberacao'
        ];

        return view('paralizacao.editar')->with([
            'paralizacao' => $paralizacao,
            'par' => $par,
            'servico' => $servico,
            'estados_paralizacao' => $estados_paralizacao,
            'todas_permissoes' => $todas_permissoes,
            'todas_premissas' => $todas_premissas,
            'permissoes' => $permissoes,
            'premissas' => $premissas,
            'selected_estado_paralizacao' => '',
            'title' => 'Editar Paralizacao'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_paralizacao = $request->all();

        // echo '<pre>';
        // print_r($atualizar_paralizacao);
        // echo '</pre>';
        // die();
        //se vier um 3_ na premissas[] � devido ao fato de ter selecionado uma op��o que montou inicialmente na tela e que n�o era selecionada (pode ocorrer)
        //ent�o para resolver esse bo eu s� procuro a permissao vinculada a essa premissa, e pego o id dela T� D�

        $paralizacao = Paralizacao::find($atualizar_paralizacao['par_id']);
        $paralizacao['par_enum_estado_paralizacao'] = $atualizar_paralizacao['par_enum_estado_paralizacao'];
        $paralizacao['par_art'] = $atualizar_paralizacao['par_art'];
        $paralizacao['par_art_img'] = $request->hasFile('img_art') ?  $this->CadastrarImgART($request) : $atualizar_paralizacao['img_art_antigo'];
        $paralizacao['par_pet'] = $atualizar_paralizacao['par_pet'];
        $paralizacao['par_pet_img'] = $request->hasFile('img_pet') ? $this->CadastrarImgPET($request) : $atualizar_paralizacao['img_art_antigo'];
        $paralizacao['par_atualizado_em'] = 'NOW()';

        $result = $paralizacao->save();

        if (count($atualizar_paralizacao['premissas']) > 0) {

            // $deleted = EquipeMembro::where('emem_id', $emem_id)->delete();
            $deleted_1 = ServicoParalizacaoPermissaoPremissa::where("spppre_fk_par_id", $atualizar_paralizacao['par_id'])->delete();
            $deleted_2 = PermissoesParalizacao::where("ppar_fk_par_id", $atualizar_paralizacao['par_id'])->delete();
            $deleted_3 = ParalizacoesPremissa::where("ppre_fk_par_id", $atualizar_paralizacao['par_id'])->delete();

            foreach ($atualizar_paralizacao['premissas'] as $key => $premissa) {

                $premissa_permissao = explode("_", $premissa);

                $servico_paralizacao_permissao_premissa['spppre_fk_par_id'] = $atualizar_paralizacao['par_id'];
                $servico_paralizacao_permissao_premissa['spppre_fk_ser_id'] = $atualizar_paralizacao['ser_id'];
                $servico_paralizacao_permissao_premissa['spppre_fk_pre_id'] = $premissa_permissao[0];
                if ($premissa_permissao[1] == '') {
                    //acha a premissa de acordo com a permissao
                    $permissao_premissa_find = PermissoesPremissa::where("ppre_fk_pre_id", $premissa_permissao[0])->get();

                    $premissa_permissao[1] = $permissao_premissa_find[0]->ppre_fk_per_id;
                }
                $servico_paralizacao_permissao_premissa['spppre_fk_per_id'] = $premissa_permissao[1];

                $result2 = ServicoParalizacaoPermissaoPremissa::create($servico_paralizacao_permissao_premissa);

                $verifica_duplicidade_permissoes_paralizacao = PermissoesParalizacao::where("ppar_fk_par_id", $atualizar_paralizacao['par_id'])->where("ppar_fk_per_id", $premissa_permissao[1])->get();

                if (count($verifica_duplicidade_permissoes_paralizacao) == 0) {
                    $permissoes_paralizacao['ppar_fk_par_id'] = $atualizar_paralizacao['par_id'];
                    $permissoes_paralizacao['ppar_fk_per_id'] = $premissa_permissao[1];
                    $result3 = PermissoesParalizacao::create($permissoes_paralizacao);
                }

                $verifica_duplicidade_premissas_paralizacao = ParalizacoesPremissa::where("ppre_fk_par_id", $atualizar_paralizacao['par_id'])->where("ppre_fk_pre_id", $premissa_permissao[0])->get();

                if (count($verifica_duplicidade_premissas_paralizacao) == 0) {
                    $paralizacoes_premissas['ppre_fk_par_id'] = $atualizar_paralizacao['par_id'];
                    $paralizacoes_premissas['ppre_fk_pre_id'] = $premissa_permissao[0];
                    $result4 = ParalizacoesPremissa::create($paralizacoes_premissas);
                }
            }
        }

        if ($result) {
            return redirect()->route('paralizacao.listar');
        } else {
            return redirect()->route('paralizacao.listar');
        }
    }
}

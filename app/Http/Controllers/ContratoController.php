<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\AdicionalContrato;
use App\Models\Empresa;
use App\Models\Servico;
use App\Models\ContratosServico;

class ContratoController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $contrato = Contrato::all()->where('con_enum_tipo_contrato', 1)->sortBy("con_id");

        return view('contrato.listar', [
            'contratos' => $contrato
        ]);
    }

    public function ListarAdicional(Request $r) {

        $dados_contrato_principal = $r->id;
        $contrato_principal = Contrato::find($dados_contrato_principal);
        $contrato_principal['empresa'] = $contrato_principal->Empresa;
        $adicionais = $contrato_principal->AdicionalContratos;
        $todos_contrato_adicionais = array();

        foreach ($adicionais as $key => $adicional) {
            $contrato_adicional = Contrato::where('con_id', $adicional->acon_fk_con_codigo_contrato_adicional)->get();
            $todos_contrato_adicionais[$key] = [
                'contrato' => $contrato_adicional[0],
                'empresa' => $contrato_adicional[0]->Empresa
            ];
        }

        return view('contrato.listar_adicional', [
            'contratos_adicionais' => $todos_contrato_adicionais,
            'contrato' => $contrato_principal
        ]);
    }

    public function Cadastrar(Request $r) {

        $empresa = Empresa::all()->sortBy("emp_id");

        return view('contrato.cadastrar', [
            'empresas' => $empresa,
        ]);
    }

    public function CadastrarAdicional(Request $r) {

        $dados_contrato_principal = $r->id;
        $contrato_principal = Contrato::find($dados_contrato_principal);

        $empresa = Empresa::all()->sortBy("emp_id");

        return view("contrato.cadastrar_adicional", [
            'contrato_principal' => $contrato_principal,
            'empresas' => $empresa,
        ]);
    }

    public function CadastrarContratoServico(Request $r) {

        $contrato = Contrato::find($r->id);
        $servicos = Servico::all();

        return view("contrato.cadastrar_servico", [
            'contrato' => $contrato,
            'servicos' => $servicos,
        ]);
    }

    public function ListarContratoServico(Request $r) {

        $contrato = Contrato::find($r->id);
        $contrato_servicos = $contrato->ServicosContrato;
        $servicos = array();

        foreach ($contrato_servicos as $key => $contrato_servico) {
            $servico = Servico::where('ser_id', $contrato_servico->cser_fk_ser_id)->get();
            $servicos[$key] = $servico;
        }

        return view("contrato.listar_servico", [
            'contrato' => $contrato,
            'servicos' => $servicos,
        ]);
    }

    public function Salvar(Request $request) {

        $contrato_novo = $request->all();

        $contrato['con_nome'] = $contrato_novo['nome_contrato'];
        $contrato['con_fk_emp_id'] = $contrato_novo['empresa'];
        $contrato['con_data_inicio_servico'] = $contrato_novo['data_inicio'];
        $contrato['con_data_fim_servico'] = $contrato_novo['data_fim'];
        $contrato['con_enum_tipo_contrato'] = $contrato_novo['tipo_contrato'];
        $contrato['con_criado_em'] = 'NOW()';

        $result = Contrato::create($contrato);

        if ($result && $contrato_novo['id_contrato_original'] && $contrato_novo['nome_contrato_original']) {
            $id_adicional_contrato = $result->con_id;
            $adicional_contrato = array();

            $adicional_contrato['acon_fk_con_codigo_contrato_principal'] = $contrato_novo['id_contrato_original'];
            $adicional_contrato['acon_fk_con_codigo_contrato_adicional'] = $id_adicional_contrato;

            $result = AdicionalContrato::create($adicional_contrato);
        }

        return redirect()->route('contrato.listar');
    }

    public function SalvarContratoServicos(Request $request) {

        $contrato_novo = $request->all();

        $con_id = $contrato_novo['contrato_id'];

        foreach ($contrato_novo['contrato_servicos'] as $key => $servico) {
            $contratos_servico['cser_fk_con_id'] = $con_id;
            $contratos_servico['cser_fk_ser_id'] = $servico;

            $result = ContratosServico::create($contratos_servico);
        }

        return redirect()->route('contrato.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $contrato = Contrato::find($id);
        $contrato['empresas'] = $contrato->Empresa;
        $empresa = Empresa::all()->sortBy("emp_id");
        $selected_empresa = '';

        $tipoContrato = [
            1 => 'Principal',
            2 => 'Sub-Contrato'
        ];

        return view('contrato.editar')->with([
            'contrato' => $contrato,
            'tipoContrato' => $tipoContrato,
            'empresas' => $empresa,
            'selected_empresa' => $selected_empresa,
            'title' => 'Editar Contrato'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_contrato = $request->all();

        $contrato = Contrato::find($atualizar_contrato['codigo_contrato']);

        $contrato['con_nome'] = $atualizar_contrato['nome_contrato'];
        $contrato['con_data_fim_servico'] = $atualizar_contrato['data_fim'];
        $contrato['con_enum_tipo_contrato'] = $atualizar_contrato['tipo_contrato'];
        $contrato['con_atualizado_em'] = 'NOW()';

        $result = $contrato->save();

        if ($result) {
            return redirect()->route('contrato.listar');
        } else {
            return redirect()->route('contrato.listar');
        }
    }

    public function MudarStatus(Request $request) {
        $dados_contrato = $request->all();


        $contrato = Contrato::find($dados_contrato['codigo_contrato']);

        $contrato['con_atualizado_em'] = 'NOW()';
        $contrato['con_status'] = $dados_contrato['status_contrato'] == 1 ? 'Ativo' : 'Inativo';

        $result = $contrato->save();

        if ($result) {
            return redirect()->route('contrato.listar');
        } else {
            return redirect()->route('contrato.listar');
        }
    }
}

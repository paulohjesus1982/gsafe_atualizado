<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Empresa;

class ContratoController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $contrato = Contrato::all()->sortBy("con_id");

        return view('contrato.listar', [
            'contratos' => $contrato
        ]);
    }

    public function Cadastrar(Request $r) {

        $empresa = Empresa::all()->sortBy("emp_id");

        return view('contrato.cadastrar', [
            'empresas' => $empresa,
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

        return redirect()->route('contrato.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $contrato = Contrato::find($id);

        $tipoContrato = [
            1 => 'Principal',
            2 => 'Sub-Contrato'
        ];

        return view('contrato.editar')->with([
            'contrato' => $contrato,
            'tipoContrato' => $tipoContrato,
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
}

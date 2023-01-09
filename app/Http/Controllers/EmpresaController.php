<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $empresas = Empresa::all()->sortBy("emp_id");
        $emp = new Empresa();

        return view('empresa.listar', [
            'empresas' => $empresas,
            'emp' => $emp
        ]);
    }

    public function Cadastrar(Request $r) {
        return view('empresa.cadastrar');
    }

    public function Salvar(Request $request) {

        $empresa = $request->all();
        $teste = $request->session();
        // echo '<pre>';
        // print_r($teste);
        // echo '</pre>';
        // die();
        if (is_null($empresa['nome_empresa'])) {
            return $this->Listar($request);
        }

        $emp = new Empresa();

        $empresa = array();
        $empresa['emp_nome'] = $request->input('nome_empresa');
        $empresa['emp_cnpj'] = $emp->TratarCnpj($request->input('cpnj_empresa'));
        $empresa['emp_razao_social'] = $request->input('razao_social_empresa');
        $empresa['emp_contato'] = $request->input('contato_empresa');
        $empresa['emp_email'] = $request->input('email_empresa');
        $empresa['emp_enum_tipo_empresa'] = $request->input('tipo_empresa');
        $empresa['emp_criado_em'] = 'NOW()';
        // $empresa['emp_atualizado_em'] = 'NOW()';
        // $empresa['emp_fk_usu_id_atualizou'] = 2; // Buscar ID da Sessão

        $result = Empresa::create($empresa);

        return redirect()->route('empresa.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $empresa = Empresa::find($id);
        $empresaFuncao = new Empresa();
        return view('empresa.editar')->with([
            'empresa' => $empresa,
            'empresaFuncao' => $empresaFuncao,
            'tipo_empresa' => $empresa->emp_enum_tipo_empresa,
            'title' => 'Editar Empresa'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_empresa = $request->all();
        $empresa = Empresa::find($atualizar_empresa['codigo_empresa']);
        $emp = new Empresa();

        $empresa['emp_nome'] = $request->input('nome_empresa');
        $empresa['emp_cnpj'] = $emp->TratarCnpj($request->input('cpnj_empresa'));
        $empresa['emp_razao_social'] = $request->input('razao_social_empresa');
        $empresa['emp_contato'] = $request->input('contato_empresa');
        $empresa['emp_email'] = $request->input('email_empresa');
        $empresa['emp_enum_tipo_empresa'] = $request->input('tipo_empresa');

        $result = $empresa->save();

        if ($result) {
            //Tentando usar sweetalert
            // Alert::success('Equipe Atualizada', 'Equipe foi atualizada com sucesso.');

            return redirect()->route('empresa.listar');
        } else {
            //Tratar Erro
        }
    }
}

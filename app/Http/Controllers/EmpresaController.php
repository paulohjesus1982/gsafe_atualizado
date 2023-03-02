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

        $emp = new Empresa();

        $empresa = array();
        $empresa['emp_nome'] = $request->input('nome_empresa');
        $empresa['emp_cnpj'] = $emp->TratarCnpj($request->input('cpnj_empresa'));
        $empresa['emp_razao_social'] = $request->input('razao_social_empresa');
        $empresa['emp_contato'] = $emp->soNumerosFone($request->input('contato_empresa'));
        $empresa['emp_email'] = $request->input('email_empresa');
        $empresa['emp_enum_tipo_empresa'] = $request->input('tipo_empresa');
        $empresa['emp_criado_em'] = 'NOW()';

        $request['cpnj_empresa'] = $empresa['emp_cnpj'];
        $request['contato_empresa'] = $empresa['emp_contato'];

        $regras = [
            'nome_empresa' => 'required',
            'razao_social_empresa' => 'required',
            'cpnj_empresa' => ['required', 'digits:14'],
            'contato_empresa' => ['required', 'numeric'],
            'email_empresa' => 'required',
            'tipo_empresa' => 'required'
        ];

        $feedback = [
            'nome_empresa.required' => 'O campo nome é obrigatório.',
            'razao_social_empresa.required' => 'O campo razão social é obrigatório.',
            'cpnj_empresa.required' => 'O campo cnpj é obrigatório.',
            'contato_empresa.required' => 'O campo contrato é obrigatório.',
            'email_empresa.required' => 'O campo email é obrigatório.',
            'tipo_empresa.required' => 'O campo tipo empresa é obrigatório.',
            'cpnj_empresa.digits' => 'O campo cnpj deverá conter 14 digitos',
            'cpnj_empresa.numeric' => 'O campo cnpj aceita somente números',
            'contato_empresa.numeric' => 'O campo contato aceita somente números',
        ];

        $request->validate($regras, $feedback);

        $result = Empresa::create($empresa);

        return redirect()->route('empresa.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $empresa = Empresa::find($id);
        $empresaFuncao = new Empresa();
        $tipos_de_empresas = [
            '1' => 'Matriz',
            '2' => 'Parceira',
        ];
        $selected = '';

        return view('empresa.editar')->with([
            'empresa' => $empresa,
            'empresaFuncao' => $empresaFuncao,
            'tipo_empresa' => $empresa->emp_enum_tipo_empresa,
            'tipos_de_empresas' => $tipos_de_empresas,
            'selected' => $selected,
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
            return redirect()->route('empresa.listar');
        } else {
            return redirect()->route('empresa.listar');
        }
    }
}

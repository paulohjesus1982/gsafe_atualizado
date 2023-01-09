<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $servicos = Servico::all()->sortBy("ser_id");;

        return view('servicos.listar', [
            'servicos' => $servicos
        ]);
    }

    public function Cadastrar(Request $r) {

        $servico = Servico::all();
        return view('servicos.cadastrar', [
            'servico' => $servico,
        ]);
    }

    public function Salvar(Request $request) {

        $result = Servico::create([
            'ser_nome' => $request->input('nome_servico'),
            'ser_criado_em' => 'NOW()',
        ]);

        return redirect()->route('servicos.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $servico = Servico::find($id);

        return view('servicos.editar')->with([
            'servico' => $servico,
            'title' => 'Editar Serviço'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_servico = $request->all();
        $servico = Servico::find($atualizar_servico['codigo_servico']);

        $servico['ser_nome'] = $atualizar_servico['nome_servico'];
        $servico['ser_atualizado_em'] = 'NOW()';
        $result = $servico->save();

        if ($result) {
            return redirect()->route('servicos.listar');
        } else {
            return redirect()->route('servicos.listar');
        }
    }
}

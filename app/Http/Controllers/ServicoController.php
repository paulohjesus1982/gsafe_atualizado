<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
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
            'ser_nome' => $request->input('nome_servico')
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

        $atualizar_premissa = $request->all();
        $premissa = Servico::find($atualizar_premissa['codigo_servico']);

        $premissa['ser_nome'] = $atualizar_premissa['nome_servico'];        
        $result = $premissa->save();

        if ($result) {
            //Tentando usar sweetalert
            // Alert::success('Equipe Atualizada', 'Equipe foi atualizada com sucesso.');
            
            return redirect()->route('servicos.listar');
        }else{
            //Tratar Erro
        }
    }
}

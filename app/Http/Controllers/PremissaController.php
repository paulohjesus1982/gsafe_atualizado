<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Premissa;
use App\Models\Permissao;

class PremissaController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $premissas = Premissa::all()->sortBy("pre_id");;

        return view('premissa.listar', [
            'premissas' => $premissas
        ]);
    }

    public function ListarUm(Request $request) {

        $id = $request->id;
        $premissas = Premissa::where("pre_fk_per_id", $id)->get();

        return $premissas;
    }

    public function Cadastrar(Request $r) {

        $premissas = Premissa::all();
        $permissoes = Permissao::all()->sortBy("per_id");

        return view('premissa.cadastrar', [
            'premissa' => $premissas,
            'permissoes' => $permissoes
        ]);
    }

    public function Salvar(Request $request) {

        $result = Premissa::create([
            'pre_nome' => $request->input('nome_premissa'),
            'pre_descricao'  => $request->input('premissa_descricao'),
            'pre_fk_per_id' => $request->input('pre_fk_per_id')
        ]);

        return redirect()->route('premissa.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $premissas = Premissa::find($id);
        $permissoes = Permissao::all()->sortBy("per_id");

        return view('premissa.editar')->with([
            'premissas' => $premissas,
            'permissoes' => $permissoes,
            'title' => 'Editar Premissa'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_premissa = $request->all();
        $premissa = Premissa::find($atualizar_premissa['codigo_premissa']);

        $premissa['pre_nome'] = $atualizar_premissa['nome_premissa'];
        $premissa['pre_descricao'] = $atualizar_premissa['premissa_descricao'];
        $premissa['pre_fk_per_id'] = $atualizar_premissa['pre_fk_per_id'];

        $result = $premissa->save();

        if ($result) {
            //Tentando usar sweetalert
            // Alert::success('Equipe Atualizada', 'Equipe foi atualizada com sucesso.');

            return redirect()->route('premissa.listar');
        } else {
            //Tratar Erro
        }
    }
}

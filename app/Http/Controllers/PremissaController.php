<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Premissa;

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

        return view('premissa.cadastrar', [
            'premissa' => $premissas,
        ]);
    }

    public function Salvar(Request $request) {

        $result = Premissa::create([
            'pre_nome' => $request->input('nome_premissa'),
            'pre_descricao'  => $request->input('premissa_descricao'),
            'pre_criado_em'  => 'NOW()',
        ]);

        return redirect()->route('premissa.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $premissas = Premissa::find($id);

        return view('premissa.editar')->with([
            'premissas' => $premissas,
            'title' => 'Editar Premissa'
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_premissa = $request->all();
        $premissa = Premissa::find($atualizar_premissa['codigo_premissa']);

        $premissa['pre_nome'] = $atualizar_premissa['nome_premissa'];
        $premissa['pre_descricao'] = $atualizar_premissa['premissa_descricao'];
        $premissa['pre_atualizado_em'] = 'NOW()';

        $result = $premissa->save();

        if ($result) {
            return redirect()->route('premissa.listar');
        } else {
            return redirect()->route('premissa.listar');
        }
    }
}

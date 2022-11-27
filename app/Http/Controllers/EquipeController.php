<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\EquipeMembro;
use App\Models\Usuario;


class EquipeController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $equipes = Equipe::all();
        $membros = Usuario::all();

        return view('equipes.listar', [
            'equipes' => $equipes,
            'membros' => $membros
        ]);
    }

    public function Cadastrar(Request $r) {

        $usuarios = Usuario::all();
        return view('equipes.cadastrar', ['membros' => $usuarios]);
    }

    public function Salvar(Request $request) {

        $result = Equipe::create([
            'equ_nome' => $request->input('nome_equipe'),
            'equ_criado_em' => 'NOW()',
            'equ_atualizado_em' => 'NOW()',
            'equ_fk_usu_id_atualizou' => 1,
        ]);

        return redirect()->route('equipes.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $equipes = Equipe::find($id);

        return view('equipes.editar')->with([
            'equipes' => $equipes,
            'title' => 'Editar usario',
        ]);
    }

    public function Atualizar(Request $request) {
    }
}

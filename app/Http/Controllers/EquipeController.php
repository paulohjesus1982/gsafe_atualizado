<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\EquipeMembro;
use App\Models\Usuario;
use RealRashid\SweetAlert\Facades\Alert;

class EquipeController extends Controller {
    public function __construct() {
    }

    public function Listar(Request $r) {

        $equipes = Equipe::all()->sortBy("equ_id");
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

        $dados_equipe = $request->all();

        $result = Equipe::create([
            'equ_nome' => $dados_equipe['nome_equipe'],
            'equ_criado_em' => 'NOW()',
        ]);

        $equ_id = $result->equ_id;

        foreach ($dados_equipe['membros_equipe'] as $key => $membro) {
            $equipe_membro = array();

            $equipe_membro['emem_fk_usu_id'] = $membro;
            $equipe_membro['emem_fk_equ_id'] = $equ_id;

            $result = EquipeMembro::create($equipe_membro);
        }

        return redirect()->route('equipes.listar');
    }

    public function Editar(Request $request) {

        $id = $request->id;
        $equipes = Equipe::find($id);
        $membros_equipe = $equipes->Membros;
        $todos_usuarios = Usuario::all();
        $selected = '';

        return view('equipes.editar')->with([
            'equipes' => $equipes,
            'membros' => $membros_equipe,
            'todos_usuarios' => $todos_usuarios,
            'selected' => $selected,
            'title' => 'Editar equipe'
        ]);
    }

    public function Atualizar(Request $request) {
        $atualizar_equipe = $request->all();

        $equipe = Equipe::find($atualizar_equipe['codigo_equipe']);

        $equipe['equ_nome'] = $atualizar_equipe['nome_equipe'];
        $equipe['equ_atualizado_em'] = 'NOW()';

        $result = $equipe->save();

        if ($result) {
            if (isset($atualizar_equipe['membros'])) {
                $array_coringa = array();
                $array_coringa = $atualizar_equipe['membros'];

                //remover o que não veio na equipe
                $membros_equipe_atual = EquipeMembro::where('emem_fk_equ_id', $atualizar_equipe['codigo_equipe'])->get();
                foreach ($membros_equipe_atual as $key => $membro_atual) {
                    $emem_id = $membro_atual->emem_id;
                    if (!in_array($emem_id, $array_coringa)) {
                        $deleted = EquipeMembro::where('emem_id', $emem_id)->delete();
                    }
                }

                //inserir o que veio na equipe e não existia antes
                foreach ($atualizar_equipe['membros'] as $key => $membro) {
                    $equipe_membro_atual = EquipeMembro::where([
                        ['emem_fk_equ_id', '=', $atualizar_equipe['codigo_equipe']],
                        ['emem_fk_usu_id', '=', $membro],
                    ])->get();
                    if (!isset($equipe_membro_atual[0])) {
                        // echo '<pre>';
                        // print_r($membro);
                        // echo '</pre>';

                        $equipe_membro = array();

                        $equipe_membro['emem_fk_usu_id'] = $membro;
                        $equipe_membro['emem_fk_equ_id'] = $atualizar_equipe['codigo_equipe'];

                        $result = EquipeMembro::create($equipe_membro);
                    }
                }
            }
        }
        return redirect()->route('equipes.listar');
    }
}

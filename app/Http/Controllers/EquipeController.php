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

        $equipes = Equipe::all()->sortBy("equ_id");;
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
        $membros_equipe = $equipes->Membros;
        // dd($membros_equipe['usu_id']);

        $usuario_restantes = Usuario::where();

        return view('equipes.editar')->with([
            'equipes' => $equipes,
            'membros' => $membros_equipe,
            'membros_restantes' => $usuarios_restantes,
            'title' => 'Editar equipe',
        ]);
    }

    public function Atualizar(Request $request) {

        $atualizar_equipe = $request->all();
        $equipe = Equipe::find($atualizar_equipe['codigo_equipe']);
        
        $equipe['equ_nome'] = $atualizar_equipe['nome_equipe'];
        $equipe['equ_fk_usu_id_atualizou'] = 2;
        $equipe['equ_atualizado_em'] = 'NOW()';
        
        $result = $equipe->save();

        if ($result) {
            //Tentando usar sweetalert
            Alert::success('Equipe Atualizada', 'Equipe foi atualizada com sucesso.');
            
            return redirect()->route('equipes.listar');
        }else{
            //Tratar Erro
        }
    }
}

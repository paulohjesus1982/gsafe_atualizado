<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Usuario;

class EquipeController extends Controller
{
    public function __construct(){

    }

    public function Listar(Request $r) {

        $qtd_registros = $r->filled('paginate');

        // if($qtd_registros == ''){
        //     $qtd_registros = 20;
        // }

        // $equipes = Equipe::paginate($qtd_registros);
        $equipes = Equipe::all();

        return view('equipes.listar')
            ->with('equipes', $equipes)
            ->with('title',   $equipes);
    }

    public function Cadastrar(Request $r){
        
        $usuarios = Usuario::all();
        return view('equipes.cadastrar', ['membros' => $usuarios]);
    }

public function Salvar(Request $request)
    {
       
        $dados->equ_nome = $request->input('nome_equipe');
        $dados->equ_criado_em = 'NOW()';
        $dados->equ_atualizado_em = 'NOW()';
        $dados->equ_fk_usu_atualizou = 2;
        $result = Equipe::create($dados);
        dd($result);

        return redirect()->route('equipes.listar');
    }
}

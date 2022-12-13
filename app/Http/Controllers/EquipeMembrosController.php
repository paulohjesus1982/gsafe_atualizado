<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Equipe;

class EquipeMembrosController extends Controller {
    public function Listar(Request $r) {
        $equipes = Equipe::find($id);

        return view('equipes.editar')
            ->with('equipes', $equipes)
            ->with('title',   $equipes);
    }
}

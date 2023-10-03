<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipeMembroHistorico;

class EquipeMembroHistoricoController extends Controller
{
    public function Listar()
    {
        $equipes_membros_historico = EquipeMembroHistorico::all()->sortBy("emhis_id");

        return view(
            'equipes_membros_historico.listar',
            compact('equipes_membros_historico')
        );
    }
}

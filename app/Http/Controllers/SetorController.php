<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\GrupoDeDescritivo;
use App\Models\Setor;

class GrupoDeDescritivoController extends Controller
{
    public function Listar()
    {
        $setores = Setor::all();
        return view('setores.listar', compact('setores'));
    }
}

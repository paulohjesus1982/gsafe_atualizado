<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function Listar()
    {
        $areas  = Area::all();
        return view('areas.listar', compact('areas'));
    }
}

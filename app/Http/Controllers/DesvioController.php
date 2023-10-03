<?php

namespace App\Http\Controllers;

use App\Models\Desvio;
use Illuminate\Http\Request;

class DesvioController extends Controller
{
    public function Listar()
    {
        $desvios = Desvio::with([
            'criadoPor',
            'atualizadoPor',
            'area',
            'empresa',
            'setor',
            'grupoDeDesvio',
            'grupoDeDescritivo',
            'servico'
        ])->get();

        return view('desvios.listar', compact('desvios'));
    }

    public function create()
    {
        return view('desvio.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'des_descricao' => 'required',
            // Add more validation rules as needed
        ]);

        // Create and save the record
        Desvio::create($request->all());

        return redirect()->route('desvio.index')->with('success', 'Desvio created successfully.');
    }

    public function edit(Desvio $desvio)
    {
        return view('desvio.edit', compact('desvio'));
    }

    public function update(Request $request, Desvio $desvio)
    {
        // Validation
        $request->validate([
            'des_descricao' => 'required',
            // Add more validation rules as needed
        ]);

        // Update the record
        $desvio->update($request->all());

        return redirect()->route('desvio.index')->with('success', 'Desvio updated successfully.');
    }

    public function destroy(Desvio $desvio)
    {
        $desvio->delete();

        return redirect()->route('desvio.index')->with('success', 'Desvio deleted successfully.');
    }
}

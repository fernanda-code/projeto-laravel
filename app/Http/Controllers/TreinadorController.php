<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treinador;

class TreinadorController extends Controller
{
    public function index()
    {
        $treinadores = Treinador::orderBy('id')
        ->paginate(5)              
        ->withQueryString(); 
        return view('Treinadores.index', compact('treinadores'));
    }

    public function create()
    {
        return view('treinadores.create');
    }

    public function store(Request $request)
    {
        $treinador = new Treinador([
            'nome' => $request->input('nome'),
            'especialidade' => $request->input('especialidade'),
            'telefone' => $request->input('telefone')
        ]);
        $treinador->save();
        return redirect()->route('treinadores.index');
    }

    public function show(string $id)
    {
        $treinador = Treinador::findOrFail($id);
        return view('treinadores.show', ['treinador' => $treinador]);
    }

    public function edit(string $id)
    {
        $treinador = Treinador::findOrFail($id);
        return view('treinadores.edit', compact('treinador'));
    }

    public function update(Request $request, string $id)
    {
        $treinador = Treinador::findOrFail($id);

        $data = $request->validate([
            'nome'            => 'required|string|max:255',
            'especialidade'   => 'nullable|string|max:255',
            'telefone'        => 'nullable|string|max:20',
        ]);

        $treinador->update($data);

        return redirect()
            ->route('treinadores.show', $treinador)
            ->with('success', 'Treinador atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $treinador = Treinador::findOrFail($id);

        $treinador->delete();

        return redirect()->route('treinadores.index');
    }
}

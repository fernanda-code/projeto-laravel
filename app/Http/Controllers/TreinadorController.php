<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treinador;

class TreinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treinadores = Treinador::all();
        return view('Treinadores.index', compact('treinadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('treinadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treinador = Treinador::findOrFail($id);
        return view('treinadores.show', ['treinador' => $treinador]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $treinador = Treinador::findOrFail($id);
        return view('treinadores.edit', compact('treinador'));
    }

    /**
     * Update the specified resource in storage.
     */
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

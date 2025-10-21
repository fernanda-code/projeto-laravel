<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;

class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planos = Plano::all();
        return view('Planos.index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plano = new Plano([
            'nome' => $request->input('nome'),
            'duracao' => $request->input('duracao'),
            'preco' => $request->input('preco')
        ]);
        $plano->save();
        return redirect()->route('planos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plano = Plano::findOrFail($id);
        return view('planos.show', ['plano' => $plano]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plano = Plano::findOrFail($id);
        return view('planos.edit', compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plano = Plano::findOrFail($id);

        $data = $request->validate([
            'nome'     => 'required|string|max:50',
            'duracao'  => 'required|integer|min:1',
            'preco'    => 'required|numeric|min:0',
        ]);

        $plano->update($data);

        return redirect()
            ->route('planos.show', $plano)
            ->with('success', 'Plano atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $plano = Plano::findOrFail($id);

        $plano->delete();

        return redirect()->route('planos.index');
    }
}

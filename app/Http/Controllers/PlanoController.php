<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::orderBy('id')
        ->paginate(5)              
        ->withQueryString();
        return view('Planos.index', compact('planos'));
    }

    public function create()
    {
        return view('planos.create');
    }

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

    public function show(string $id)
    {
        $plano = Plano::findOrFail($id);
        return view('planos.show', ['plano' => $plano]);
    }

    public function edit(string $id)
    {
        $plano = Plano::findOrFail($id);
        return view('planos.edit', compact('plano'));
    }

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('Alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aluno = new Aluno([
            'nome' => $request->input('nome'),
            'dataNasc' => $request->input('dataNasc'),
            'telefone' => $request->input('telefone')
        ]);
        $aluno->save();
        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', ['aluno' => $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $data = $request->validate([
            'nome'            => 'required|string|max:255',
            'dataNasc'        => 'nullable|date',
            'telefone'        => 'nullable|string|max:20',
        ]);


        $aluno->update($data);

        return redirect()
            ->route('alunos.show', $aluno)
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}

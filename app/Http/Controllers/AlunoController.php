<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::orderBy('id')
        ->paginate(5)              
        ->withQueryString(); 
        return view('Alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

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

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', ['aluno' => $aluno]);
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

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

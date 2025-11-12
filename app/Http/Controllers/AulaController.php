<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\Treinador;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::orderBy('id')
        ->paginate(5)              
        ->withQueryString(); 
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        $treinadores = Treinador::all();
        return view('aulas.create', compact('treinadores'));
    }

    public function store(Request $request)
    {
        
        $Aula = new Aula([
            'data' => $request->input('data'),
            'horario' => $request->input('horario'),
            'duracao' => $request->input('duracao'),
            'treinador_id' => $request->input('treinador_id')
        ]);

        $Aula->save();

        // Aula::create($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula criada com sucesso!');
    }

    public function show($id)
    {
        $aula = Aula::with('treinador')->findOrFail($id);
        return view('aulas.show', compact('aula'));
    }

    public function edit($id)
    {
        $aula = Aula::findOrFail($id);
        $treinadores = Treinador::all();
        return view('aulas.edit', compact('aula', 'treinadores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required|date',
            'horario' => 'required',
            'duracao' => 'required',
            'treinador_id' => 'required',
        ]);

        $aula = Aula::findOrFail($id);
        $aula->update($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();

        return redirect()->route('aulas.index')->with('success', 'Aula excluída com sucesso!');
    }
}

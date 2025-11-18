<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AlunoAula;
use App\Models\Aluno;
use App\Models\Aula;

class AlunosAulasController extends Controller
{
    public function index()
    {
        $participacoes = DB::table('alunos_aulas')
           ->join('alunos', 'alunos_aulas.aluno_id', '=', 'alunos.id')
           ->join('aulas', 'alunos_aulas.aula_id', '=', 'aulas.id')
           ->select(
               'alunos_aulas.*',
               'alunos.nome as aluno_nome',
               'aulas.data as aula_data',
               'aulas.horario as aula_horario'
           )
           ->orderBy('aluno_nome')                
           ->paginate(5)                        
           ->withQueryString();                 

        return view('alunos_aulas.index', compact('participacoes'));
    }


    public function create()
    {
        $alunos = Aluno::all();
        $aulas = Aula::all();

        return view('alunos_aulas.create', compact('alunos', 'aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        DB::table('alunos_aulas')->insert($data);

        return redirect()->route('alunos_aulas.index')->with('success', 'Participação registrada.');
    }

    public function destroy($aluno_id, $aula_id)
    {
        DB::table('alunos_aulas')
            ->where('aluno_id', $aluno_id)
            ->where('aula_id', $aula_id)
            ->delete();

        return redirect()->route('alunos_aulas.index')
            ->with('success', 'Participação removida.');
    }


}

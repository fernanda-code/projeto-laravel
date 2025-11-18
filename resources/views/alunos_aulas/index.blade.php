<x-layouts.app>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<div class="container">
    <h1>Participações (Alunos por Aula)</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Data da Aula</th>
                <th>Horário</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($participacoes as $p)
                <tr>
                    <td>{{ $p->aluno_nome }}</td>
                    <td>{{ date('d/m/Y', strtotime($p->aula_data)) }}</td>
                    <td>{{ $p->aula_horario }}</td>
                    <td>
                        <form action="{{ route('alunos_aulas.destroy', [$p->aluno_id, $p->aula_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($participacoes->hasPages())
        <div class="pagination">
            <div class="pagination-info">
                {{ $participacoes->firstItem() }}–{{ $participacoes->lastItem() }}
                de {{ $participacoes->total() }}
            </div>

            <div class="pagination-links">
                {{ $participacoes->links() }}
            </div>
        </div>
    @endif

    <a href="{{ route('alunos_aulas.create') }}" class="btn btn-primary">Adicionar Participação</a>
</div>
</x-layouts.app>

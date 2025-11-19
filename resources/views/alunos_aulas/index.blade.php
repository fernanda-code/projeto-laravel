<x-layouts.app>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<div class="container">
    <div class="header">
        <h1>Participações (Alunos por Aula)</h1>
        <a href="{{ route('alunos_aulas.create') }}" class="btn">Adicionar Participação</a>
    </div>
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
                        <form action="{{ route('alunos_aulas.destroy', [$p->aluno_id, $p->aula_id]) }}" method="POST" class="inline" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button
                                type="button"
                                class="btn-excluir link red"
                                data-nome="Aluno {{ $p->aluno_nome }} na aula do dia {{ date('d/m/Y', strtotime($p->aula_data)) }}">
                                Remover
                            </button>
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
</div>
</x-layouts.app>

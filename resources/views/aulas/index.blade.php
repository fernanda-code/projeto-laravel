<x-layouts.app :title="__('Aulas')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <div class="header">
            <h1>Lista de Aulas</h1>
            <a href="{{ route('aulas.create') }}" class="btn">+ Nova Aula</a>
        </div>

        @if ($aulas->isEmpty())
            <p>Nenhuma aula cadastrada.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Duração</th>
                        <th>Treinador</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aulas as $aula)
                        <tr>
                            <td>{{ $aula->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($aula->data)) }}</td>
                            <td>{{ date('H:i', strtotime($aula->horario)) }}</td>
                            <td>{{ date('H:i', strtotime($aula->duracao)) }}</td>
                            <td>{{ $aula->treinador->nome ?? '—' }}</td>
                            <td>
                                <a href="{{ route('aulas.show', $aula) }}" class="link blue">Ver</a>
                                <a href="{{ route('aulas.edit', $aula) }}" class="link yellow">Editar</a>

                                <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="inline" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn-excluir link red"
                                        data-nome="Aula #{{ $aula->id }}">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                @if ($aulas->hasPages())
                <div class="pagination">
                    <div class="pagination-info">
                        {{ $aulas->firstItem() }}–{{ $aulas->lastItem() }}
                        de {{ $aulas->total() }}
                    </div>

                    <div class="pagination-links">
                        {{ $aulas->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>
</x-layouts.app>

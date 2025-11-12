<x-layouts.app :title="__('Meus Treinadores')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <div class="header">
            <h1>Lista de Treinadores</h1>
            <a href="{{ route('treinadores.create') }}" class="btn">+ Novo Treinador</a>
        </div>

        @if ($treinadores->isEmpty())
            <p>Nenhum treinador cadastrado.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Especialidade</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($treinadores as $treinador)
                        <tr>
                            <td>{{ $treinador->id }}</td>
                            <td>{{ $treinador->nome }}</td>
                            <td>{{ $treinador->especialidade }}</td>
                            <td>{{ $treinador->telefone ?? '-' }}</td>
                            <td>
                                <a href="{{ route('treinadores.show', $treinador) }}" class="link blue">Ver</a>
                                <a href="{{ route('treinadores.edit', $treinador) }}" class="link yellow">Editar</a>

                                <form action="{{ route('treinadores.destroy', $treinador) }}" method="POST" class="inline" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn-excluir link red"
                                        data-nome="{{ $treinador->nome }}">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             @if ($treinadores->hasPages())
                <div class="pagination">
                    <div class="pagination-info">
                        {{ $treinadores->firstItem() }}–{{ $treinadores->lastItem() }}
                        de {{ $treinadores->total() }}
                    </div>

                    <div class="pagination-links">
                        {{ $treinadores->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>
</x-layouts.app>

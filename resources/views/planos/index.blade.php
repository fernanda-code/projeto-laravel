<x-layouts.app :title="__('Meus Planos')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <div class="header">
            <h1>Lista de Planos</h1>
            <a href="{{ route('planos.create') }}" class="btn">+ Novo Plano</a>
        </div>

        @if ($planos->isEmpty())
            <p>Nenhum plano cadastrado.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planos as $plano)
                        <tr>
                            <td>{{ $plano->id }}</td>
                            <td>{{ $plano->nome }}</td>
                            <td>{{ $plano->duracao }} meses</td>
                            <td>R$ {{ number_format($plano->preco, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('planos.show', $plano) }}" class="link blue">Ver</a>
                                <a href="{{ route('planos.edit', $plano) }}" class="link yellow">Editar</a>

                                <form action="{{ route('planos.destroy', $plano) }}" method="POST" class="inline" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn-excluir link red"
                                        data-nome="{{ $plano->nome }}">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layouts.app>

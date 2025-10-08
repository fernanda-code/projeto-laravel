<x-layouts.app :title="__('Meus Alunos')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <div class="header">
            <h1>Lista de Alunos</h1>
            <a href="{{ route('alunos.create') }}" class="btn">+ Novo Aluno</a>
        </div>

        @if ($alunos->isEmpty())
            <p>Nenhum aluno cadastrado.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->id }}</td>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->dataNasc ? \Carbon\Carbon::parse($aluno->dataNasc)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $aluno->telefone ?? '-' }}</td>
                            <td>
                                <a href="{{ route('alunos.show', $aluno) }}" class="link blue">Ver</a>
                                <a href="{{ route('alunos.edit', $aluno) }}" class="link yellow">Editar</a>

                                <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" class="inline" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn-excluir link red"
                                        data-nome="{{ $aluno->nome }}">
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

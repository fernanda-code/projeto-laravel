<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <h1>Aluno {{ $aluno->id }}</h1>

        @if ($aluno->nome)
            <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
        @endif

        @if ($aluno->dataNasc)
            <p><strong>Data de Nascimento:</strong>
                {{ \Carbon\Carbon::parse($aluno->dataNasc)->format('d/m/Y') }}
            </p>
        @else
            <p><strong>Data de Nascimento:</strong> -</p>
        @endif

        @if ($aluno->telefone)
            <p><strong>Telefone:</strong> {{ $aluno->telefone }}</p>
        @else
            <p><strong>Telefone:</strong> -</p>
        @endif

        <div class="form-actions">
            <a href="{{ route('alunos.edit', $aluno) }}" class="btn yellow">Editar</a>
            <a href="{{ route('alunos.index') }}" class="btn gray">Voltar</a>
        </div>
    </div>
</x-layouts.app>

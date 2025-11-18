<x-layouts.app>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<div class="container">
    <h1>Adicionar aluno a uma aula</h1>

    <form action="{{ route('alunos_aulas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="aluno_id">Aluno</label>
            <select name="aluno_id" required>
                <option value="">Selecione um aluno</option>
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="aula_id">Aula</label>
            <select name="aula_id" required>
                <option value="">Selecione uma aula</option>
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->id }}">
                        {{ date('d/m/Y', strtotime($aula->data)) }} - {{ $aula->horario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('alunos_aulas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</x-layouts.app>

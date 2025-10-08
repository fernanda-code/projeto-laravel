<x-layouts.app :title="__('Editar Aluno')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Aluno</h1>

        <form action="{{ route('alunos.update', $aluno) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    value="{{ old('nome', $aluno->nome) }}"
                    required
                >
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="dataNasc">Data de Nascimento</label>
                <input
                    type="date"
                    name="dataNasc"
                    id="dataNasc"
                    value="{{ old('dataNasc', $aluno->dataNasc) }}"
                >
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input
                    type="tel"
                    name="telefone"
                    id="telefone"
                    value="{{ old('telefone', $aluno->telefone) }}"
                >
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('alunos.show', $aluno) }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
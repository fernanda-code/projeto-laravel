<x-layouts.app :title="__('Editar Treinador')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Treinador</h1>

        <form action="{{ route('treinadores.update', $treinador) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    value="{{ old('nome', $treinador->nome) }}"
                    required
                >
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="especialidade">Especialidade</label>
                <input
                    type="text"
                    name="especialidade"
                    id="especialidade"
                    value="{{ old('especialidade', $treinador->especialidade) }}"
                >
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input
                    type="tel"
                    name="telefone"
                    id="telefone"
                    value="{{ old('telefone', $treinador->telefone) }}"
                >
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('treinadores.show', $treinador) }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
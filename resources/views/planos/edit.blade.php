<x-layouts.app :title="__('Editar Plano')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Plano</h1>
        <form action="{{ route('planos.update', $plano) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    value="{{ old('nome', $plano->nome) }}"
                    required
                >
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="duracao">Duração(em meses)</label>
                <input
                    type="number"
                    name="duracao"
                    id="duracao"
                    value="{{ old('duracao', $plano->duracao) }}"
                >
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input
                    type="number"
                    name="preco"
                    id="preco"
                    value="{{ old('preco', $plano->preco) }}"
                >
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('planos.show', $plano) }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
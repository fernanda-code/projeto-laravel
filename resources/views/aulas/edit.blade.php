<x-layouts.app :title="__('Editar Aula')" :dark-mode="auth()->user()->pref_dark_mode">
  <head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">
    <h1>Editar Aula</h1>

    <form action="{{ route('aulas.update', $aula) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="data">Data</label>
        <input
          type="date"
          name="data"
          id="data"
          value="{{ old('data', $aula->Data) }}"
          required
        >
        @error('data') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="horario">Horário</label>
        <input
          type="time"
          name="horario"
          id="horario"
          value="{{ old('horario', $aula->Horario) }}"
          required
        >
        @error('horario') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="duracao">Duração</label>
        <input
          type="time"
          name="duracao"
          id="duracao"
          value="{{ old('duracao', $aula->Duracao) }}"
          required
        >
        @error('duracao') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="idTreinador">Treinador</label>
        <input
          type="number"
          name="idTreinador"
          id="idTreinador"
          value="{{ old('idTreinador', $aula->IdTreinador) }}"
          required
        >
        @error('idTreinador') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="form-actions">
        <button type="submit">Atualizar</button>
        <a href="{{ route('aulas.show', $aula) }}" class="btn gray">Cancelar</a>
      </div>
    </form>
  </div>
</x-layouts.app>

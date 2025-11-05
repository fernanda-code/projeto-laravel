<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <h1>Nova Aula</h1>
            <form action="{{ route('aulas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" name="data" required>
                </div>

                <div class="form-group">
                    <label for="horario">Horário:</label>
                    <input type="time" name="horario" required>
                </div>

                <div class="form-group">
                    <label for="duracao">Duração:</label>
                    <input type="time" name="duracao" required>
                </div>

                <div class="form-group">
                    <label for="treinador_id">Treinador:</label>
                    <select name="treinador_id" required>
                        <option value="">Selecione um treinador</option>
                        @foreach($treinadores as $treinador)
                            <option value="{{ $treinador->id }}">{{ $treinador->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-layouts.app>

<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <h1>Aula {{ $aula->id }}</h1>

        <p><strong>Data:</strong> 
            {{ date('d/m/Y', strtotime($aula->data)) }}
        </p>

        <p><strong>Horário:</strong> 
            {{ date('H:i', strtotime($aula->horario)) }}
        </p>

        <p><strong>Duração:</strong> 
            {{ date('H:i', strtotime($aula->duracao)) }}
        </p>

        <p><strong>Treinador:</strong> 
            {{ $aula->treinador->nome ?? '—' }}
        </p>

        <div class="form-actions">
            <a href="{{ route('aulas.edit', $aula) }}" class="btn yellow">Editar</a>
            <a href="{{ route('aulas.index') }}" class="btn gray">Voltar</a>
        </div>
    </div>
</x-layouts.app>

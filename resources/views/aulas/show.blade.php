<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <h1>Aula {{ $aula->id }}</h1>

        <p><strong>Data:</strong> 
            {{ \Carbon\Carbon::parse($aula->Data)->format('d/m/Y') }}
        </p>

        <p><strong>Horário:</strong> 
            {{ \Carbon\Carbon::parse($aula->Horario)->format('H:i') }}
        </p>

        <p><strong>Duração:</strong> 
            {{ \Carbon\Carbon::parse($aula->Duracao)->format('H:i') }}
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

<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <h1>Treinador {{ $treinador->id }}</h1>

        @if ($treinador->nome)
            <p><strong>Nome:</strong> {{ $treinador->nome }}</p>
        @endif

        @if ($treinador->especialidade)
            <p><strong>Especialidade:</strong> {{ $treinador->especialidade }}</p>
        @endif

        @if ($treinador->telefone)
            <p><strong>Telefone:</strong> {{ $treinador->telefone }}</p>
        @else
            <p><strong>Telefone:</strong> -</p>
        @endif

        <div class="form-actions">
            <a href="{{ route('treinadores.edit', $treinador) }}" class="btn yellow">Editar</a>
            <a href="{{ route('treinadores.index') }}" class="btn gray">Voltar</a>
        </div>
    </div>
</x-layouts.app>

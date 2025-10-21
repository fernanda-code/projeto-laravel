<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <h1>Plano {{ $plano->id }}</h1>

        @if ($plano->nome)
            <p><strong>Nome:</strong> {{ $plano->nome }}</p>
        @endif

        @if ($plano->duracao)
            <p><strong>Duração(em meses):</strong> {{ $plano->duracao }} meses</p>
        @else
            <p><strong>Duração(em meses):</strong> -</p>
        @endif

        @if ($plano->preco)
            <p><strong>Preço:</strong> R$ {{ number_format($plano->preco, 2, ',', '.') }}</p>
        @else
            <p><strong>Preço:</strong> -</p>
        @endif

        <div class="form-actions">
            <a href="{{ route('planos.edit', $plano) }}" class="btn yellow">Editar</a>
            <a href="{{ route('planos.index') }}" class="btn gray">Voltar</a>
        </div>
    </div>
</x-layouts.app>

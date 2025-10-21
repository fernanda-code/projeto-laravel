<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <h1>Novo Plano</h1>
            <form action="{{ route('planos.store') }}" method="POST">
               @csrf
               <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome">
               </div>
               <div class="form-group">
                    <label for="duracao">Duração(em meses):</label>
                    <input type="number" name="duracao">
               </div>
               <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" name="preco">
               </div>
               <button type="submit" class="btn btn-success">Salvar</button>
               <a href="{{ route('planos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body
</x-layouts.app>

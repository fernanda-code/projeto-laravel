<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <h1>Novo Treinador</h1>
            <form action="{{ route('treinadores.store') }}" method="POST">
               @csrf
               <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome">
               </div>
               <div class="form-group">
                    <label for="especialidade">Especialidade:</label>
                    <input type="text" name="especialidade">
               </div>
               <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone">
               </div>
               <button type="submit" class="btn btn-success">Salvar</button>
               <a href="{{ route('treinadores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body
</x-layouts.app>

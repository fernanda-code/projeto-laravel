<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <h1>Novo Aluno</h1>
            <form action="{{ route('alunos.store') }}" method="POST">
               <!-- Token CSRF para proteção contra ataques CSRF -->
               @csrf
               <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome">
               </div>
               <div class="form-group">
                    <label for="dataNasc">Data de Nascimento:</label>
                    <input type="date" name="dataNasc">
               </div>
               <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone">
               </div>
               <button type="submit" class="btn btn-success">Salvar</button>
               <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body
</x-layouts.app>

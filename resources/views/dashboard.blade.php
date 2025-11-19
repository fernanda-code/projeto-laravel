<x-layouts.app :title="__('Dashboard')">
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<div class="py-10">
    <div class="max-w-6xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-10 text-gray-700">Bem-vindo ao sistema da Academia</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <a href="{{ route('alunos.index') }}"
               class="p-10 rounded-2xl shadow-md bg-[#FDE2E4] hover:bg-[#FACFD3] transition-all duration-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Alunos</h2>
                <p class="text-gray-600 text-lg">Gerenciar os alunos cadastrados</p>
            </a>

            <a href="{{ route('aulas.index') }}"
               class="p-10 rounded-2xl shadow-md bg-[#E2F0CB] hover:bg-[#D1E9B6] transition-all duration-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Aulas</h2>
                <p class="text-gray-600 text-lg">Listar e criar novas aulas</p>
            </a>

            <a href="{{ route('treinadores.index') }}"
               class="p-10 rounded-2xl shadow-md bg-[#CDE7F0] hover:bg-[#B9DBE8] transition-all duration-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Treinadores</h2>
                <p class="text-gray-600 text-lg">Gerenciar os treinadores</p>
            </a>

            <a href="{{ route('planos.index') }}"
               class="p-10 rounded-2xl shadow-md bg-[#FFF1C9] hover:bg-[#FDE7A9] transition-all duration-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Planos</h2>
                <p class="text-gray-600 text-lg">Listar e atribuir planos</p>
            </a>

            <a href="{{ route('alunos_aulas.index') }}"
               class="p-10 rounded-2xl shadow-md bg-[#E8DFF5] hover:bg-[#DBC8EF] transition-all duration-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Participações</h2>
                <p class="text-gray-600 text-lg">Alunos por aula</p>
            </a>

        </div>
    </div>
</div>
</x-layouts.app>

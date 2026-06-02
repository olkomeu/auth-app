<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Cadastrar Nova Categoria de Equipamentos') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('categorias.store') }}"> 
                        @csrf 
 
                        <div>
                            <div class="mb-2">
                                <label for="name" class="font-semibold text-gray-700">Nome da Categoria :</label>
                            </div>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Ex: Notebooks, Monitores, Periféricos" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="prefixo_sku" class="font-semibold text-gray-700">Prefixo de Identificação (SKU) :</label>
                            </div>
                            <input type="text" name="prefixo_sku" id="prefixo_sku" value="{{ old('prefixo_sku') }}" required maxlength="4" placeholder="Ex: NOT, MON" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase"> 
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="localizacao" class="font-semibold text-gray-700">Local de Armazenamento Padrão :</label>
                            </div>
                            <input type="text" name="localizacao" id="localizacao" value="{{ old('localizacao') }}" required placeholder="Ex: Almoxarifado - Prateleira B" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="vida_util_meses" class="font-semibold text-gray-700">Tempo de Vida Útil Padrão (em meses) :</label>
                            </div>
                            <input type="number" name="vida_util_meses" id="vida_util_meses" value="{{ old('vida_util_meses') }}" min="1" required placeholder="Ex: 36" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="description" class="font-semibold text-gray-700">Descrição da Categoria :</label>
                            </div>
                            <textarea name="description" id="description" rows="2" placeholder="Breve resumo..." class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                                Salvar Categoria
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="font-bold text-sm text-gray-700 uppercase tracking-wider">Equipamentos Atuais no Estoque</h3>
                </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-gray-600 border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 bg-gray-100 text-gray-700 font-bold uppercase tracking-wider">
                                    <th class="p-2">Foto</th>
                                    <th class="p-2">Especificação</th>
                                    <th class="p-2">Marca</th>
                                    <th class="p-2">Preço</th>
                                    <th class="p-2 text-center">Qtd. Estoque</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                        <td class="p-2">
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-10 h-10 object-cover rounded border border-gray-200">
                                            @else
                                                <div class="w-10 h-10 bg-gray-200 rounded flex items-center justify-center text-[9px] text-gray-400">Sem foto</div>
                                            @endif
                                        </td>
                                        <td class="p-2 font-semibold text-gray-900">{{ $post->title }}</td>
                                        <td class="p-2">{{ $post->marca ?? 'Não informada' }}</td>
                                        <td class="p-2 font-medium text-green-700">
                                            R$ {{ number_format($post->preco ?? 0, 2, ',', '.') }}
                                        </td>
                                        <td class="p-2 text-center font-bold text-gray-800 bg-gray-50/50">{{ $post->text }} un</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"
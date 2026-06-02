<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Editar Categoria de Equipamentos') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}"> 
                        @csrf 
                        @method('PUT')
 
                        <div>
                            <div class="mb-2">
                                <label for="name" class="font-semibold text-gray-700">Nome da Categoria :</label>
                            </div>
                            <input type="text" name="name" id="name" value="{{ old('name', $categoria->name) }}" required placeholder="Ex: Notebooks, Monitores, Periféricos" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="prefixo_sku" class="font-semibold text-gray-700">Prefixo de Identificação (SKU / Patrimônio) :</label>
                            </div>
                            <input type="text" name="prefixo_sku" id="prefixo_sku" value="{{ old('prefixo_sku', $categoria->prefixo_sku) }}" required maxlength="4" placeholder="Ex: NOT, MON, CAB" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase"> 
                            <p class="mt-1 text-xs text-gray-500">Apenas letras (máx. 4). Usado para gerar códigos internos automaticamente (ex: NOT-001).</p>
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="localizacao" class="font-semibold text-gray-700">Local de Armazenamento Padrão :</label>
                            </div>
                            <input type="text" name="localizacao" id="localizacao" value="{{ old('localizacao', $categoria->localizacao) }}" required placeholder="Ex: Almoxarifado - Prateleira B, Armário TI" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <p class="mt-1 text-xs text-gray-500">Onde os itens desta categoria ficam guardados fisicamente.</p>
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="vida_util_meses" class="font-semibold text-gray-700">Tempo de Vida Útil Padrão (em meses) :</label>
                            </div>
                            <input type="number" name="vida_util_meses" id="vida_util_meses" value="{{ old('vida_util_meses', $categoria->vida_util_meses) }}" min="1" required placeholder="Ex: 36 (para 3 anos)" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <p class="mt-1 text-xs text-gray-500">Tempo estimado antes do equipamento precisar de troca.</p>
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="description" class="font-semibold text-gray-700">Descrição / Observações da Categoria :</label>
                            </div>
                            <textarea name="description" id="description" rows="3" placeholder="Descreva brevemente quais tipos de aparelhos entram aqui e regras gerais..." class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $categoria->description) }}</textarea>
                        </div>

                        <div class="mt-6 mb-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Atualizar Categoria
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
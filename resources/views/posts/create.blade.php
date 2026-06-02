<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Cadastrar Novo Equipamento') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"> 
                        @csrf 
 
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="title">Especificações :</label>
                            </div>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
    <div class="mb-2">
        <div class="mt-4">
    <div class="mb-2">
        <label for="marca" class="font-semibold text-gray-700">Marca do Equipamento:</label>
    </div>
    <input type="text" name="marca" id="marca" value="{{ old('marca') }}" placeholder="Ex: Dell, HP" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
</div>

<div class="mt-4">
    <div class="mb-2">
        <label for="preco" class="font-semibold text-gray-700">Preço:</label>
    </div>
    <input type="text" name="preco" id="preco" value="{{ old('preco') }}" placeholder="Ex: 1500" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
</div>

                        <div class="mt-4">
                            <div class="mt-2 mb-2">
                                <label for="text">Quantidade de Equipamentos:</label>
                            </div>
                            <input 
                                type="number" 
                                name="text" 
                                id="text" 
                                min="0" 
                                value="{{ old('text') }}"
                                required 
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                            <div id="aviso-minimo" class="mt-2 text-sm text-red-600 font-semibold" style="display: none;">
                                ⚠️ Atenção: A quantidade informada está abaixo do mínimo aceitável!
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="mt-2 mb-2">
                                <label for="image">Imagem do Equipamento :</label>
                            </div>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="image" id="image" accept="image/*" required class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100"> 
                            </div>
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF até 2MB</p>
                            
                            <img id="preview" src="" class="mt-4 max-h-64 rounded-lg" style="display:none;" alt="Preview">
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="categorias_id">Equipamentos:</label>
                            </div>
                            <select id="categorias_id" name="categorias_id" required class="w-full col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                <option value="">Selecione um tipo de Equipamento</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $categoria->id == old('categorias_id') ? 'selected' : '' }}>
                                        {{ $categoria->name }}
                                    </option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="mt-6 mb-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // --- CONFIGURAÇÃO DA QUANTIDADE MÍNIMA ---
        const QUANTIDADE_MINIMA = 10; 

        const inputQuantidade = document.getElementById('text');
        const avisoMinimo = document.getElementById('aviso-minimo');

        // Atualiza a mensagem com o limite definido
        avisoMinimo.textContent = `⚠️ Atenção: A quantidade informada está abaixo do mínimo aceitável (Mínimo: ${QUANTIDADE_MINIMA})`;

        function checarEstoque() {
            const valor = parseInt(inputQuantidade.value);

            if (!isNaN(valor) && valor < QUANTIDADE_MINIMA) {
                avisoMinimo.style.display = 'block'; 
            } else {
                avisoMinimo.style.display = 'none';  
            }
        }

        inputQuantidade.addEventListener('input', checarEstoque);
        checarEstoque();

        // --- PREVIEW EM TEMPO REAL DA IMAGEM ---
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
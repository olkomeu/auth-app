<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Editar Equipamento') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-r-lg flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-blue-600 uppercase tracking-wider">Quantidade Atual em Estoque</p>
                            <p class="text-3xl font-black text-blue-900">{{ $post->text }} <span class="text-lg font-normal">unidades</span></p>
                        </div>
                        <div class="text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data"> 
                        @csrf 
                        @method('PUT')
 
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="title">Especificações :</label>
                            </div>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
                            <div class="mt-2 mb-2">
                                <label for="marca">Marca :</label>
                            </div>
                            <input type="text" name="marca" id="marca" value="{{ old('marca', $post->marca) }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>

                        <div class="mt-4">
                            <div class="mt-2 mb-2">
                                <label for="preco">Preço (R$) :</label>
                            </div>
                            <input type="number" name="preco" id="preco" step="0.01" min="0" value="{{ old('preco', $post->preco) }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
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
                                value="{{ old('text', $post->text) }}"
                                required 
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                            <div id="aviso-minimo" class="mt-2 text-sm text-red-600 font-semibold" style="display: none;">
                                ⚠️ Atenção: A quantidade informada está abaixo do mínimo aceitável!
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="mt-2 mb-2">
                                <label for="image">Imagem do Equipamentos (Deixe em branco para manter a atual):</label>
                            </div>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100"> 
                            </div>
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF até 2MB</p>
                            
                            <img id="preview" src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" class="mt-4 max-h-64 rounded-lg" style="{{ $post->image ? 'display:block;' : 'display:none;' }}" alt="Preview">
                        </div>

                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="categorias_id">Equipamentos:</label>
                            </div>
                            <select id="categorias_id" name="categorias_id" required class="w-full col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                <option value="">Selecione um tipo de Equipamento</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $categoria->id == old('categorias_id', $post->categorias_id) ? 'selected' : '' }}>
                                        {{ $categoria->name }}
                                    </option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="mt-6 mb-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Atualizar
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

        // Atualiza o texto do aviso com o número configurado acima
        avisoMinimo.textContent = `⚠️ Atenção: A quantidade informada está abaixo do mínimo aceitável (Mínimo: ${QUANTIDADE_MINIMA})`;

        // Função reutilizável para checar o estoque
        function checarEstoque() {
            const valor = parseInt(inputQuantidade.value);

            if (!isNaN(valor) && valor < QUANTIDADE_MINIMA) {
                avisoMinimo.style.display = 'block'; // Mostra o aviso
            } else {
                avisoMinimo.style.display = 'none';  // Esconde o aviso
            }
        }

        // Monitora o que o usuário digita no campo de quantidade
        inputQuantidade.addEventListener('input', checarEstoque);

        // Executa a checagem assim que a página carrega para o caso do valor antigo já ser baixo
        checarEstoque();

        // --- PREVIEW DE IMAGEM ---
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
            }
        });
    </script>
</x-app-layout>
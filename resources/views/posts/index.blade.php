<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Equipamentos') }} 
        </h2>
    </x-slot>
 
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                        Adicione um novo Equipamento Eletrônico
                    </a>
                </div>
            </div>
        </div>
    </div>

    @forelse($posts as $post)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-gray-900">
                        
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full max-h-48 object-cover rounded-lg mb-3">
                        @else
                            <div class="w-full h-36 bg-gray-200 rounded-lg mb-3 flex items-center justify-center">
                                <span class="text-xs text-gray-500">Sem imagem</span>
                            </div>
                        @endif

                        <div class="h-14 bg-gradient-to-r from-blue-500 to-purple-600 relative overflow-hidden flex items-center justify-between p-3 rounded-lg mb-3">
                            <div class="absolute inset-0 bg-black/20"></div>
                            
                            <h3 class="text-xl font-bold text-white line-clamp-1 relative z-10">
                                {{ $post->title }}
                            </h3>

                            <div class="flex gap-2 relative z-10">
                                <a href="{{ route('posts.edit', $post) }}" class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold rounded-md transition-colors">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este equipamento?')" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-md transition-colors">
                                        Deletar
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="inline-block px-2.5 py-0.5 text-[11px] font-semibold text-white bg-blue-600 rounded-full">
                                @foreach ($categorias as $categoria)
                                    @if($categoria->id == $post->categorias_id)
                                        Categoria # {{ $categoria->name }}
                                    @endif
                                @endforeach
                            </span>
                        </div>

                        <div class="mb-3 flex gap-6 bg-gray-50 p-2.5 rounded-lg border border-gray-100">
                            <p class="text-sm text-gray-700">
                                <span class="font-bold text-gray-400 text-[10px] uppercase tracking-wider mr-1">Marca:</span>
                                <span class="font-semibold text-gray-800">{{ $post->marca ?? 'Não informada' }}</span>
                            </p>
                            <p class="text-sm text-gray-700">
                                <span class="font-bold text-gray-400 text-[10px] uppercase tracking-wider mr-1">Preço:</span>
                                <span class="font-bold text-green-600">R$ {{ $post->preco }}</span>
                            </p>
                        </div>

                        <div class="mb-2 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Quantidade em Estoque</p>
                                <p class="text-xl font-black text-gray-800 dark:text-white mt-0.5">
                                    {{ $post->text }} <span class="text-xs font-normal text-gray-500">unidades disponíveis</span>
                                </p>
                            </div>
                            <div class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 text-center text-gray-500 text-sm">
            Nenhum equipamento cadastrado.
        </div>
    @endforelse
</x-app-layout>
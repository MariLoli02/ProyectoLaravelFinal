<x-app-layout>
    <!-- component -->
    <div class="py-10 bg-gray-50 overflow-hidden">
        <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
            
            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Mis Peliculas</h2>
            <span class="inline-block w-48 h-1 rounded-full bg-blue-400"></span>
            <span class="inline-block w-5 h-1 ml-1 rounded-full bg-blue-300"></span>
            <span class="inline-block w-2 h-1 ml-1 rounded-full bg-blue-200"></span>
            
            <div class="flex flex-row-reverse">
                <a href="{{ route('peliculas.create') }}"><i class="fas fa-plus"></i>Añadir Pelicula</a>
            </div>
            <div
                class="mt-16 grid divide-x divide-y rounded-xl overflow-hidden sm:grid-cols-1 lg:divide-y-0 lg:grid-cols-2 xl:grid-cols-3">
                @foreach ($peliculas as $item)
                    <div class="relative mx-2 mb-2 group bg-white transition hover:z-[1] hover:shadow-2xl">
                        <div class="relative p-8 space-y-8">
                            <img src="{{ Storage::url($item->image) }}" class="w-50">

                            <div class="space-y-2">
                                <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">
                                    {{ $item->titulo }}</h5>
                                <p class="text-sm text-gray-600">{{ $item->sinopsis }}</p>
                                <p class="">
                                    <form action="{{route('peliculas.cambiarEstreno', $item)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="mt-2 px-2 text-sm text-center bg-transparent border-2 @if ($item->estreno == 'Estrenada') border-green-400 text-green-400 hover:bg-green-400 focus:border-green-300 @else border-red-400 text-red-400 hover:bg-red-400 focus:border-red-300 @endif rounded-lg transition-colors duration-500 transform  hover:text-gray-100 focus:border-4">
                                            {{ $item->estreno }}
                                        </button>
                                    </form>
                                </p>
                            </div>
                            <div class="space-y-2">
                                <form action="{{ route('peliculas.destroy', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('peliculas.show', $item)}}" class="text-yellow-500 hover:text-yellow-700 mr-2"><i
                                            class="fas fa-eye"></i></a>
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 mr-2"><i class="fas fa-trash"></i></button>
                                    <a href="{{route('peliculas.edit', $item)}}" class="text-green-500 hover:text-green-700 mr-2"><i
                                            class="fas fa-edit"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

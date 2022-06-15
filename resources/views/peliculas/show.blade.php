<x-app-layout>
    <div class="container h-screen max-w-full">
        <div
            class="m-auto my-28 w-96 max-w-lg items-center justify-center overflow-hidden rounded-2xl bg-slate-200 shadow-xl">
            <div class="h-24 bg-white"></div>
            <div class="-mt-20 flex justify-center">
                <img class="h-32 rounded-full" src="{{ Storage::url($pelicula->image) }}" />
            </div>
            <div class="mt-5 mb-1 px-3 text-center text-xl font-bold">{{ $pelicula->titulo }}</div>
            <div class="mb-5 px-3 text-center text-sky-500">{{ $pelicula->sinopsis }}</div>
            <div class="mb-5 px-3 text-center">Duracion: {{ $pelicula->duracion }}min</div>
            <p
                class="mx-2 mb-3 text-center text-base @if ($pelicula->estreno == 'Estrenada') text-green-500 @else text-red-600 @endif">
                {{ $pelicula->estreno }}</p>
            @foreach ($generos as $genero)
                @if ($genero->id == $pelicula->genero_id)
                    <p class="mx-2 mb-7 text-center text-base">{{ $genero->nombre }}</p>
                @endif
            @endforeach
            <a href="{{ route('peliculas.index') }}"
                class="mx-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"></i> Volver
            </a>
        </div>
    </div>
</x-app-layout>

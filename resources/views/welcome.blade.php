<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block rounded">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="flex flex-col">
            <h1 class="mt-5 text-3xl text-center font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Peliculas Estrenadas</h1>

            <div class="text-center mt-2">
                <span class="inline-block w-48 h-1 rounded-full bg-blue-400"></span>
                <span class="inline-block w-5 h-1 ml-1 rounded-full bg-blue-300"></span>
                <span class="inline-block w-2 h-1 ml-1 rounded-full bg-blue-200"></span>
            </div>

            <div class="grid grid-cols-6 gap-5 p-20">
                @foreach ($peliculas as $pelicula)
                    <div
                        class="col-span-6 mt-5 bg-opacity-50 border border-gray-100 rounded shadow-lg bg-gradient-to-b from-blue-300 backdrop-blur-20 to-green-200 md:col-span-3 lg:col-span-2 ">
                        <div class="flex flex-row px-2 py-3 mx-3">

                            <div class="flex flex-col mt-1 mb-2 ml-4">
                                <p>{{ $pelicula->titulo }}</p>
                            </div>
                        </div>

                        <div class="flex justify-center px-2 mx-3 my-2 text-sm font-medium text-gray-400">
                            <img class="w-20rem rounded shadow-2xl object-cover"
                                src="{{ Storage::url($pelicula->image) }}">

                        </div>

                        <div class="mb-5">
                            <div class="flex flex-wrap justify-start mx-5 mt-6 text-xs sm:justify-center ">
                                <div class="flex mb-2 mr-4 font-normal text-gray-700 ">Duracion:<div
                                        class="ml-1 text-gray-500 text-ms"> {{ $pelicula->duracion }} min</div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <div class="-mt-16 mx-20 mb-8">
        {{ $peliculas->links() }}
    </div>

</body>

</html>

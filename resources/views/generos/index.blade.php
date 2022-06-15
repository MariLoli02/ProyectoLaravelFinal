<x-app-layout>
    <!-- component -->
    <div class="py-10 bg-gray-50 overflow-hidden">
        <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">

            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Generos de peliculas</h2>
                <span class="inline-block w-48 h-1 rounded-full bg-blue-400"></span>
                <span class="inline-block w-5 h-1 ml-1 rounded-full bg-blue-300"></span>
                <span class="inline-block w-2 h-1 ml-1 rounded-full bg-blue-200"></span>
       
            <div
                class="mt-16 grid border divide-x divide-y rounded-xl overflow-hidden sm:grid-cols-1 lg:divide-y-0 lg:grid-cols-2 xl:grid-cols-3">
                @foreach ($generos as $item)
                    <div class="mb-4 py-6 relative group bg-white transition hover:z-[1] hover:shadow-2xl bg-gradient-to-b from-blue-300 backdrop-blur-20 to-green-200">

                        <div class="relative p-8 space-y-8">
                            <div class="grid grid-cols-6 content-start">
                                <img src="https://www.alquiblaweb.com/wp-content/uploads/2018/10/drama-312318_960_720w.png"
                                class="w-10" alt="drama">
                                <img src="https://img.icons8.com/ios-filled/500/sci-fi.png"
                                class="w-10" alt="ciencia ficcion">
                                <img src="https://cdn-icons-png.flaticon.com/512/218/218151.png?w=360" class="w-10" alt="terror">
                                <img src="https://cdn-icons-png.flaticon.com/512/986/986158.png" class="w-10" alt="musical">
                                <img src="https://s3.amazonaws.com/libapps/accounts/42353/images/action.png" class="w-10" alt="accion">
                                <img src="https://cdn-icons-png.flaticon.com/512/3938/3938579.png" class="w-10" alt="animacion">
                            </div>
                            

                            <div class="space-y-2">
                                <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">
                                    {{ $item->nombre }}</h5>
                                <p class="text-sm text-gray-600">{{ $item->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

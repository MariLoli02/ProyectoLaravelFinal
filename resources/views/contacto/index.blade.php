<x-app-layout>
    <!-- component -->

    <body class="font-mono bg-gray-400">
        <!-- Container -->
        <div class="container mx-auto">
            <div class="flex justify-center px-6 my-12">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                    <!-- Col -->
                    <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg">
                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg"/>
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <h3 class="pt-4 text-2xl text-center">Formulario Contacto</h3>
                        <x-form action="{{ route('contacto.procesar') }}" method="POST" class="px-8 pt-6 pb-8 mb-2 bg-white rounded">
                            @csrf
                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="nombre">
                                        Nombre *
                                    </label>
                                    <x-form-input
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        name="nombre" id="nombre" type="text" />
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="apellido">
                                        Apellidos *
                                    </label>
                                    <x-form-input
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        name="apellidos" id="apellidos" type="text"/>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="mensaje">
                                    Mensaje *
                                </label>
                                <x-form-textarea
                                    class="w-full h-28 px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="mensaje" name="mensaje" type="text" />
                            </div>
                            <hr class="mb-4 border-t" />
                            <x-jet-button type="submit" ><i class="fas fa-paper-plane mr-2"></i>Enviar</x-jet-button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>

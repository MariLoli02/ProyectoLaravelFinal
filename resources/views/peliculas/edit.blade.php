<x-app-layout>
    <h2 class="text-center text-2xl">Editar Pelicula</h2>
    <div class="flex items-center justify-center">
        <div class="bg-gray-300 w-2/3 rounded-2xl border shadow-x1 p-10 max-w-lg">
            <div class="flex flex-col items-center">
                <x-form action="{{ route('peliculas.update', $pelicula) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-form-input name="titulo" label="Titulo:" value="{{$pelicula->titulo}}" class="rounded" />
                    <x-form-textarea name="sinopsis" label="Sinopsis:" class="rounded" default="{{$pelicula->sinopsis}}"/>
                    <x-form-input name="duracion" label="Duracion:" value="{{$pelicula->duracion}}" type="number" class="rounded" min="30" max="248" step='1' />
                    <x-form-group name="estreno" label="Estreno:" inline>
                        @if($pelicula->estreno =='Estrenada') 
                        <x-form-radio name="estreno" value="En desarrollo"  label="En desarrollo" checked/>
                        <x-form-radio name="estreno" value="Estrenada" label="Estrenada" />
                        @else
                        <x-form-radio name="estreno" value="En desarrollo"  label="En desarrollo" />
                        <x-form-radio name="estreno" value="Estrenada" label="Estrenada" checked/>
                        @endif
                    </x-form-group>


                    <x-form-select label="Genero:" name="genero_id" class="rounded">
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                        @endforeach
                    </x-form-select>
                    <x-form-input type="file" id="img" name="image" label="Imagen:" accept="image/*" />
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <div class="flex items-center justify-center w-40 mb-4 ">
                            <img id="image" src="{{Storage::url($pelicula->image)}}" class="rounded" />
                        </div>
                    </div>

                    <x-form-submit class="bg-green-600 hover:bg-green-800">
                        <span><i class="fas fa-save"></i> Guardar</span>
                    </x-form-submit>
                </x-form>
            </div>
        </div>
    </div>
    <script>
        //Cambiar imagen 
        document.getElementById("img").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload=(event)=>{
                document.getElementById("image").setAttribute('src', event.target.result)
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>

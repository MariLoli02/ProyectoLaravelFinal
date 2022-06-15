<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos=([
            'Comedia'=>"Diseñadas específicamente para provocar la risa o la alegría entre los espectadores.",
            'Drama'=>"Los dramas se centran en desarrollar el problema o problemas entre los diferentes protagonistas.",
            'Ciencia Ficcion'=>"Basados en fenómenos imaginarios, en la ciencia ficción son usuales los extraterrestres, sociedades inventadas, otros planetas.",
            'Terror'=>"Su principal objetivo es causar miedo, horror, incomodidad o preocupación.",
            'Accion'=>"En este género prevalecen altas dosis de adrenalina con una buena carga de movimiento, fugas, acrobacias, peleas, guerras, persecuciones y una lucha contra el mal.",
            'Musical'=>"Las películas que cortan su desarrollo natural con fragmentos musicales son protagonistas de este género.",
            'Animacion'=>"Películas que se componen de fotogramas hechos a mano y que, pasados rápidamente uno detrás de otro, producen la ilusión de movimiento o vídeo.",
            'Western'=>"El western es un género cinematográfico especialmente importante en el cine estadounidense de los años 40 hasta los 60 (aunque el cine italiano creó su propio género, el espagueti western) en el que la trama se ambienta en el Viejo Oeste."
        ]);

        foreach($generos as $k=>$v){
            Genero::create([
                'nombre'=>$k,
                'descripcion'=>$v
            ]);
        }

    }
}

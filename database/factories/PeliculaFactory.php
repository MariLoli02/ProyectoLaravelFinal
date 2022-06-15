<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));

        return [
            'titulo'=>$this->faker->unique()->word(),
            'sinopsis'=>$this->faker->text(),
            'image'=>'img/'.$this->faker->picsum('public/storage/img/', 640, 480, null, false),
            'estreno'=>random_int(1,2),
            'duracion'=>random_int(30, 248),
            'user_id'=>User::all()->random()->id,
            'genero_id'=>Genero::all()->random()->id
        ];
    }
}

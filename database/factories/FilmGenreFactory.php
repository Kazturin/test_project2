<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Film;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilmGenre>
 */
class FilmGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'film_id' => Film::get()->random()->id,
            'genre_id' => Genre::get()->random()->id,
        ];
    }
}

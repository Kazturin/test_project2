<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach(['Комедия','Драма','Боевик','Триллер','Вестерн','Приключение'] as $genre){
            \App\Models\Genre::factory()->create([
                'name' => $genre
            ]);
        }

         \App\Models\Film::factory(10)->create();
         \App\Models\FilmGenre::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

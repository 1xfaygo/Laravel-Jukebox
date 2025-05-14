<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Album;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    protected $model = Song::class; // Link the factory to the Song model

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'artist' => $this->faker->name,
            'album_id' => Album::factory(),
            'genre_id' => Genre::factory(),
        ];
    }
}

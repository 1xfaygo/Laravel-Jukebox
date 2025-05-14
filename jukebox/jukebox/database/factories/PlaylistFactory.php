<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    protected $model = Playlist::class; // Link the factory to the Playlist model

    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Generate a random playlist name
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            [
                'title' => 'Summer Nights',
                'artist' => 'The Beach Band',
                'album_id' => 1,
                'genre_id' => 1
            ],
            [
                'title' => 'City Lights',
                'artist' => 'Urban Beats',
                'album_id' => 2,
                'genre_id' => 2
            ],
            [
                'title' => 'Moonlight Sonata',
                'artist' => 'Classical Masters',
                'album_id' => 3,
                'genre_id' => 4
            ]
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}
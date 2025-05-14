<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Seeder;

class PlaylistSongSeeder extends Seeder
{
    public function run()
    {
        // Create songs
        $songs = Song::factory(10)->create();

        // Create playlists and attach random songs to each
        Playlist::factory(5)->create()->each(function ($playlist) use ($songs) {
            $playlist->songs()->attach($songs->random(3)); // Attach 3 random songs
        });
    }
}

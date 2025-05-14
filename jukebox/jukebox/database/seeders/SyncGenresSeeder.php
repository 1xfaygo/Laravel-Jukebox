<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Genre;

class SyncGenresSeeder extends Seeder
{
    public function run()
    {
        // Get unique genres from the artists table
        $artistGenres = Artist::select('genre')->distinct()->pluck('genre');

        // Insert genres into the genres table if not already present
        foreach ($artistGenres as $artistGenre) {
            Genre::firstOrCreate(['name' => $artistGenre]);
        }
    }
}

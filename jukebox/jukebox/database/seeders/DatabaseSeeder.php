<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    

    $this->call([
        ArtistSeeder::class,  // First create artists
        GenreSeeder::class,   // Then create genres
        AlbumSeeder::class,   // Then create albums
        SongSeeder::class     // Finally create songs
    ]);

    // Create some albums first
    Album::factory(5)->create();
    
    // Create some genres
    Genre::factory(5)->create();
    
    // Create songs with random albums and genres
    Song::factory(10)->create([
        'album_id' => function() {
            return Album::inRandomOrder()->first()->id;
        },
        'genre_id' => function() {
            return Genre::inRandomOrder()->first()->id;
        }
    ]);

    // Create some genres
    Genre::create(['name' => 'Rock']);
    Genre::create(['name' => 'Pop']);
    Genre::create(['name' => 'Jazz']);
    Genre::create(['name' => 'Classical']);

    // Create some albums
    Album::create(['name' => 'Greatest Hits']);
    Album::create(['name' => 'New Album']);
    Album::create(['name' => 'Classic Collection']);

    // Create some artists
    Artist::factory(5)->create();
}
}

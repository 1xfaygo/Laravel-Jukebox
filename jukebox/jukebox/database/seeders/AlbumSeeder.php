<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        $artistIds = Artist::pluck('id')->all();
        $albums = [
            ['name' => 'Greatest Hits'],
            ['name' => 'New Album'],
            ['name' => 'Classic Collection'],
            ['name' => 'Summer Vibes'],
            ['name' => 'Midnight Sessions']
        ];

        $faker = \Faker\Factory::create();
        foreach ($albums as $album) {
            $album['artist_id'] = $faker->randomElement($artistIds);
            $album['release_date'] = $faker->date();
            Album::create($album);
        }
    }
}

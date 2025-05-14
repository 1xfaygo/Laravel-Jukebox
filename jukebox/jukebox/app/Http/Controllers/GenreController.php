<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Album;

class GenreController extends Controller
{
    public function index()
    {
        // Retrieve all genres from the database
        $genres = Genre::all();

        // Pass the genres to the view
        return view('genres', compact('genres'));
    }

    public function show(Genre $genre)
    {
        $artists = $genre->artists;
        $albums = Album::whereHas('artist', function($q) use ($genre) {
            $q->where('genre', $genre->name);
        })->with('artist')->get();
        $genres = Genre::all();
        return view('genres', [
            'genres' => $genres,
            'selectedGenre' => $genre,
            'albums' => $albums,
            'artists' => $artists
        ]);
    }
}

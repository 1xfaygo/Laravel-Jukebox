<?php

// app/Http/Controllers/PlaylistController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\Genre;

class PlaylistController extends Controller
{
    // Display the playlists page
    public function index(Request $request)
    {
        $genreId = $request->input('genre_id');
        $genres = Genre::all();
        $songs = Song::with('genre');
        if ($genreId) {
            $songs = $songs->where('genre_id', $genreId);
        }
        $songs = $songs->get();
        $playlists = Playlist::with('songs')->get();
        return view('playlist', compact('playlists', 'songs', 'genres', 'genreId'));
    }

    // Store a new playlist
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required',
            'songs' => 'array'
        ]);

        // Create the playlist
        $playlist = Playlist::create([
            'name' => $validated['name']
        ]);

        // Attach selected songs to the playlist
        if (isset($validated['songs'])) {
            $playlist->songs()->attach($validated['songs']);
        }

        // Redirect back to the playlists page with a success message
        return redirect()->route('playlist.index')->with('success', 'Playlist created successfully!');
    }

    // Show a specific playlist
    public function show(Playlist $playlist)
    {
        return view('playlist.show', compact('playlist'));
    }

    public function edit(Playlist $playlist)
    {
        $genres = Genre::all();
        $songs = Song::all();
        return view('playlist.edit', compact('playlist', 'songs', 'genres'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        $validated = $request->validate([
            'name' => 'required',
            'songs' => 'array'
        ]);
        $playlist->update(['name' => $validated['name']]);
        $playlist->songs()->sync($validated['songs'] ?? []);
        return redirect()->route('playlist.index')->with('success', 'Playlist updated!');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return redirect()->route('playlist.index')->with('success', 'Playlist deleted!');
    }
}
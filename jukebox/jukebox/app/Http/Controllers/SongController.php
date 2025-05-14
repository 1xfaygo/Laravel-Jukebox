<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('songs', compact('songs'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required'
        ]);

        Song::create($request->all());
        return redirect()->route('songs.index');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index');
    }
}


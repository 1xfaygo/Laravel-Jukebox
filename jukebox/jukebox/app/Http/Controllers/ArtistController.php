<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // Functie om artiesten te tonen
    public function index()
    {
        $artists = Artist::all();
        return view('artists', compact('artists'));
    }

    // Functie om een artiest aan te maken (display form)
    public function create()
    {
        return view('artists.create');
    }

    // Functie om een artiest op te slaan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
        ]);

        Artist::create($request->all());  // Maak een nieuwe artiest aan

        return redirect()->route('artists.index');
    }

    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
        ]);
        $artist->update($request->all());
        return redirect()->route('artists.index');
    }

    // Functie om een artiest te verwijderen
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists');
    }
}

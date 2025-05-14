<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        // Retrieve all albums with artist information
        $albums = Album::with('artist')->get();

        return view('albums', compact('albums'));
        //echo $albums;
    }
}

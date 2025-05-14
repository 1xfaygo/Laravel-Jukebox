@extends('layouts.blueprint')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/songs.css') }}">
@endsection

@section('body')
<div class="container">
    <h1>Edit Song</h1>
    
    <form action="{{ route('songs.update', $song) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $song->title }}" required>
        </div>

        <div class="form-group">
            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist" class="form-control" value="{{ $song->artist }}" required>
        </div>

        <div class="form-group">
            <label for="album">Album:</label>
            <select name="album_id" id="album" class="form-control">
                <option value="">Select Album</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                        {{ $album->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <select name="genre_id" id="genre" class="form-control">
                <option value="">Select Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $song->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update Song</button>
            <a href="{{ route('songs.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection 
@extends('layouts.blueprint')

@section('page_title', 'Playlists')
@section('page_subtitle', 'Create, edit, and filter playlists by genre')

@section('body')
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <form method="GET" action="{{ route('playlist.index') }}" style="display:flex;align-items:center;gap:12px;">
            <label for="genre_id" style="color:#b3b3b3;">Filter by Genre:</label>
            <select name="genre_id" id="genre_id" class="form-control" onchange="this.form.submit()">
                <option value="">All Genres</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ (isset($genreId) && $genreId == $genre->id) ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="playlists-list mt-4">
        <h2>Your Playlists</h2>
        @if(isset($playlists) && $playlists->count() > 0)
            <div class="row" style="display:flex;flex-wrap:wrap;gap:24px;">
                @foreach($playlists as $playlist)
                    <div class="card" style="background:#222326;color:#fff;padding:24px 18px;border-radius:18px;min-width:260px;flex:1 1 260px;">
                        <h3 style="color:#1DB954;font-size:1.2em;">{{ $playlist->name }}</h3>
                        <p style="color:#b3b3b3;">{{ $playlist->songs->count() }} songs</p>
                        <ul style="margin:0 0 12px 0;padding:0;list-style:none;">
                            @foreach($playlist->songs as $song)
                                <li style="color:#fff;">{{ $song->title }} <span style="color:#b3b3b3;font-size:0.95em;">({{ $song->genre->name ?? 'No Genre' }})</span></li>
                            @endforeach
                        </ul>
                        <div style="display:flex;gap:8px;">
                            <a href="{{ route('playlist.edit', $playlist) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('playlist.destroy', $playlist) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this playlist?');">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No playlists created yet.</p>
        @endif
    </div>

    <div class="playlist-form mt-4" style="margin-top:40px;">
        <h2>Create New Playlist</h2>
        <form action="{{ route('playlist.store') }}" method="POST" style="max-width:500px;margin:auto;">
            @csrf
            <div class="form-group" style="margin-bottom:18px;">
                <input type="text" name="name" placeholder="Playlist Name" required class="form-control">
            </div>
            <div class="form-group" style="margin-bottom:18px;">
                <label for="songs">Select Songs:</label>
                <div style="max-height:220px;overflow-y:auto;background:#232323;padding:12px 8px;border-radius:10px;">
                    @foreach($songs as $song)
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                            <input type="checkbox" name="songs[]" value="{{ $song->id }}" id="song_{{ $song->id }}">
                            <label for="song_{{ $song->id }}" style="margin:0;cursor:pointer;">{{ $song->title }} <span style="color:#b3b3b3;font-size:0.95em;">({{ $song->genre->name ?? 'No Genre' }})</span></label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Playlist</button>
        </form>
    </div>

    <a href="/" class="back-home">Back to Home</a>
@endsection
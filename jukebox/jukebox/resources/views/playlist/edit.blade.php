@extends('layouts.blueprint')

@section('page_title', 'Edit Playlist')
@section('page_subtitle', 'Update playlist details and songs')

@section('body')
    <form action="{{ route('playlist.update', $playlist) }}" method="POST" style="max-width:500px;margin:auto;">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-bottom:18px;">
            <label for="name">Playlist Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $playlist->name }}" required>
        </div>
        <div class="form-group" style="margin-bottom:18px;">
            <label for="songs">Select Songs:</label>
            <div style="max-height:220px;overflow-y:auto;background:#232323;padding:12px 8px;border-radius:10px;">
                @foreach($songs as $song)
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                        <input type="checkbox" name="songs[]" value="{{ $song->id }}" id="song_{{ $song->id }}" {{ $playlist->songs->contains($song->id) ? 'checked' : '' }}>
                        <label for="song_{{ $song->id }}" style="margin:0;cursor:pointer;">{{ $song->title }} <span style="color:#b3b3b3;font-size:0.95em;">({{ $song->genre->name ?? 'No Genre' }})</span></label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Playlist</button>
        <a href="{{ route('playlist.index') }}" class="btn btn-secondary" style="margin-left:10px;">Cancel</a>
    </form>
@endsection 
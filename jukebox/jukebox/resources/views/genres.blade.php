@extends("layouts.blueprint")

@section('head')
<link rel="stylesheet" href="{{ asset('css/genres.css') }}">
@endsection

@section('body')
<div>
    <h1>Genres</h1>
    <ul>
        @foreach ($genres as $genre)
            <li>
                <a href="{{ route('genres.show', $genre) }}" style="display:block;">{{ $genre->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
@if(isset($selectedGenre))
    <div style="margin-top:40px;">
        <h2 style="color:#1DB954;">Artists in {{ $selectedGenre->name }}</h2>
        <ul>
            @forelse($artists as $artist)
                <li><a href="{{ route('playlist.index') }}" class="btn btn-link" style="color:#1DB954;text-decoration:underline;">{{ $artist->name }}</a></li>
            @empty
                <li>No artists found for this genre.</li>
            @endforelse
        </ul>
        <h2 style="color:#1DB954;">Albums in {{ $selectedGenre->name }}</h2>
        <ul>
            @forelse($albums as $album)
                <li><a href="{{ route('playlist.index') }}" class="btn btn-link" style="color:#1DB954;text-decoration:underline;">{{ $album->name }}</a> <span style="color:#b3b3b3;">by {{ $album->artist->name ?? 'Unknown Artist' }}</span></li>
            @empty
                <li>No albums found for this genre.</li>
            @endforelse
        </ul>
    </div>
@endif
<a href="/" class="back-home">Back to Home</a>
@endsection

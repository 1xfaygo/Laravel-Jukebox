@extends('layouts.blueprint')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/artists.css') }}">
@endsection

@section('page_title', 'Artists')
@section('page_subtitle', 'Browse, add, edit, or remove artists')

@section('body')
    <div style="display: flex; justify-content: flex-end; margin-bottom: 24px;">
        <a href="{{ route('artists.create') }}" class="btn btn-primary">+ Add Artist</a>
    </div>
    <ul>
        @foreach ($artists as $artist)
            <li style="justify-content: space-between; width: 100%;">
                <a href="{{ route('artists.show', $artist) }}" style="color:#1DB954; font-weight:600; text-decoration:none;">{{ $artist->name }}</a> - {{ $artist->genre }}
                <span style="margin-left:auto; display:flex; gap:8px;">
                    <a href="{{ route('artists.edit', $artist) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('artists.destroy', $artist) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this artist?');">Delete</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
    <div style="height: 60px;"></div>
    <a href="/" class="back-home">Back to Home</a>
@endsection

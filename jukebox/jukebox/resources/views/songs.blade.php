@extends('layouts.blueprint')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/songs.css') }}">
@endsection

@section('body')
<h1>All Songs</h1>
<a href="{{ route('songs.create') }}" class="btn btn-primary">Add New Song</a>
<ul>
    @foreach ($songs as $song)
        <li>{{ $song->title }} - {{ $song->artist }}
            <form action="{{ route('songs.destroy', $song) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection

@section('goback')
<a href="/" class="back-home"> Back to Home</a>
@endsection

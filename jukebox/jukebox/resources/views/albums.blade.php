@extends('layouts.blueprint')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
@endsection

@section('body')


<div class="container">
    <h1>Albums</h1>
    <div class="album-grid">
        @foreach ($albums as $album)
            <div class="album-card">
                <h2>{{ $album->name }}</h2>
                <p>By: {{ $album->artist ? $album->artist->name : 'Unknown Artist' }}</p>
                <p>Released: {{ $album->release_date ? $album->release_date->format('Y-m-d') : 'N/A' }}</p>
            </div>
        @endforeach
    </div>
</div>

<a href="/" class="back-home">Back to Home</a>
@endsection

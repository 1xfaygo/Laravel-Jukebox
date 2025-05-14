@extends('layouts.blueprint')

@section('page_title', $artist->name)
@section('page_subtitle', 'Artist details')

@section('body')
    <div style="max-width:400px;margin:auto;background:#222326;padding:32px 24px;border-radius:18px;box-shadow:0 2px 8px rgba(0,0,0,0.15);color:#fff;">
        <h2 style="color:#1DB954;font-size:1.5em;margin-bottom:18px;">{{ $artist->name }}</h2>
        <p><strong>Genre:</strong> {{ $artist->genre }}</p>
        <a href="{{ route('artists.index') }}" class="btn btn-secondary" style="margin-top:18px;">Back to Artists</a>
    </div>
@endsection 
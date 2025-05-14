@extends('layouts.blueprint')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/songs.css') }}">
@endsection

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{ $song->title }}</h1>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Artist</dt>
                <dd class="col-sm-9">{{ $song->artist }}</dd>

                <dt class="col-sm-3">Album</dt>
                <dd class="col-sm-9">{{ $song->album->name ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Genre</dt>
                <dd class="col-sm-9">{{ $song->genre->name ?? 'N/A' }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('songs.edit', $song) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('songs.index') }}" class="btn btn-secondary">Back to List</a>
            <form action="{{ route('songs.destroy', $song) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection 
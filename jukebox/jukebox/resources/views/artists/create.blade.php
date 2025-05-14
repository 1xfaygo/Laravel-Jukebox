@extends('layouts.blueprint')

@section('page_title', 'Add Artist')
@section('page_subtitle', 'Create a new artist')

@section('body')
    <form action="{{ route('artists.store') }}" method="POST" style="max-width:400px;margin:auto;">
        @csrf
        <div class="form-group" style="margin-bottom:18px;">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group" style="margin-bottom:18px;">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Artist</button>
        <a href="{{ route('artists.index') }}" class="btn btn-secondary" style="margin-left:10px;">Cancel</a>
    </form>
@endsection 
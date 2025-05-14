@extends('layouts.blueprint')

@section('page_title', 'Edit Artist')
@section('page_subtitle', 'Update artist details')

@section('body')
    <form action="{{ route('artists.update', $artist) }}" method="POST" style="max-width:400px;margin:auto;">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-bottom:18px;">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $artist->name }}" required>
        </div>
        <div class="form-group" style="margin-bottom:18px;">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" value="{{ $artist->genre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Artist</button>
        <a href="{{ route('artists.index') }}" class="btn btn-secondary" style="margin-left:10px;">Cancel</a>
    </form>
@endsection 
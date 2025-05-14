@extends('layouts.blueprint')

@section('body')
<h1>Add a Song</h1>
<form action="{{ route('songs.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Artist:</label>
    <input type="text" name="artist" required>
    <button type="submit">Save</button>
</form>
@endsection

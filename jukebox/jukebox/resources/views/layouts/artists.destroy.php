@extends('layouts.blueprint')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/artists.css') }}">
@endsection

@section('body')
    <h1>Add New Artist</h1>

    <form action="{{ route('artists.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" required>

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('artists.index') }}">Back to Artists</a>
@endsection

@extends("layouts.blueprint")

@section('head')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('body')
<div class="welcome-message">
    <h1><i class="fas fa-headphones-alt"></i> Welcome to the Jukebox!</h1>
    <p>Discover and enjoy your favorite music.</p>
</div>
@endsection

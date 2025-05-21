@extends('layouts.blueprint')

@section('page_title', 'Login')
@section('page_subtitle', 'Sign in to your account')

@section('body')
<div class="auth-container" style="max-width: 400px; margin: 0 auto; padding: 20px;">
    <form method="POST" action="{{ route('login') }}" style="background: #222326; padding: 30px; border-radius: 10px;">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; color: #fff; margin-bottom: 8px;">Email</label>
            <input type="email" name="email" id="email" required autofocus
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; background: #191414; color: #fff;"
                value="{{ old('email') }}">
            @error('email')
                <span style="color: #ff4444; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; color: #fff; margin-bottom: 8px;">Password</label>
            <input type="password" name="password" id="password" required
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; background: #191414; color: #fff;">
            @error('password')
                <span style="color: #ff4444; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" 
            style="width: 100%; padding: 12px; background: #1DB954; color: #191414; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background 0.2s;">
            Login
        </button>

        <p style="text-align: center; margin-top: 20px; color: #b3b3b3;">
            Don't have an account? 
            <a href="{{ route('register') }}" style="color: #1DB954; text-decoration: none;">Register here</a>
        </p>
    </form>
</div>
@endsection 
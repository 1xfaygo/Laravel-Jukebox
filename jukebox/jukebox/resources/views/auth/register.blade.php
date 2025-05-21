@extends('layouts.blueprint')

@section('page_title', 'Register')
@section('page_subtitle', 'Create your account')

@section('body')
<div class="auth-container" style="max-width: 400px; margin: 0 auto; padding: 20px;">
    <form method="POST" action="{{ route('register') }}" style="background: #222326; padding: 30px; border-radius: 10px;">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; color: #fff; margin-bottom: 8px;">Name</label>
            <input type="text" name="name" id="name" required autofocus
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; background: #191414; color: #fff;"
                value="{{ old('name') }}">
            @error('name')
                <span style="color: #ff4444; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; color: #fff; margin-bottom: 8px;">Email</label>
            <input type="email" name="email" id="email" required
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

        <div style="margin-bottom: 20px;">
            <label for="password_confirmation" style="display: block; color: #fff; margin-bottom: 8px;">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; background: #191414; color: #fff;">
        </div>

        <button type="submit" 
            style="width: 100%; padding: 12px; background: #1DB954; color: #191414; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background 0.2s;">
            Register
        </button>

        <p style="text-align: center; margin-top: 20px; color: #b3b3b3;">
            Already have an account? 
            <a href="{{ route('login') }}" style="color: #1DB954; text-decoration: none;">Login here</a>
        </p>
    </form>
</div>
@endsection 
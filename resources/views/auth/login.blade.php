@extends('layouts.layout')

@section('main-content')

<div class="auth-container">
    <h2>Login</h2>

    @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div style="color: #4CAF50; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error-message">{{ $message }}</div> @enderror

        <label>Password:</label>
        <input type="password" name="password" required>
        @error('password') <div class="error-message">{{ $message }}</div> @enderror

        <button type="submit">Login</button>
    </form>

    <p>Don’t have an account? <a href="{{ route('register') }}">Register</a></p>
</div>

@endsection

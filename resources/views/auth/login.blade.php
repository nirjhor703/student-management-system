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
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
        @error('email') <div class="error-message">{{ $message }}</div> @enderror

        <label>Password:</label>
        <div class="password-container">
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
        @error('password') <div class="error-message">{{ $message }}</div> @enderror

        <button type="submit">Login</button>
    </form>

    

    <p>Don’t have an account? <a href="{{ route('register') }}">Register</a></p>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
    
        if (togglePassword && password) {
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        }
    
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPassword = document.getElementById('confirmPassword');
    
        if (toggleConfirmPassword && confirmPassword) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        }
    });
    </script>
    

@endsection

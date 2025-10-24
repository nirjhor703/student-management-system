@extends('layouts.layout')

@section('main-content')


    <div class="auth-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
            @error('email') <div class="error-message">{{ $message }}</div> @enderror

            <label>Password</label>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
            @error('password') <div class="error-message">{{ $message }}</div> @enderror

            <label>Confirm Password</label>
            <div class="password-container">
                <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password" required>
                <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
            </div>

            <button type="submit">Register</button>
        </form>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>

</body>
</html>


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

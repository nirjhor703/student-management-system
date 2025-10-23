@extends('layouts.layout')

@section('main-content')


    <div class="auth-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div class="error-message">{{ $message }}</div> @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error-message">{{ $message }}</div> @enderror

            <label>Password</label>
            <input type="password" name="password">
            @error('password') <div class="error-message">{{ $message }}</div> @enderror

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">

            <button type="submit">Register</button>
        </form>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>

</body>
</html>



@endsection

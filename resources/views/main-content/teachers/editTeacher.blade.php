@extends('layouts.layout')

@section('main-content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<form action="{{ url('/teacher/update') }}" method="POST" id="editTeacherForm">
    @csrf

    <input type="hidden" name="id" value="{{ $teacher->id }}">

    <!-- Full Name -->
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $teacher->name }}" required>

    <!-- Email -->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ $teacher->email }}" required>

    <!-- Phone -->
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ $teacher->phone }}" required>



    <br><br>
    <input type="submit" value="Update Teacher">
</form>

@endsection

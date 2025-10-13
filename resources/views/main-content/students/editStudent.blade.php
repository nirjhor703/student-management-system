@extends('layouts.layout')

@section('main-content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<form action="{{ url('/student/update') }}" method="POST" id="editStudentForm">
    @csrf

    <input type="hidden" name="id" value="{{ $student->id }}">

    <!-- Full Name -->
    <label for="name">Full Name</label>
    <input type="text" name="name" id="name" value="{{ $student->name }}" required>

    <!-- Email -->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ $student->email }}" required>

    <!-- Phone -->
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ $student->phone }}" required>

    <!-- Address -->
    <label for="address">Address</label>
    <textarea name="address" id="address" required>{{ $student->address }}</textarea>

    <!-- Status -->
    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="Active" {{ $student->status == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ $student->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
    </select>

    <br><br>
    <input type="submit" value="Update Student">
</form>

@endsection

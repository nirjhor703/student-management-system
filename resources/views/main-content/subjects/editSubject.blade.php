@extends('layouts.layout')

@section('main-content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<form action="{{ url('/subject/update') }}" method="POST" id="editSubjectForm">
    @csrf

    <input type="hidden" name="id" value="{{ $subject->id }}">

    <!-- Subject Name -->
    <label for="name">Subject Name</label>
    <input type="text" name="name" id="name" value="{{ $subject->name }}" required>

    <!-- Description -->
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="{{ $subject->description }}">

    <!-- Phone -->
    <label for="teacher_id">Assigned Teacher</label>
    <input type="text" name="teacher_id" id="teacher_id" value="{{ $subject->teacher_id }}" required>

    <br><br>
    <input type="submit" value="Update Subject">
</form>

@endsection

@extends('layouts.layout')

@section('main-content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<form action="{{ url('/class/update') }}" method="POST" id="editClassForm">
    @csrf

    <input type="hidden" name="id" id="edit_id" value="{{ $class->id }}">

    <!-- Class Name -->
    <label for="class_name">Class Name</label>
    <input type="text" name="class_name" id="edit_class_name" value="{{ $class->class_name }}" required>

    <!-- Subject -->
    <label for="subject_id">Select Subject</label>
    <select id="edit_subject_id" name="subject_id" required>
        <option value="">Select Subject</option>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $class->subject_id == $subject->id ? 'selected' : '' }}>
                {{ $subject->name }}
            </option>
        @endforeach
    </select>

    <!-- Teacher -->
    <label for="teacher_id">Select Teacher</label>
    <select id="edit_teacher_id" name="teacher_id" required>
        <option value="">Select Teacher</option>
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}" {{ $class->teacher_id == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->name }}
            </option>
        @endforeach
    </select>

    <!-- Students -->
    <label for="students">Select Students</label>
    <select id="edit_students" name="students[]" multiple>
        @foreach($students as $student)
            <option value="{{ $student->id }}" 
                {{ in_array($student->id, $class->students->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $student->name }}
            </option>
        @endforeach
    </select>

    <br><br>
    <input type="submit" value="Update Class">
</form>

@endsection

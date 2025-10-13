@extends('layouts.layout')

@section('main-content')

<div class="page-header">
    <button class="open-modal" data-modal-id="addStudentModal">Add Student</button>
</div>

@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<table>
    <caption>Student Table</caption>
    <thead>
        <tr>
            <th>Sl</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $index => $student)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->status }}</td>
                <td>
                    <button class="edit-btn" data-id="{{ $student->id }}">Edit</button>
                </td>
                <td>
                    <a href="{{ route('student.delete', $student->id) }}" onclick="return confirm('Are you sure you want to delete this student?');">
                        <button class="delete-btn">Delete</button>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center;">No students found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@include('main-content.students.addStudentModal')
@include('main-content.students.editStudentModal')

@endsection

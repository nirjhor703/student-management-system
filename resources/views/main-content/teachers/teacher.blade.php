@extends('layouts.layout')

@section('main-content')

<div class="page-header">
    <button class="open-modal" data-modal-id="addTeacherModal">Add Teacher</button>
</div>

@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<table>
    <caption>Teachers Table</caption>
    <thead>
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $index => $teacher)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>
                    <button class="edit-btn" data-id="{{ $teacher->id }}">Edit</button>
                </td>
                <td>
                    <button class="delete-btn" data-id="{{ $teacher->id }}" data-url="{{ route('teacher.delete', $teacher->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center;">No teachers found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@include('main-content.teachers.addTeacherModal')
@include('main-content.teachers.editTeacherModal')

@endsection

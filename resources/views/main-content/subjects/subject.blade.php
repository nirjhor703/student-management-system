@extends('layouts.layout')

@section('main-content')

<div class="page-header">
    <button class="open-modal" data-modal-id="addSubjectModal">Add Subject</button>
</div>

@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<table>
    <caption>Subjects Table</caption>
    <thead>
        <tr>
            <th>Sl</th>
            <th>Subject Name</th>
            <th>Description</th>
            <th>Assigned Teacher</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subjects as $index => $subject)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->description }}</td>
                <td>{{ $subject->teacher->name }}</td>
                <td>
                    <button class="edit-btn" data-id="{{ $subject->id }}">Edit</button>
                </td>
                <td>
                    <a href="{{ route('subject.delete', $subject->id) }}" onclick="return confirm('Are you sure you want to delete this subject?');">
                        <button class="delete-btn">Delete</button>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center;">No subject found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@include('main-content.subjects.addSubjectModal')
@include('main-content.subjects.editSubjectModal')

@endsection

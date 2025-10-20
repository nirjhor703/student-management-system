@extends('layouts.layout')

@section('main-content')

<div class="page-header">
    <button class="open-modal" data-modal-id="addClassModal">Add Class</button>
</div>

@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<table>
    <caption>Class Table</caption>
    <thead>
        <tr>
            <th>SL</th>
            <th>Class Name</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Students</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $index => $class)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $class->class_name }}</td>
            <td>{{ $class->subject->name ?? 'N/A' }}</td>
            <td>{{ $class->teacher->name ?? 'N/A' }}</td>
            <td>
                @foreach ($class->students as $student)
                    {{ $student->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </td>
            <td>
                <button class="edit-btn" data-id="{{ $class->id }}">Edit</button>
                <button class="delete-btn" data-id="{{ $class->id }}" data-url="{{ route('class.delete', $class->id) }}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('main-content.classes.addClassModal')
@include('main-content.classes.editClassModal')

@endsection

{{-- resources/views/welcome.blade.php --}}
@extends('layouts.layout')

@section('main-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>


</head>
<body>

    <div class="body-wrapper">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <div class="right-section main-content">
            <h1>Welcome to the Student Management System</h1>
            <p>Select an option from the sidebar to manage Students, Teachers, or Subjects.</p>
        </div>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Management System</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @yield('css')
</head>
<body>
    <div class="body-wrapper">
        {{-- Header --}}
        @include('layouts.header')

        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Main Content --}}
        <main class="main-content">
            @yield('main-content')
        </main>       
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Hidden Logout Form --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    {{-- jQuery --}}
    <script src="{{ asset('js/jQuery-3.7.1.js') }}"></script>

    {{-- Global AJAX CSRF Setup --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
    </script>

    {{-- Logout Click Handler (if you want to trigger it anywhere) --}}
    <script>
        function logoutUser() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>

    {{-- Custom JS Files --}}
    <script src="{{ asset('js/ajax_setup.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/student_ajax.js') }}"></script>
    <script src="{{ asset('js/subject_ajax.js') }}"></script>
    <script src="{{ asset('js/teacher_ajax.js') }}"></script>
    <script src="{{ asset('js/class_ajax.js') }}"></script>

    @yield('js')
</body>
</html>

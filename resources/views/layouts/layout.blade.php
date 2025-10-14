<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <title>Student Management System</title>

    @yield('css')
    @yield('js')
</head>
<body>
    <div class="body-wrapper">
        
        @include('layouts.navbar')
        @include('layouts.header')

        <main class="main-content">
            @yield('main-content')
        </main>       
    </div>
    @include('layouts.footer')
    <script>
        if (window.jQuery) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        }
    </script>


<script src="{{ asset('js/jQuery-3.7.1.js') }}"></script>
<script src="{{ asset('js/ajax_setup.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/student_ajax.js') }}"></script>
<script src="{{ asset('js/subject_ajax.js') }}"></script>


</body>
</html>

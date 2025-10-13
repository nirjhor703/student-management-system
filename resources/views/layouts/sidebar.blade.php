{{-- jQuery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
{{-- Sidebar JS --}}
<script src="{{ asset('js/sidebar.js') }}"></script>

<script>
    $(document).ready(function(){
        SidebarAjax(); // initialize sidebar JS
    });
</script>

    {{-- Sidebar --}}
    <aside id="mySidenav" class="sidenav">
        <div class="sidebar-header">
            <h2>School</h2>
            <button class="toggle-sidebar">☰</button>
        </div>

        {{-- Sidebar menu --}}
        <ul class="sidebar-menu">

            {{-- Home --}}
            <li class="menu-item" data-url="{{ url('/welcome') }}">
                <div class="menu-title {{ Request::segment(1) == 'welcome' ? 'active':'' }}">
                    <p>
                        <i class="fa-solid fa-house"></i>
                        Home
                    </p>
                    <i class="fas fa-angle-right {{ Request::segment(1) == 'welcome' ? 'rotate':'' }}"></i>
                </div>
            </li>

            {{-- Students --}}
            <li class="menu-item" data-url="{{ url('/student') }}">
                <div class="menu-title {{ Request::segment(1) == 'student' ? 'active':'' }}">
                    <p>
                        <i class="fa-solid fa-user-graduate"></i>
                        Students
                    </p>
                    <i class="fas fa-angle-right {{ Request::segment(1) == 'student' ? 'rotate':'' }}"></i>
                </div>
                <ul class="sub-menu {{ Request::segment(1) == 'student' ? 'show':'' }}">
                    <li class="sub-menu-item" data-url="{{ route('student.create') }}">
                        <div class="menu-title {{ Request::segment(2) == 'add' ? 'active':'' }}">
                            <p><i class="fa-solid fa-plus"></i> Add Student</p>
                        </div>
                    </li>
                </ul>
            </li>

            {{-- Teachers --}}
            <li class="menu-item" data-url="{{ url('/teachers') }}">
                <div class="menu-title {{ Request::segment(1) == 'teachers' ? 'active':'' }}">
                    <p>
                        <i class="fa-solid fa-chalkboard-user"></i>
                        Teachers
                    </p>
                    <i class="fas fa-angle-right {{ Request::segment(1) == 'teachers' ? 'rotate':'' }}"></i>
                </div>
            </li>

            {{-- Subjects --}}
            <li class="menu-item" data-url="{{ url('/subjects') }}">
                <div class="menu-title {{ Request::segment(1) == 'subjects' ? 'active':'' }}">
                    <p>
                        <i class="fa-solid fa-book"></i>
                        Subjects
                    </p>
                    <i class="fas fa-angle-right {{ Request::segment(1) == 'subjects' ? 'rotate':'' }}"></i>
                </div>
            </li>

        </ul>
    </aside>

<nav>
    <div class="navbar-container">
        <a href="{{ route('dashboard') }}">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>

        <a href="{{ route('student') }}">
            <i class="fa-solid fa-user-graduate"></i> Students
        </a>

        <a href="{{ route('teacher') }}">
            <i class="fa-solid fa-chalkboard-user"></i> Teachers
        </a>

        <a href="{{ route('subject') }}">
            <i class="fa-solid fa-book"></i> Subjects
        </a>

        <a href="{{ route('class') }}">
            <i class="fa-solid fa-school"></i> Classes
        </a>

        @auth
    <form id="logoutForm" action="{{ route('logout') }}" method="GET" style="display: inline;">
        <button type="button" class="logout-btn" style="
            background: none;
            border: none;
            color: #ffffff;
            font-weight: 600;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        ">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>

    <script>
        document.querySelector('.logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        });
    </script>
@endauth

@guest
    <a href="{{ route('login') }}">
        <i class="fa-solid fa-right-to-bracket"></i> Login
    </a>
@endguest

    </div>
</nav>

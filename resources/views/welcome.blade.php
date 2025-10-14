@extends('layouts.layout')

@section('main-content')

<div class="dashboard-container">

    <h1 class="dashboard-title">📊 Dashboard Overview</h1>
    <p class="dashboard-subtitle">Welcome to the Student Management System. Here’s a quick summary:</p>

    <div class="dashboard-cards">
        <div class="card student-card">
            <i class="fa-solid fa-user-graduate icon"></i>
            <h2>{{ $studentCount }}</h2>
            <p>Total Students</p>
        </div>

        <div class="card teacher-card">
            <i class="fa-solid fa-chalkboard-user icon"></i>
            <h2>{{ $teacherCount }}</h2>
            <p>Total Teachers</p>
        </div>

        <div class="card subject-card">
            <i class="fa-solid fa-book-open icon"></i>
            <h2>{{ $subjectCount }}</h2>
            <p>Total Subjects</p>
        </div>
    </div>

</div>

<style>
    .dashboard-container {
        padding: 40px;
        text-align: center;
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #2b2b2b;
    }

    .dashboard-subtitle {
        font-size: 1rem;
        color: #666;
        margin-bottom: 30px;
    }

    .dashboard-cards {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .card {
        width: 250px;
        height: 150px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #fff;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .card h2 {
        font-size: 2rem;
        margin: 5px 0;
    }

    .card p {
        font-size: 1rem;
        color: #555;
        font-weight: 500;
    }

    .icon {
        font-size: 2.5rem;
        margin-bottom: 8px;
    }

    .student-card {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        color: #fff;
    }

    .teacher-card {
        background: linear-gradient(135deg, #43e97b, #38f9d7);
        color: #fff;
    }

    .subject-card {
        background: linear-gradient(135deg, #fa709a, #fee140);
        color: #fff;
    }

    @media (max-width: 768px) {
        .dashboard-cards {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

@endsection

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\ClassController;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\ClassModel;

// ------------------------------------
// 🏠 Default Dashboard (Welcome Page)
// ------------------------------------
Route::get('/', function () {
    $studentCount = Student::count();
    $teacherCount = Teacher::count();
    $subjectCount = Subject::count();
    $classCount = ClassModel::count();

    return view('welcome', compact('studentCount', 'teacherCount', 'subjectCount', 'classCount'));
})->middleware('auth')->name('dashboard');

// ------------------------------------
// ⚙️ Auth Routes
// ------------------------------------
Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::get('/login', 'showLogin')->name('login')->middleware('guest');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ------------------------------------
// 👩‍🎓 Student Routes
// ------------------------------------
Route::controller(StudentController::class)->group(function(){
    Route::prefix('/student')->middleware('auth')->group(function(){
        Route::get('/', 'show')->name('student'); 
        Route::get('/add', 'create')->name('student.create');
        Route::post('/add', 'add')->name('student.store');
        Route::get('/edit/{id}', 'edit')->name('student.edit');
        Route::post('/update', 'update')->name('student.update');
        Route::get('/delete/{id}', 'delete')->name('student.delete');  
    });
});

// ------------------------------------
// 👨‍🏫 Teacher Routes
// ------------------------------------
Route::controller(TeacherController::class)->group(function(){
    Route::prefix('/teacher')->middleware('auth')->group(function(){
        Route::get('/', 'show')->name('teacher'); 
        Route::get('/add', 'create')->name('teacher.create');
        Route::post('/add', 'add')->name('teacher.store');
        Route::get('/edit/{id}', 'edit')->name('teacher.edit');
        Route::post('/update', 'update')->name('teacher.update');
        Route::get('/delete/{id}', 'delete')->name('teacher.delete');  
    });
});

// ------------------------------------
// 📚 Subject Routes
// ------------------------------------
Route::controller(SubjectController::class)->group(function(){
    Route::prefix('/subject')->middleware('auth')->group(function(){
        Route::get('/', 'show')->name('subject'); 
        Route::get('/add', 'create')->name('subject.create');
        Route::post('/add', 'add')->name('subject.store');
        Route::get('/edit/{id}', 'edit')->name('subject.edit');
        Route::post('/update', 'update')->name('subject.update');
        Route::get('/delete/{id}', 'delete')->name('subject.delete');  
    });
});

// ------------------------------------
// 🏫 Class Routes
// ------------------------------------
Route::controller(ClassController::class)->group(function(){
    Route::prefix('/class')->middleware('auth')->group(function(){
        Route::get('/', 'show')->name('class'); 
        Route::get('/add', 'create')->name('class.create');
        Route::post('/add', 'add')->name('class.store');
        Route::get('/edit/{id}', 'edit')->name('class.edit');
        Route::post('/update', 'update')->name('class.update');
        Route::get('/delete/{id}', 'delete')->name('class.delete');  
    });
});

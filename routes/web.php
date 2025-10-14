<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;

Route::get('/', function () {
    $studentCount = Student::count();
    $teacherCount = Teacher::count();
    $subjectCount = Subject::count();

    return view('welcome', compact('studentCount', 'teacherCount', 'subjectCount'));
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layouts.layout');
});

// Student Routes
Route::controller(StudentController::class)->group(function(){
    Route::prefix('/student')->group(function(){
        Route::get('/', 'show')->name('student'); 
        Route::get('/add', 'create')->name('student.create');
        Route::post('/add', 'add')->name('student.store');
        Route::get('/edit/{id}', 'edit')->name('student.edit');
        Route::post('/update', 'update')->name('student.update');
        Route::get('/delete/{id}', 'delete')->name('student.delete');  
    });
});

// Subject Routes
Route::controller(SubjectController::class)->group(function(){
    Route::prefix('/subject')->group(function(){
        Route::get('/', 'show')->name('subject'); 
        Route::get('/add', 'create')->name('subject.create');
        Route::post('/add', 'add')->name('subject.store');
        Route::get('/edit/{id}', 'edit')->name('subject.edit');
        Route::post('/update', 'update')->name('subject.update');
        Route::get('/delete/{id}', 'delete')->name('subject.delete');  
    });
});

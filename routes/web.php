<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

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

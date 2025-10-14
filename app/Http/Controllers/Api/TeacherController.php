<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    // Display all teachers
    public function show(){
        $teachers = Teacher::get();
        return view('main-content.teachers.teacher', compact('teachers'));
    }

    // Show Add teacher Form
    public function create(){
        return view('main-content.teachers.addTeacherModal');
    }

    // Add new teacher
    public function add(Request $req)
    {
        $req->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:teachers,email',
            'phone'   => 'required|string|max:20',
            
        ]);

        Teacher::create([
            'name'    => $req->name,
            'email'   => $req->email,
            'phone'   => $req->phone,
           
        ]);

        return 'Successfully Added';
    }

    // Fetch teacher for edit (AJAX)
    public function edit($id)
    {
        $teachers = Teacher::findOrFail($id);
        return response()->json(['teacher' => $teacher]);
    }

    // Update teacher
    public function update(Request $req)
    {
        $req->validate([
            'id'      => 'required|exists:teachers,id',
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:teachers,email,' . $req->id,
            'phone'   => 'required|string|max:20',
            
        ]);

        Teacher::findOrFail($req->id)->update([
            'name'    => $req->name,
            'email'   => $req->email,
            'phone'   => $req->phone,
        ]);

        return 'Successfully Updated';
    }

    // Delete teacher
    public function delete($id){
        Teacher::findOrFail($id)->delete();
        return redirect()->route('teacher')->with('success', 'Teacher deleted successfully.');
    }
}

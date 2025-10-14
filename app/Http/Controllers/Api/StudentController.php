<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    // Display all students
    public function show(){
        $students = Student::get();
        return view('main-content.students.student', compact('students'));
    }

    // Show Add Student Form
    public function create(){
        return view('main-content.addStudentModal');
    }

    // Add new student
    public function add(Request $req)
    {
        $req->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:students,email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'status'  => 'required|in:Active,Inactive',
        ]);

        Student::create([
            'name'    => $req->name,
            'email'   => $req->email,
            'phone'   => $req->phone,
            'address' => $req->address,
            'status'  => $req->status,
        ]);

        return 'Successfully Added';
    }

    // Fetch student for edit (AJAX)
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json(['student' => $student]);
    }

    // Update student
    public function update(Request $req)
    {
        $req->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:students,email,' . $req->id,
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'status'  => 'required|in:Active,Inactive',
        ]);

        Student::findOrFail($req->id)->update([
            'name'    => $req->name,
            'email'   => $req->email,
            'phone'   => $req->phone,
            'address' => $req->address,
            'status'  => $req->status,
        ]);

        return 'Successfully Updated';
    }

    // Delete student
    public function delete($id){
        Student::findOrFail($id)->delete();
        return redirect()->route('student')->with('success', 'Student deleted successfully.');
    }
}

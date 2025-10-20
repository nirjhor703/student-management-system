<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    // Show all classes
    public function show()
    {
        $classes = ClassModel::with(['subject', 'teacher', 'students'])->get();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $students = Student::all();

        return view('main-content.classes.class', compact('classes', 'subjects', 'teachers', 'students'));
    }

    // Add new class
    public function add(Request $req)
    {
        $req->validate([
            'class_name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'students' => 'array|required',
        ]);

        $class = ClassModel::create([
            'class_name' => $req->class_name,
            'subject_id' => $req->subject_id,
            'teacher_id' => $req->teacher_id,
        ]);

        $class->students()->attach($req->students);

        return 'Class Added Successfully';
    }

    // Fetch class for editing
    public function edit($id)
    {
        $class = ClassModel::with('students')->findOrFail($id);
        return response()->json(['class' => $class]);
    }

    // Update
    public function update(Request $req)
    {
        $req->validate([
            'id' => 'required|exists:classes,id',
            'class_name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'students' => 'array|required',
        ]);

        $class = ClassModel::findOrFail($req->id);
        $class->update([
            'class_name' => $req->class_name,
            'subject_id' => $req->subject_id,
            'teacher_id' => $req->teacher_id,
        ]);
        $class->students()->sync($req->students);

        return 'Class Updated Successfully';
    }

    // Delete
    public function delete($id)
    {
        $item = ClassModel::findOrFail($id); // Change ClassModel accordingly
        $item->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }


}

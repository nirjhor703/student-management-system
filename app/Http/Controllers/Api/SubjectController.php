<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    // Display all subjects
    public function show()
    {
        $subjects = Subject::with('teacher')->get(); // include teacher info
        $teachers = Teacher::all(); // for dropdown
        return view('main-content.subjects.subject', compact('subjects', 'teachers'));
    }

    // Show Add Subject Form (if you have a separate page)
    public function create()
    {
        $teachers = Teacher::all();
        return view('subjects.create', compact('teachers'));
    }

    // Add new subject
    public function add(Request $req)
    {
        $req->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'teacher_id'  => 'required|exists:teachers,id',
        ]);

        Subject::create([
            'name'        => $req->name,
            'description' => $req->description,
            'teacher_id'  => $req->teacher_id,
        ]);

        return 'Successfully Added';
    }

    // Fetch subject for edit (AJAX)
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $teachers = Teacher::all();

        return response()->json([
            'subject' => $subject,
            'teachers' => $teachers
        ]);
    }

    // Update subject
    public function update(Request $req)
    {
        $req->validate([
            'id'          => 'required|exists:subjects,id',
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'teacher_id'  => 'required|exists:teachers,id',
        ]);

        Subject::findOrFail($req->id)->update([
            'name'        => $req->name,
            'description' => $req->description,
            'teacher_id'  => $req->teacher_id,
        ]);

        return 'Successfully Updated';
    }

    // Delete subject
    public function delete($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect()->route('subject')->with('success', 'Subject deleted successfully.');
    }
}

<div id="addClassModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="addClassModal">&times;</span>
        <h2>Add New Class</h2>

        <form id="addClassForm">
            @csrf

            <label for="class_name">Class Name</label>
            <input type="text" id="class_name" name="class_name">

            <label for="subject_id">Select Subject</label>
            <select id="subject_id" name="subject_id">
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>

            <label for="teacher_id">Select Teacher</label>
            <select id="teacher_id" name="teacher_id">
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>

            <label for="students">Select Students</label>
            <select id="students" name="students[]" multiple>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>

            <button type="submit">Add Class</button>
        </form>
    </div>
</div>

<div id="editClassModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="editClassModal">&times;</span>
        <h2>Edit Class</h2>

        <form id="editClassForm">
            @csrf
            <input type="hidden" id="edit_id" name="id">

            <!-- Class Name -->
            <label for="edit_class_name">Class Name</label>
            <input type="text" id="edit_class_name" name="class_name">

            <!-- Subject -->
            <label for="edit_subject_id">Select Subject</label>
            <select id="edit_subject_id" name="subject_id">
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>

            <!-- Teacher -->
            <label for="edit_teacher_id">Select Teacher</label>
            <select id="edit_teacher_id" name="teacher_id">
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>

            <!-- Students -->
            <label for="edit_students">Select Students</label>
            <select id="edit_students" name="students[]" multiple>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>

            <button type="submit">Update Class</button>
        </form>
    </div>
</div>

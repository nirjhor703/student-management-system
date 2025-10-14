<div id="editSubjectModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="editSubjectModal">&times;</span>
        <h2>Edit Subject</h2>

        <form id="editSubjectForm">
            @csrf
            <input type="hidden" name="id" id="edit_id">

            <!-- Subject Name -->
            <label for="edit_name">Subject Name</label>
            <input type="text" id="edit_name" name="name">
            <span class="error" id="name_error"></span>

            <!-- Description -->
            <label for="edit_description">Description</label>
            <input type="text" id="edit_description" name="description">
            <span class="error" id="description_error"></span>

            <!-- Assiged Teacher -->
            <label for="edit_teacher_id">Assigned Teacher</label>
            <select id="edit_teacher_id" name="teacher_id" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            <span class="error" id="teacher_id_error"></span>


            <button type="submit">Update Subject</button>
        </form>
    </div>
</div>

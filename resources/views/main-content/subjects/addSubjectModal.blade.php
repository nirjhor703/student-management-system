<!-- Add Student Modal -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="addSubjectModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="addSubjectModal">&times;</span>
        <h2>Add New Subject</h2>

        <form id="addSubjectForm">
            @csrf


            <!-- Subject Name -->
            <label for="name">Subject Name</label>
            <input type="text" id="name" name="name" placeholder="Enter subject name">
            <span class="error" id="name_error"></span>

            <!-- Description -->
            <label for="edit_description">Description</label>
            <input type="text" id="description" name="description" placeholder="Enter description">
            <span class="error" id="description_error"></span>

            <!-- Assiged Teacher -->
            <label for="teacher_id">Assigned Teacher</label>
            <select id="teacher_id" name="teacher_id" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            <span class="error" id="teacher_id_error"></span>            

            <button type="submit">Add Subject</button>
        </form>
    </div>
</div>

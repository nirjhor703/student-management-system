<div id="editTeacherModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="editTeacherModal">&times;</span>
        <h2>Edit Teacher</h2>

        <form id="editTeacherForm">
            @csrf
            <input type="hidden" name="id" id="edit_id">

            <!-- teacher Name -->
            <label for="edit_name">Name</label>
            <input type="text" id="edit_name" name="name">
            <span class="error" id="name_error"></span>

            <!-- Email -->
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" name="email">
            <span class="error" id="email_error"></span>

            <!-- Phone -->
            <label for="edit_phone">Phone</label>
            <input type="text" id="edit_phone" name="phone">
            <span class="error" id="phone_error"></span>

            

            <button type="submit">Update Teacher</button>
        </form>
    </div>
</div>

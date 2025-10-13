<div id="editStudentModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="editStudentModal">&times;</span>
        <h2>Edit Student</h2>

        <form id="editStudentForm">
            @csrf
            <input type="hidden" name="id" id="edit_id">

            <!-- Student Name -->
            <label for="edit_name">Full Name</label>
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

            <!-- Address -->
            <label for="edit_address">Address</label>
            <textarea id="edit_address" name="address"></textarea>
            <span class="error" id="address_error"></span>

            <!-- Status -->
            <label for="edit_status">Status</label>
            <select id="edit_status" name="status">
                <option value="">Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            <span class="error" id="status_error"></span>

            <button type="submit">Update Student</button>
        </form>
    </div>
</div>

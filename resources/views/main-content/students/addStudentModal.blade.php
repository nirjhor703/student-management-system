<!-- Add Student Modal -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="addStudentModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="addStudentModal">&times;</span>
        <h2>Add New Student</h2>

        <form id="addStudentForm">
            @csrf

            <!-- Student Name -->
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter full name">
            <span class="error" id="name_error"></span>

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email">
            <span class="error" id="email_error"></span>

            <!-- Phone -->
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Enter phone number">
            <span class="error" id="phone_error"></span>

            <!-- Address -->
            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="Enter address"></textarea>
            <span class="error" id="address_error"></span>

            <!-- Status -->
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            <span class="error" id="status_error"></span>

            <button type="submit">Add Student</button>
        </form>
    </div>
</div>

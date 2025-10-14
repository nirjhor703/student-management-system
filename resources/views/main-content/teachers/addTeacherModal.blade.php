<!-- Add teacher Modal -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="addTeacherModal" class="modal-container">
    <div class="modal-content">
        <span class="close-modal" data-modal-id="addTeacherModal">&times;</span>
        <h2>Add New Teacher</h2>

        <form id="addTeacherForm">
            @csrf

            <!-- teacher Name -->
            <label for="name">Name</label>
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

            <button type="submit">Add Teacher</button>
        </form>
    </div>
</div>

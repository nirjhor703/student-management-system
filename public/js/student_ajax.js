$('#addStudentForm').submit(function (e) {
    e.preventDefault();

    let formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        address: $('#address').val(),
        status: $('#status').val(),
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    $.ajax({
        url: '/student/add',
        method: 'POST',
        data: formData,
        success: function (response) {
            alert(response);
            $('#addStudentForm')[0].reset();
            $('#addStudentModal').hide();
            location.reload();
        },
        error: function (response) {
            if (response.responseJSON && response.responseJSON.errors) {
                $.each(response.responseJSON.errors, function (key, value) {
                    $('#' + key + '_error').text(value);
                });
            } else {
                alert('An unexpected error occurred.');
            }
        }
    });
});



$(document).ready(function () {

    // ✅ Open Edit Modal and Load Student Data
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();
        let studentId = $(this).data('id');

        $.get('/student/edit/' + studentId, function (data) {
            $('#edit_id').val(data.student.id);
            $('#edit_name').val(data.student.name);
            $('#edit_email').val(data.student.email);
            $('#edit_phone').val(data.student.phone);
            $('#edit_address').val(data.student.address);
            $('#edit_status').val(data.student.status);

            $('#editStudentModal').css('display', 'flex');
        });
    });

    // ✅ Submit Update Form
    $('#editStudentForm').submit(function (e) {
        e.preventDefault();

        let formData = {
            id: $('#edit_id').val(),
            name: $('#edit_name').val(),
            email: $('#edit_email').val(),
            phone: $('#edit_phone').val(),
            address: $('#edit_address').val(),
            status: $('#edit_status').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/student/update',
            method: 'POST',
            data: formData,
            success: function (response) {
                alert(response);
                $('#editStudentForm')[0].reset();
                $('#editStudentModal').hide();
                location.reload();
            },
            error: function (response) {
                if (response.responseJSON && response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (key, value) {
                        $('#' + key + '_error').text(value);
                    });
                } else {
                    alert('An unexpected error occurred.');
                }
            }
        });
    });

    // ✅ Close modal when clicking outside
    $(window).on('click', function (e) {
        if ($(e.target).hasClass('modal-container')) {
            $('.modal-container').hide();
        }
    });


    // ✅ Dynamically clear error on input change
    $('#editMovieForm input, #editMovieForm select').on('input change', function () {
        let fieldId = $(this).attr('id').replace('edit_', '');
        $('#edit_' + fieldId + '_error').text('');
    });

    // ✅ Close modal when clicking outside
    $(window).on('click', function (e) {
        if ($(e.target).hasClass('modal-container')) {
            $('.modal-container').hide();
        }
    });

});

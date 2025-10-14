$('#addTeacherForm').submit(function (e) {
    e.preventDefault();

    let formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    $.ajax({
        url: '/teacher/add',
        method: 'POST',
        data: formData,
        success: function (response) {
            alert(response);
            $('#addTeacherForm')[0].reset();
            $('#addTeacherModal').hide();
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

    // ✅ Open Edit Modal and Load teacher Data
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();
        let teacherId = $(this).data('id');

        $.get('/teacher/edit/' + teacherId, function (data) {
            $('#edit_id').val(data.teacher.id);
            $('#edit_name').val(data.teacher.name);
            $('#edit_email').val(data.teacher.email);
            $('#edit_phone').val(data.teacher.phone);
            

            $('#editTeacherModal').css('display', 'flex');
        });
    });

    // ✅ Submit Update Form
    $('#editTeacherForm').submit(function (e) {
        e.preventDefault();

        let formData = {
            id: $('#edit_id').val(),
            name: $('#edit_name').val(),
            email: $('#edit_email').val(),
            phone: $('#edit_phone').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/teacher/update',
            method: 'POST',
            data: formData,
            success: function (response) {
                alert(response);
                $('#editTeacherForm')[0].reset();
                $('#editTeacherModal').hide();
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

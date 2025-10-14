$('#addSubjectForm').submit(function (e) {
    e.preventDefault();

    let formData = {
        name: $('#name').val(),
        description: $('#description').val(),
        teacher_id: $('#teacher_id').val(),
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    $.ajax({
        url: '/subject/add',
        method: 'POST',
        data: formData,
        success: function (response) {
            alert(response);
            $('#addSubjectForm')[0].reset();
            $('#addSubjectModal').hide();
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
        let subjectId = $(this).data('id');

        $.get('/subject/edit/' + subjectId, function (data) {
            $('#edit_id').val(data.subject.id);
            $('#edit_name').val(data.subject.name);
            $('#edit_description').val(data.subject.description);
            $('#edit_teacher_id').val(data.subject.teacher_id);

            $('#editSubjectModal').css('display', 'flex');
        });
    });

    // ✅ Submit Update Form
    $('#editSubjectForm').submit(function (e) {
        e.preventDefault();

        let formData = {
            id: $('#edit_id').val(),
            name: $('#edit_name').val(),
            description: $('#edit_description').val(),
            teacher_id: $('#edit_teacher_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/subject/update',
            method: 'POST',
            data: formData,
            success: function (response) {
                alert(response);
                $('#editSubjectForm')[0].reset();
                $('#editSubjectModal').hide();
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

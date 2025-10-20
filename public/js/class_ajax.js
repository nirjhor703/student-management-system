
// ✅ Add Class
$('#addClassForm').submit(function (e) {
    e.preventDefault();

    let formData = {
        class_name: $('#class_name').val(),
        teacher_id: $('#teacher_id').val(),
        subject_id: $('#subject_id').val(),
        students: $('#students').val(), // multiple selected students
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    $.ajax({
        url: '/class/add',
        method: 'POST',
        data: formData,
        success: function (response) {
            alert(response);
            $('#addClassForm')[0].reset();
            $('#addClassModal').hide();
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

    // ✅ Open Edit Modal and Load Class Data
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();
        let classId = $(this).data('id');

        $.get('/class/edit/' + classId, function (data) {
            $('#edit_id').val(data.class.id);
            $('#edit_class_name').val(data.class.class_name);
            $('#edit_teacher_id').val(data.class.teacher_id);
            $('#edit_subject_id').val(data.class.subject_id);
            $('#edit_students').val(data.class.students.map(s => s.id)); // pre-select students

            $('#editClassModal').css('display', 'flex');
        });
    });

    // ✅ Submit Update Form
    $('#editClassForm').submit(function (e) {
        e.preventDefault();

        let formData = {
            id: $('#edit_id').val(),
            class_name: $('#edit_class_name').val(),
            teacher_id: $('#edit_teacher_id').val(),
            subject_id: $('#edit_subject_id').val(),
            students: $('#edit_students').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/class/update',
            method: 'POST',
            data: formData,
            success: function (response) {
                alert(response);
                $('#editClassForm')[0].reset();
                $('#editClassModal').hide();
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
  
    $(document).off('click', '.delete-btn').on('click', '.delete-btn', function(e) {
        e.preventDefault();
    
        let btn = $(this);
        let url = btn.data('url');
    
        if (!confirm('Are you sure you want to delete this item?')) return;
    
        $.ajax({
            url: url,
            method: 'GET', // match your route
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Failed to delete. Check console.');
            }
        });
    });
    
    
    


    // ✅ Close modal when clicking outside
    $(window).on('click', function (e) {
        if ($(e.target).hasClass('modal-container')) {
            $('.modal-container').hide();
        }
    });

    // ✅ Clear errors dynamically
    $('#editClassForm input, #editClassForm select').on('input change', function () {
        let fieldId = $(this).attr('id').replace('edit_', '');
        $('#edit_' + fieldId + '_error').text('');
    });

});

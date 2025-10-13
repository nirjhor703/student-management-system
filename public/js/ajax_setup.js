
$.ajax({
    url: url,
    
    method: 'PUT',
    
    data: data,
    
    beforeSend: beforeSend || function(response, settings) {
        $(document).find('span.error').text('');
        console.log('before send response',response)
        console.log('before send settings',settings)
    },
    
    success: success || function(data, textStatus, jqXHR){
        console.log('Success:', data);
        console.log('Success:', textStatus);
        console.log('Success:', jqXHR);
    },
    
    error: error || function(response, textStatus, errorThrown) {
        if (response.responseJSON && response.responseJSON.errors) {
            $.each(response.responseJSON.errors, function (key, value) {
                $('#' + key + "_error").text(value);
            });
        } 
        else {
            console.log("Error: ", response);
            console.log("Text Status: ", textStatus);
            console.log("Error Thrown: ", errorThrown);
            toastr.error('An unexpected error occurred.', "Error");
        }
    },
    
    statusCode: {
        403: function() {
            toastr.error('You are not allowed to access this.', "Permission denied");
        },
    }, 
    
    processData: processData || true,
    
    contentType: contentType || 'application/x-www-form-urlencoded',
    
    dataType: dataType || undefined,
    
    timeout: timeout || undefined,
    
    cache: cache || true,
    
    headers: headers || undefined,
    
    complete: complete || undefined,    
    
    dataFilter: undefined,
    
    crossDomain: crossDomain || false,
});





$.ajax({
    url: '/students',
    method: 'Post',
    data: {name:'hasib'},
    success: function (response) {
        console.log(response)
    },
    error: function(response, textStatus, errorThrown) {
        console.log("Error: ", response);
        console.log("Text Status: ", textStatus);
        console.log("Error Thrown: ", errorThrown);
        toastr.error('An unexpected error occurred.', "Error");
    },
})


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

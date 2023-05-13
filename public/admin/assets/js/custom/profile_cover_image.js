//delete record
$('.delete').on('click', function() {
    var slug = $(this).attr('data-slug');
    var delete_url = $(this).attr('data-del-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: delete_url,
                type: 'DELETE',
                success: function(response) {
                    if (response) {
                        $('#id-' + slug).hide();
                        $('#trash-record-count').html(response.trash_records);
                        Swal.fire(
                            'Deleted!',
                            'Your record has been deleted.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Not Deleted!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    })
});

//Add & Edit Record
$('#add-btn').on('click', function(e) {
    var url = $(this).attr('data-url');
    $('#offcanvasAddCoverImageLabel').html('Add Cover Image');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'POST');

    //reset
    $('#create-form file').val('');
});

//Status
$(document).on('click', '.status-btn', function() {
    var status_url = $(this).attr('data-status-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to change status!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: status_url,
                type: 'GET',
                success: function(response) {
                    if (response) {
                        Swal.fire(
                            'Done!',
                            'Your record has been updated successfully.',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // 5000 milliseconds = 5 seconds
                    } else {
                        Swal.fire(
                            'Alert!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    });
});

//add new image
$(document).ready(function() {
    $('.cover-img-sub-btn').click(function(e) {
        e.preventDefault();

        var url = $(this).closest('form').attr('action');
        var method = $(this).closest('form').attr('data-method');
        var modal_id = $(this).closest('form').attr('data-modal-id');

        var image = $('#cover-image').val();
        var token = $('#token').val();
        if (image == '') {
            $('#cover-image').addClass('is-invalid'); // Add the is-invalid class to the input element
            $('#cover-image' + '_error').text('The image field is required.'); // Add the error message to the error element
            return false;
        }

        var formData = new FormData();
        var imageFile = $('#image')[0].files[0];
        if (!imageFile) {
            imageFile = '';
        }
        formData.append('image', imageFile);
        formData.append('_token', token);

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#' + modal_id).modal('hide');
                    Swal.fire(
                        'Success!',
                        'You have added record successfully.!',
                        'success'
                    )

                    setTimeout(function() {
                        location.reload();
                    }, 2000); // 5000 milliseconds = 5 seconds
                } else if (response.error) {
                    $('#' + modal_id).modal('hide');

                    Swal.fire({
                        title: 'Alert!',
                        text: response.error,
                        icon: 'warning',
                        customClass: {
                            title: 'text-danger',
                            content: 'text-danger'
                        }
                    });
                }

            },
            error: function(xhr) {
                // Parse the JSON response to get the error messages
                var errors = JSON.parse(xhr.responseText);

                // Reset the form errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').empty();
                $('.error').empty();

                // Loop through the errors and display them
                $.each(errors.errors, function(key, value) {
                    $('#' + key).addClass('is-invalid'); // Add the is-invalid class to the input element
                    $('#' + key + '_error').text(value[0]); // Add the error message to the error element
                });
            }
        });
    });
});
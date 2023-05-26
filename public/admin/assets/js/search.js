setTimeout(function() {
    $('#message-alert').fadeOut('slow');
}, 2000);

$(document).on('change', '#status', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var status = selectedOption.val();
    var search = $('#search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status);
});
$('#search').keyup((function(e) {
    var search = $(this).val();
    var status = $('#status').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status);
}));

$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var search = $('#search').val();
    var status = $('#status').val();
    var pageurl = $('#page_url').val();
    var page = $(this).attr('href').split('page=')[1];
    fetchAll(pageurl, page, search, status);
});

function fetchAll(pageurl, page, search, status) {
    $.ajax({
        url: pageurl + '?page=' + page + '&search=' + search + '&status=' + status,
        type: 'get',
        success: function(response) {
            $('#body').html(response);
        }
    });
}

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

//submit
$(document).ready(function() {
    $('.submitBtn').click(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var url = $(this).closest('form').attr('action');
        var method = $(this).closest('form').attr('data-method');

        var formId = $(this).closest('form').attr('id');
        var modal_id = $(this).closest('form').attr('data-modal-id');

        // Get the form data
        var formData = $('#' + modal_id).find('#' + formId).serialize();

        // Check if the description variable exists in the serialized form data
        var fieldExists = formData.indexOf('description=') > -1;

        if (fieldExists) {
            //Get editor value.
            var editorData = CKEDITOR.instances.description.getData();
            // Combine the editor data with the serialized form data
            formData = formData + '&description=' + encodeURIComponent(editorData);
        }

        // Send the AJAX request
        $.ajax({
            url: url,
            method: method,
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#' + modal_id).modal('hide');
                    Swal.fire(
                        'Success!',
                        'Record is modified successfully.',
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
                } else if (response.error == false) {
                    Swal.fire({
                        title: 'Alert!',
                        text: response.message,
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

//Open modal for adding
$('#add-btn, .add-btn').on('click', function() {
    var targeted_modal = $(this).attr('data-bs-target');

    //reset
    $(targeted_modal).find('#create-form input[type="text"], #create-form textarea').val('');
    $(targeted_modal).find('#create-form input[type="date"]').val('');
    $(targeted_modal).find('#create-form input[type="email"]').val('');
    $(targeted_modal).find('#create-form input[type="time"]').val('');
    $(targeted_modal).find('#create-form select').val('');
    $(targeted_modal).find('#create-form input[type="checkbox"], #create-form input[type="radio"]').prop('checked', false);

    if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.description) {
        CKEDITOR.instances.description.setData('');
    }

    //reset

    var url = $(this).attr('data-url');
    var modal_label = $(this).attr('title');

    $(targeted_modal).find('#modal-label').html(modal_label);
    $(targeted_modal).find("#create-form").attr("action", url);
    $(targeted_modal).find("#create-form").attr("data-method", 'POST');
});

//Open modal for editing
$('.edit-btn').on('click', function() {
    var targeted_modal = $(this).attr('data-bs-target');

    var url = $(this).attr('data-url');
    var modal_label = $(this).attr('title');

    $(targeted_modal).find('#modal-label').html(modal_label);
    $(targeted_modal).find("#create-form").attr("action", url);
    $(targeted_modal).find("#create-form").attr("data-method", 'PUT');

    var edit_url = $(this).attr('data-edit-url');
    $.ajax({
        url: edit_url,
        method: 'GET',
        success: function(response) {
            $(targeted_modal).find('#edit-content').html(response);
        }
    });
});

$('.show').on('click', function() {
    var targeted_modal = $(this).attr('data-bs-target');

    var modal_label = $(this).attr('title');

    $(targeted_modal).find('#modal-label').html(modal_label);

    var show_url = $(this).attr('data-show-url');
    $.ajax({
        url: show_url,
        method: 'GET',
        success: function(response) {
            $(targeted_modal).find('#show-content').html(response);
        }
    });
});

$(document).on('click', '.change-status-btn', function() {
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
                type: 'get',
                success: function(response) {
                    if (response) {
                        Swal.fire(
                            'Updated!',
                            'Your record has been updated successfully.',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // 5000 milliseconds = 5 seconds
                    } else {
                        Swal.fire(
                            'Not Updated!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    });
});
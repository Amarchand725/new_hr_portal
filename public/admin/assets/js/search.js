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

$(document).ready(function() {
    $('.submitBtn').click(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var url = $(this).closest('form').attr('action');
        var method = $(this).closest('form').attr('data-method');

        var formId = $(this).closest('form').attr('id');
        var modal_id = $(this).closest('form').attr('data-modal-id');

        // Get the form data
        var formData = $('#' + formId).serialize();

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
                        'You have added record sucessfully.!',
                        'success'
                    )

                    setTimeout(function() {
                        location.reload();
                    }, 2000); // 5000 milliseconds = 5 seconds
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
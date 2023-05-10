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

//Submit Record
$('.data-submit').on('click', function(e) {
    if ($('#title').val() == '') {
        $('#title').addClass('invalid');
        $('#error-msg').html('Please enter position title.!');
        return false;
    } else {
        $('#title').removeClass('invalid');
        $('#error-msg').html('');
        return true;
    }
});

//Add & Edit Record
$('#add-btn').on('click', function(e) {
    var url = $(this).attr('data-url');
    $('#offcanvasAddPositionLabel').html('Add Position');
    $("#addNewPositionForm").attr("action", url);

    $("#addNewPositionForm").attr("data-method", 'POST');
    $('#title').val('');
    $('#description').val('');
    $('#status option[value="1"]').prop('selected', true);
});
$('.edit-btn').on('click', function() {
    var model = $(this).data('value');
    var url = $(this).attr('data-url');
    $('#offcanvasAddPositionLabel').html('Edit Position');
    $("#addNewPositionForm").attr("action", url);
    $("#addNewPositionForm").attr("data-method", 'PUT');
    $('#title').val(model.title);
    $('#description').val(model.description);
    $('#status option[value="' + model.status + '"]').prop('selected', true);
});
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
    $('#role-title').html('Add Role');
    $("#addRoleForm").attr("action", url);

    $("#addRoleForm").attr("data-method", 'POST');

    $('#addRoleModal').modal('show');
});
$('.edit-role').on('click', function() {
    var url = $(this).attr('data-url');
    var edit_url = $(this).attr('data-edit-url');
    $('#role-title').html('Edit Role');
    $("#addRoleForm").attr("action", url);
    $("#addRoleForm").attr("data-method", 'PUT');

    $(document).on('click', '.edit-role', function() {
        var url = $(this).attr('data-url');
        $.ajax({
            url: edit_url,
            method: 'GET',
            success: function(response) {
                $('#edit-content').html(response);
            }
        });

        $('#addRoleModal').modal('show');
    });
});